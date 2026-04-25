<?php

namespace App\Livewire\Guest;

use App\Models\Category;
use App\Models\Program;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Programs extends Component
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
        $this->selectedCategories = [];
    }

    public $program;

    public function readMore($id){
        $this->program = Program::findOrFail($id);
        $this->dispatch('open-modal');
    }
    public int $perPage = 3;

    public function loadMore(){
        $this->perPage += $this->perPage;
    }
    public function render()
    {
          $projects = Program::query()
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
            ->paginate($this->perPage);
        return view('livewire.guest.programs',['programs'=>$projects]);
    }
}
