<?php

namespace App\Livewire\Main\Pages;

use App\Models\Page;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PageIndex extends Component
{
    use WithPagination;
    // search input
    public $search = '';
    // Modal variables
    public $pageId = null;
    // For delete
    public $deleteId = null;
    /**
     * Computed property to get filtered tags
     */
    public function getPagesProperty()
    {
        // Query tag with optional search
        return Page::query()
            ->when($this->search, function ($query) {
                $query->where('status', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
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
            ->info('Are you sure you want to delete this page? This will permanently delete the page.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            Page::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash("Page deleted!", 'success');
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
        return view('livewire.main.pages.page-index');
    }
}
