<?php

namespace App\Livewire\Main;

use App\Models\Donor;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DonorIndex extends Component
{
    use WithPagination;
    use WithFileUploads;
    // search input
    public $search = '';
    // Modal variables
    public $donorId = null;
    public $name, $contact_person, $email, $phone, $address, $type, $logo, $is_active;


    // For delete
    public $deleteId = null;
    /**
     * Computed property to get filtered donors
     */
    public function getDonorsProperty()
    {
        // Query donor with optional search
        return Donor::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }


    /**
     * Open modal to create new donor
     */
    public function createDonor()
    {
        $this->reset(['donorId', 'name']);
        $this->dispatch('show-donor-modal');
    }

    /**
     * Load donor info into modal for editing
     */
    public function editDonor($id)
    {
        $donor = donor::findOrFail($id);

        $this->donorId = $donor->id;
        $this->name = $donor->name;
        $this->email = $donor->email;
        $this->phone = $donor->phone;
        $this->address = $donor->address;
        $this->contact_person = $donor->contact_person;
        $this->type = $donor->type;
        $this->logo = $donor->logo;
        $this->is_active = $donor->is_active;
        $this->dispatch('show-donor-modal');
    }


    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:donors,email,' . $this->donorId,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'is_active' => 'nullable|boolean',
            'type' => 'required|in:individual,organization,corporate,foundation',
            'logo' => $this->donorId
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'   // update case
                : 'nullable|image|mimes:jpg,jpeg,png|max:2048', // create case
        ];
    }

    /**
     * Handle create or update
     */
    public function createOrUpdateDonor()
    {
        $this->validate();

        $donor = Donor::find($this->donorId);
        $filePath = $donor ? $donor->logo : null;

        // Handle file upload if a new image is selected
        if ($this->logo) {
            deleteImage($donor, 'logo');
            $filePath = uploadFile($this->logo, 'donors');
        }


        if ($this->donorId) {
            // update
            $donor = donor::findOrFail($this->donorId);
            $donor->update([
                'name' => $this->name,
                'contact_person' => $this->contact_person,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'type' => $this->type,
                'logo' => $filePath,
                'is_active' => $this->is_active,
            ]);

            $msg = "donor updated successfully!";
        } else {
            // create
            donor::create([
                'name' => $this->name,
                'contact_person' => $this->contact_person,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'type' => $this->type,
                'logo' => $filePath,
                'is_active' => $this->is_active
            ]);
            $msg = "donor created successfully!";
        }

        $this->reset(['donorId', 'name', 'email', 'phone', 'address', 'type', 'contact_person', 'logo']);
        $this->dispatch('hide-donor-modal');
        flash()->success($msg);
        $this->dispatch('notify', message: $msg);
    }

    /**
     * Prompt delete confirmation
     */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this donor? This will permanently delete the donor.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            Donor::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash("Donor deleted!", 'success');
        }
    }

    /**
     * Handle denied delete
     */
    #[On('sweetalert:denied')]
    public function onDeny()
    {
        $this->deleteId = null;
        flash('Deletion cancelled', 'info');
        $this->dispatch('notify', message: "Deletion cancelled.");
    }



    public function render()
    {
        return view('livewire.main.donor-index');
    }
}
