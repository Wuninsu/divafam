<?php

namespace App\Livewire\Main;

use App\Models\Tag;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TagIndex extends Component
{
    use WithPagination;
    // search input
    public $search = '';
    // Modal variables
    public $tagId = null;
    public $name, $content, $status;

    // For delete
    public $deleteId = null;
    /**
     * Computed property to get filtered tags
     */
    public function getTagsProperty()
    {
        // Query tag with optional search
        return Tag::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }


    /**
     * Open modal to create new tag
     */
    public function createTag()
    {
        $this->reset(['tagId', 'name']);
        $this->dispatch('show-tag-modal');
    }

    /**
     * Load tag info into modal for editing
     */
    public function editTag($id)
    {
        $tag = Tag::findOrFail($id);

        $this->tagId = $tag->id;
        $this->name = $tag->name;
        $this->status = $tag->is_active == 1 ? true : false;
        $this->dispatch('show-tag-modal');
    }

    /**
     * Handle create or update
     */
    public function createOrUpdateTag()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $this->tagId,
            'status' => 'nullable|boolean',
        ]);

        if ($this->tagId) {
            // update
            $tag = Tag::findOrFail($this->tagId);
            $tag->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'is_active' => $this->status,
            ]);

            $msg = "Tag updated successfully!";
        } else {
            // create
            Tag::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'is_active' => $this->status === null ? false : $this->status,
            ]);
            $msg = "Tag created successfully!";
        }

        $this->reset(['tagId', 'name', 'status']);
        $this->dispatch('hide-tag-modal');
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
            ->info('Are you sure you want to delete this tag? This will permanently delete the tag.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            Tag::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash("Tag deleted!", 'success');
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
        return view('livewire.main.tag-index');
    }
}
