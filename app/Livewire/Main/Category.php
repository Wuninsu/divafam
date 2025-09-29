<?php

namespace App\Livewire\Main;

use App\Models\Category as ModelsCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    // search input
    public $search = '';
    // Modal variables
    public $categoryId = null;
    public $name, $content, $status;

    // For delete
    public $deleteId = null;
    /**
     * Computed property to get filtered categories
     */
    public function getCategoriesProperty()
    {
        // Query category with optional search
        return ModelsCategory::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }


    /**
     * Open modal to create new category
     */
    public function createCategory()
    {
        $this->reset(['categoryId', 'name']);
        $this->dispatch('show-category-modal');
    }

    /**
     * Load category info into modal for editing
     */
    public function editCategory($id)
    {
        $category = modelsCategory::findOrFail($id);

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->status = $category->status === 1 ? true : false;

        $this->dispatch('show-category-modal');
    }

    /**
     * Handle create or update
     */
    public function createOrUpdateCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $this->categoryId,
            'status' => 'nullable|boolean',
        ]);

        if ($this->categoryId) {
            // update
            $category = ModelsCategory::findOrFail($this->categoryId);
            $category->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'status' => $this->status,
            ]);

            $msg = "Category updated successfully!";
        } else {
            // create
            ModelsCategory::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'status' => $this->status === null ? false : $this->status,
            ]);
            $msg = "Category created successfully!";
        }

        $this->reset(['categoryId', 'name', 'status']);
        $this->dispatch('hide-category-modal');
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
            ->info('Are you sure you want to delete this category? This will permanently delete the category.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            ModelsCategory::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash("Category deleted!", 'success');
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
        return view('livewire.main.category');
    }
}
