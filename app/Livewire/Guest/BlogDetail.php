<?php

namespace App\Livewire\Guest;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogDetail extends Component
{
    public $post;
    public bool $liked = false;
    public $replyToCommentId = null;
    public function mount($post)
    {
        $this->post = $post;
        $this->liked = $post->likes()->where('user_id', Auth::id())->exists();
    }

    public function toggleLike()
    {
        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to like posts.');
            return;
        }

        $userId = Auth::id();
        $postId = $this->post->id;

        $like = $this->post->likes()->where('user_id', $userId)->first();

        if ($like) {
            // User already liked — remove the like
            $like->delete();
            $this->liked = false;
        } else {
            // Add a new like
            $this->post->likes()->create(['user_id' => $userId]);
            $this->liked = true;
        }

        $this->post->likes;
    }



    public $commentText = '';

    protected $rules = [
        'commentText' => 'required|string|min:3|max:500',
    ];

    public function submitComment()
    {
        $this->validate();

        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to comment.');
            return;
        }

        $this->post->comments()->create([
            'user_id' => Auth::id(),
            'body' => $this->commentText,
            'parent_id' => $this->replyToCommentId,
        ]);

        $this->reset(['commentText', 'replyToCommentId']);

        session()->flash('success', 'Comment added successfully.');
    }

    public function replyTo($commentId)
    {
        $this->replyToCommentId = $commentId;
        $this->dispatch('scroll-to-comment-box');
    }

    public function cancelReply()
    {
        $this->replyToCommentId = null;
    }



    public function render()
    {
        $comments = $this->post
            ->comments()
            ->with(['user', 'replies.user']) // eager load replies + users
            ->whereNull('parent_id')
            ->latest()
            ->get();


        return view('livewire.guest.blog-detail', compact('comments'));
    }
}
