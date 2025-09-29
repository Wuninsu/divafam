<?php

namespace App\Livewire\Main;

use App\Models\Community;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CommunityIndex extends Component
{
    use WithPagination;
    // search input
    public $search = '';
    // Modal variables
    public $communityId;
    public $name, $district, $region;

    // For delete
    public $deleteId = null;
    /**
     * Computed property to get filtered communitys
     */
    public function getCommunitiesProperty()
    {
        // Query community with optional search
        return Community::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }


    /**
     * Open modal to create new community
     */
    public function createCommunity()
    {
        $this->reset(['communityId', 'region', 'district', 'name']);
        $this->dispatch('show-community-modal');
    }

    /**
     * Load community info into modal for editing
     */
    public function editCommunity($id)
    {
        $community = Community::findOrFail($id);

        $this->communityId = $community->id;
        $this->name = $community->name;
        $this->district = $community->district;
        $this->region = $community->region;
        $this->dispatch('show-community-modal');
    }

    /**
     * Handle create or update
     */
    public function createOrUpdateCommunity()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:communities,name,' . $this->communityId,
            'district' => 'required|string',
            'region' => 'nullable|string',
        ]);

        if ($this->communityId) {
            // update
            $community = community::findOrFail($this->communityId);
            $community->update([
                'name' => $this->name,
                'district' => $this->district,
                'region' => $this->region,
            ]);

            $msg = "Community updated successfully!";
        } else {
            // create
            community::create([
                'name' => $this->name,
                'district' => $this->district,
                'region' => $this->region,
            ]);
            $msg = "Community created successfully!";
        }

        $this->reset(['communityId', 'district', 'name', 'region']);
        $this->dispatch('hide-community-modal');
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
            ->info('Are you sure you want to delete this Community? This will permanently delete the Community.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            community::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash("Community deleted!", 'success');
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
        return view('livewire.main.community-index');
    }
}
