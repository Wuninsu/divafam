<?php

namespace App\Livewire\Main;

use App\Models\Donor;
use App\Models\Project;
use App\Models\Sponsorship;
use Livewire\Component;
use Livewire\WithPagination;

class SponsorshipIndex extends Component
{
    use WithPagination;

    public $search = '';

    public $sponsorId = null;
    public $donor_id, $project_id, $amount, $start_date, $end_date, $status;

    public $deleteId = null;

    protected function rules()
    {
        return [
            'donor_id' => 'required|exists:donors,id',
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function getSponsorsProperty()
    {
        return Sponsorship::with(['donor', 'project'])
            ->when($this->search, function ($query) {
                $query->whereHas('donor', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10);
    }

    public function createSponsor()
    {
        $this->resetForm();
        $this->dispatch('show-sponsor-modal');
    }

    public function editSponsor($id)
    {
        $sponsor = Sponsorship::findOrFail($id);

        $this->sponsorId = $sponsor->id;
        $this->donor_id = $sponsor->donor_id;
        $this->project_id = $sponsor->project_id;
        $this->amount = $sponsor->amount;
        $this->start_date = $sponsor->start_date;
        $this->end_date = $sponsor->end_date;
        $this->status = $sponsor->status;

        $this->dispatch('show-sponsor-modal');
    }

    public function createOrUpdateSponsor()
    {
        $this->validate();

        $data = [
            'donor_id' => $this->donor_id,
            'project_id' => $this->project_id,
            'amount' => $this->amount,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
        ];

        if ($this->sponsorId) {
            Sponsorship::findOrFail($this->sponsorId)->update($data);
            $msg = 'Sponsor updated successfully.';
        } else {
            Sponsorship::create($data);
            $msg = 'Sponsor created successfully.';
        }

        $this->resetForm();
        $this->dispatch('hide-sponsor-modal');
        flash()->success($msg);
        $this->dispatch('notify', message: $msg);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;

        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this sponsor?');
    }

    #[\Livewire\Attributes\On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            Sponsorship::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash('Sponsor deleted!', 'success');
        }
    }

    #[\Livewire\Attributes\On('sweetalert:denied')]
    public function onDeny()
    {
        $this->deleteId = null;
        flash('Deletion cancelled', 'info');
        $this->dispatch('notify', message: "Deletion cancelled.");
    }

    private function resetForm()
    {
        $this->reset(['sponsorId', 'donor_id', 'project_id', 'amount', 'start_date', 'end_date', 'status']);
        $this->resetValidation();
    }

    public function render()
    {
        $donors = Donor::all();
        $projects = Project::all();
        return view('livewire.main.sponsorship-index', compact('donors', 'projects'));
    }
}
