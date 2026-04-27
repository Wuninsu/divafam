<?php

namespace App\Livewire\Guest;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BlogDetail extends Component
{
    public $post;
    public bool $liked = false;

    public $replyToCommentId = null;
    public $commentText = '';

    protected $rules = [
        'commentText' => 'required|string|min:3|max:500',
    ];


    public function mount($post)
    {
        $this->post = $post;
        if (Auth::check()) {
            $this->liked = $post->postLikes()
                ->where('user_id', Auth::id())
                ->exists();
        } else {
            $this->liked = Cache::has($this->guestLikeKey());
        }
    }


    public function toggleLike()
    {
        if (Auth::check()) {

            $userId = Auth::id();
            $like = $this->post->postLikes()->where('user_id', $userId)->first();

            if ($like) {
                $like->delete();
                $this->liked = false;
            } else {
                $this->post->postLikes()->create(['user_id' => $userId]);
                $this->liked = true;
            }
        } else {
            // Guest like (cache)
            $key = $this->guestLikeKey();
            if (Cache::has($key)) {
                Cache::forget($key);
                $this->post->decrement('likes');
                $this->liked = false;
            } else {
                Cache::put($key, true, now()->addYear());
                $this->post->increment('likes');
                $this->liked = true;
            }
        }
    }

    private function guestLikeKey()
    {
        return 'post_like_' . $this->post->id . '_' . request()->ip();
    }
    
    public function submitComment()
    {
        $this->validate();

        if (Auth::check()) {

            // Save to DB
            $this->post->comments()->create([
                'user_id' => Auth::id(),
                'body' => $this->commentText,
                'parent_id' => $this->replyToCommentId,
            ]);
        } else {

            $key = $this->guestCommentKey();
            $comments = Cache::get($key, []);

            // Basic anti-spam (limit per IP per post)
            if (count($comments) >= 5) {
                session()->flash('error', 'Comment limit reached.');
                return;
            }

            $comments[] = [
                'id' => Str::uuid()->toString(),
                'body' => $this->commentText,
                'name' => 'Guest',
                'created_at' => now(),
                'parent_id' => $this->replyToCommentId,
            ];

            Cache::put($key, $comments, now()->addDays(2));
        }

        $this->reset(['commentText', 'replyToCommentId']);

        session()->flash('success', 'Comment added successfully.');
    }

    private function guestCommentKey()
    {
        return 'post_comments_' . $this->post->id . '_' . request()->ip();
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
        // Always refresh post (important after increment/decrement)
        $this->post->refresh();

        // DB comments
        $dbComments = $this->post
            ->comments()
            ->with(['user', 'replies.user'])
            ->whereNull('parent_id')
            ->latest()
            ->get();

        // Guest comments (from cache)
        $guestComments = collect(Cache::get($this->guestCommentKey(), []))
            ->whereNull('parent_id')
            ->map(function ($comment) {
                return (object) $comment;
            });

        // Merge both
        $comments = $dbComments->concat($guestComments);

        // Total likes (Auth likes + guest likes column)
        $totalLikes = $this->post->postLikes()->count() + ($this->post->likes ?? 0);

        return view('livewire.guest.blog-detail', [
            'comments' => $comments,
            'totalLikes' => $totalLikes,
        ]);
    }
}
