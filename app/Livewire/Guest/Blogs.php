<?php

namespace App\Livewire\Guest;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;

    public string $status = '';
    public $search = '';
    public string $tags = '';


    public array $selectedCategories = [];
    public array $selectedTags = [];

    protected $queryString = [
        'selectedCategories' => ['except' => []],
        'tags' => ['except' => ''],
        'page' => ['except' => 1],
        'status' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public function updatingSelectedCategories()
    {
        $this->resetPage();
    }

    public function updatingSelectedTags()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->selectedCategories = [];
        $this->selectedTags = [];
        $this->tags = '';
        $this->resetPage();
    }
    public function mount()
    {
        $this->selectedTags = array_filter(explode(',', $this->tags));
    }


    public function updatedSelectedTags()
    {
        // Update tags query string when checkboxes change
        $this->tags = implode(',', $this->selectedTags);
    }

    public function render()
    {
        $posts = Post::with(['category', 'tags'])
            ->where('is_active', true)
            ->where('is_approved', true)
            ->where('status', 'published')
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
            ->paginate(6);



        $categories = Category::where('status', true)
            ->withCount('activePosts')
            ->get();


        $allTags = Tag::where('is_active', true)
            ->withCount('posts')
            ->get();

        return view('livewire.guest.blogs', compact('posts', 'categories', 'allTags'));
    }
}
