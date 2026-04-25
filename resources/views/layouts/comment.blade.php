<div class="comment-box mb-4">
    <div class="d-flex gap-3">

        <!-- AVATAR -->
        <img src="{{ isset($comment->user)
                ? asset($comment->user->avatar_url ?? NO_IMAGE)
                : asset(NO_IMAGE) }}"
             class="user-avatar"
             alt="User Avatar">

        <div class="flex-grow-1">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-2">

                <h6 class="mb-0">
                    {{ isset($comment->user)
                        ? $comment->user->name
                        : ($comment->name ?? 'Guest') }}
                </h6>

                <span class="comment-time">
                    {{ isset($comment->created_at) && $comment->created_at instanceof \Carbon\Carbon
                        ? $comment->created_at->diffForHumans()
                        : \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                </span>

            </div>

            <!-- BODY -->
            <p class="mb-2">{{ $comment->body }}</p>

            <!-- ACTIONS -->
            <div class="comment-actions d-flex gap-3">

                {{-- Only allow reply if comment has real ID (DB or UUID) --}}
                @if(isset($comment->id))
                    <a href="#" wire:click.prevent="replyTo('{{ $comment->id }}')">
                        <i class="bi bi-reply"></i> Reply
                    </a>
                @endif

            </div>

            <!-- REPLIES -->
            @if(isset($comment->replies) && count($comment->replies))
                <div class="mt-3 ps-4 border-start">

                    @foreach($comment->replies as $reply)
                        @include('layouts.comment', ['comment' => $reply])
                    @endforeach

                </div>
            @endif

        </div>
    </div>
</div>