<?php

namespace App\Livewire\Main;

use App\Models\Donation;
use App\Models\Donor;
use Livewire\Component;
use Livewire\WithPagination;

class DonationIndex extends Component
{
    use WithPagination;
    public $search = '';
    public $donationId = null;
    public $donor_id, $amount, $currency, $donation_type, $item_description, $donation_date, $notes;

    public $deleteId = null;

    // Computed property to get filtered donations
    public function getDonationsProperty()
    {
        return Donation::with('donor')
            ->when($this->search, function ($query) {
                $query->where('item_description', 'like', '%' . $this->search . '%')
                    ->orWhere('donation_type', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }

    // Show modal for creating a new donation
    public function createDonation()
    {
        $this->reset(['donationId', 'donor_id', 'amount', 'currency', 'donation_type', 'item_description', 'donation_date', 'notes']);
        $this->dispatch('show-donation-modal');
    }

    // Load a donation into the form for editing
    public function editDonation($id)
    {
        $donation = Donation::findOrFail($id);

        $this->donationId = $donation->id;
        $this->donor_id = $donation->donor_id;
        $this->amount = $donation->amount;
        $this->currency = $donation->currency;
        $this->donation_type = $donation->donation_type;
        $this->item_description = $donation->item_description;
        $this->donation_date = $donation->donation_date;
        $this->notes = $donation->notes;

        $this->dispatch('show-donation-modal');
    }

    protected function rules()
    {
        return [
            'donor_id' => 'required|exists:donors,id',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'donation_type' => 'required|string|max:50',
            'item_description' => 'nullable|string|max:500',
            'donation_date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    public function createOrUpdateDonation()
    {
        $this->validate();

        $data = $this->only([
            'donor_id',
            'amount',
            'currency',
            'donation_type',
            'item_description',
            'donation_date',
            'notes',
        ]);

        if ($this->donationId) {
            Donation::findOrFail($this->donationId)->update($data);
            $msg = 'Donation updated successfully!';
        } else {
            Donation::create($data);
            $msg = 'Donation created successfully!';
        }

        $this->reset(['donationId', 'donor_id', 'amount', 'currency', 'donation_type', 'item_description', 'donation_date', 'notes']);
        $this->dispatch('hide-donation-modal');
        flash()->success($msg);
        $this->dispatch('notify', message: $msg);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;

        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this donation? This action cannot be undone.');
    }

    #[\Livewire\Attributes\On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            Donation::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash("Donation deleted!", 'success');
            $this->dispatch('notify', message: "Donation deleted successfully.");
        }
    }

    #[\Livewire\Attributes\On('sweetalert:denied')]
    public function onDeny()
    {
        $this->deleteId = null;
        flash('Deletion cancelled', 'info');
        $this->dispatch('notify', message: "Deletion cancelled.");
    }

    public function render()
    {
        $donors = Donor::all();
        return view('livewire.main.donation-index', compact('donors'));
    }
}
