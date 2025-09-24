<div class="comment-box mb-4">
    <div class="d-flex gap-3">
        <img src="{{ asset($comment->user->avatar_url ?? NO_IMAGE) }}" class="user-avatar" alt="User Avatar">
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">{{ $comment->user->name }}</h6>
                <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="mb-2">{{ $comment->body }}</p>
            <div class="comment-actions d-flex gap-3">
                <a href="#" wire:click.prevent="replyTo({{ $comment->id }})"><i class="bi bi-reply"></i> Reply</a>
            </div>

            <!-- Replies -->
            @if($comment->replies->count())
            <div class="mt-3 ps-4 border-start">
                @foreach($comment->replies as $reply)
                @include('layouts.comment', ['comment' => $reply])
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>