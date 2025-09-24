<?php

namespace App\Livewire\Main;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public string $status = '';
    public $postId;
    public $search = '';
    protected $queryString = [
        'status' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public function deletePost($id)
    {
        $this->postId = $id;
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this post? Deleting a post is permanent and cannot be undone.');
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $post = Post::findOrFail($this->postId);

        if ($post) {
            $deleted = deleteImage($post, 'cover_image');
            $post->delete();
            flash()->success('Post deleted successfully.');
        } else {
            flash()->warning('Post not found.');
        }
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }

    public function render()
    {
        $posts = Post::query()
            ->when(!auth('web')->user()->hasAnyRole(['div', 'admin', 'director']), function ($query) {
                $query->where('author_id', auth('web')->id());
            })
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(paginationLimit());

        $userId = auth('web')->id();

        $statusCounts = Post::query()
            ->when(!auth('web')->user()->hasAnyRole(['div', 'admin', 'director']), function ($query) {
                $query->where('author_id', auth('web')->id());
            })
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        return view('livewire.main.post-index', compact('posts', 'statusCounts'));
    }
}
