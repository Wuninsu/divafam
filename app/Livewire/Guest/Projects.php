<?php

namespace App\Livewire\Guest;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    public string $status = '';
    public $search = '';
    protected $queryString = [
        'status' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public $categories;
    public function mount()
    {
        $this->categories = Category::all();
    }


    public array $selectedCategories = [];

    public function updatedSelectedCategories()
    {
        // Optional: do something when filters change (e.g., reset pagination)
    }

    public function clearFilters()
    {
        $this->reset('search', 'status', 'selectedCategories');
    }

    public function render()
    {
        $projects = Project::query()
            // ->when(!auth('web')->user()->hasAnyRole(['div', 'admin', 'director']), function ($query) {
            //     $query->where('user_id', auth('web')->id());
            // })
            ->when(!empty($this->selectedCategories), function ($query) {
                $query->whereIn('category_id', $this->selectedCategories);
            })
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(3);

        return view('livewire.guest.projects', compact('projects'));
    }
}
