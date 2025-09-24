<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Divafam News</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/news">News</a></li>
                            <li class="breadcrumb-item active" aria-current="page">News Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- /Breadcrumb -->

    <!-- blog -->
    <div class="blog-sec blog-details">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Blog Content -->
                <div class="col-lg-10">
                    {{-- Cover Image --}}
                    <img class="img-fluid rounded-2" src="{{ asset($post->cover_image ?? NO_IMAGE) }}"
                        alt="{{ $post->title }}">

                    {{-- Blog Info --}}
                    <div class="blog-info my-3">
                        <ul class="d-flex align-items-center flex-wrap gap-3">
                            <li>
                                <div class="avatar avatar-sm rounded-pill me-2">
                                    <a href="#"><img class="rounded-pill w-auto"
                                            src="{{ asset($post->author->avatar_url ?? NO_IMAGE) }}" alt="img"></a>
                                </div>
                                <p><a href="#">{{ $post->author->name }}</a></p>
                            </li>
                            <li><i class="me-1 bi bi-calendar"></i> {{ $post->published_at->format('jS M, Y H:i a') }}
                            </li>
                            <li><i class="me-1 bi bi-folder"></i> {{ $post?->category->name }}</li>
                            <li><i class="me-1 bi bi-eye"></i> {{ $post->views ?? 0 }} views</li>
                            <li>
                                {{-- Like Button --}}
                                <form wire:submit.prevent="toggleLike">
                                    <button type="submit"
                                        class="btn btn-sm {{ $liked ? 'btn-primary' : 'btn-outline-primary' }}">
                                        <i class="bi bi-hand-thumbs-up"></i> {{ count($post->likes ?? []) }} Likes
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                    {{-- Title & Summary --}}
                    <h5 class="mb-3">{{ $post->title }}</h5>
                    <p>{{ $post->summary }}</p>

                    {{-- Content --}}
                    <div>{!! $post->content !!}</div>

                    {{-- Tags --}}
                    @if ($post->tags->count())
                    <div class="mt-4">
                        <strong>Tags:</strong>
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tags.show', $tag) }}" class="badge bg-secondary text-light">{{ $tag->name
                            }}</a>
                        @endforeach
                    </div>
                    @endif

                    {{-- Share Buttons --}}
                    <div class="my-4">
                        <h6>Share this post:</h6>
                        <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                            target="_blank" class="btn btn-sm btn-primary me-2">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}"
                            target="_blank" class="btn btn-sm btn-info text-white me-2">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(request()->fullUrl()) }}"
                            target="_blank" class="btn btn-sm btn-secondary">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </a>
                    </div>

                    {{-- Author Info --}}
                    <div
                        class="p-3 text-center text-md-start p-lg-4 my-4 bg-light-900 rounded-2 d-md-flex align-items-center">
                        <div class="avatar flex-shrink-0 blog-avatar">
                            <a href="#"><img class="img-fluid rounded-pill"
                                    src="{{ asset($post->author->avatar_url ?? NO_IMAGE) }}" alt="img"></a>
                        </div>
                        <div class="ps-md-3 mt-2 mt-md-0">
                            <span class="text-secondary mb-1">Author</span>
                            <h5 class="mb-1 fs-18"><a href="#">{{ $post->author->name ?? 'Unknown' }}</a></h5>
                            <p>{{ $post->author->bio ?? 'No biography' }}</p>
                        </div>
                    </div>

                    {{-- Comments Section --}}
                    <div class="mt-5">
                        <h5 class="mb-4">{{ count($post->comments ?? []) }} Comments</h5>

                        <div class="comment-section mt-5">

                            <!-- Flash Messages -->
                            @if (session()->has('success') || session()->has('error') || session()->has('info') ||
                            session()->has('warning'))
                            @php
                            $alertType = session()->has('success') ? 'success'
                            : (session()->has('error') ? 'danger'
                            : (session()->has('info') ? 'info'
                            : 'warning'));

                            $message = session('success') ?? session('error') ?? session('info') ?? session('warning');
                            @endphp

                            <div class="alert alert-{{ $alertType }} alert-dismissible fade show" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i> {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <!-- Comment Input -->
                            @auth

                            @else
                            <div class="mb-3">
                                <p class="small text-muted mb-2">to comment <a href="{{ route('login') }}">login</a> Or
                                    continue with:</p>
                                <div class="d-flex gap-2">
                                    <!-- Google Login -->
                                    <a href="{{ route('social.login', 'google') }}"
                                        class="btn btn-outline-danger btn-sm d-flex align-items-center gap-2">
                                        <i class="bi bi-google"></i> Google
                                    </a>

                                    <!-- Facebook Login -->
                                    <a href="{{ route('social.login', 'facebook') }}"
                                        class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2">
                                        <i class="bi bi-facebook"></i> Facebook
                                    </a>

                                    <!-- Twitter / X (optional) -->
                                    <a href="{{ route('social.login', 'twitter') }}"
                                        class="btn btn-outline-info btn-sm d-flex align-items-center gap-2">
                                        <i class="bi bi-twitter-x"></i> Twitter
                                    </a>
                                </div>
                            </div>
                            @endauth

                            <!-- Comment Input -->
                            <div id="comment-box" class="mb-4">
                                <div class="d-flex align-items-start gap-3">
                                    <img src="{{ asset(Auth::user()?->avatar_url ?? NO_IMAGE) }}" alt="User"
                                        class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-2 text-muted">Leave a Comment</h6>
                                        <form wire:submit.prevent="submitComment">
                                            <textarea wire:model.defer="commentText"
                                                class="form-control @error('commentText') is-invalid @enderror" rows="3"
                                                placeholder="{{ $replyToCommentId ? 'Replying...' : 'Write a comment...' }}"></textarea>
                                            @error('commentText')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                                @if($replyToCommentId)
                                                <span class="text-muted small">Replying to comment #{{ $replyToCommentId
                                                    }}</span>
                                                <button type="button" wire:click="cancelReply"
                                                    class="btn btn-sm btn-secondary">
                                                    Cancel Reply
                                                </button>
                                                @else
                                                <span></span>
                                                @endif

                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-send me-1"></i> Post Comment
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Comments List -->
                            <div class="comments-list">
                                @forelse($comments as $comment)
                                @include('layouts.comment', ['comment' => $comment])
                                @empty
                                no comments
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Blog Content -->

            </div>
        </div>




    </div>

    @push('scripts')
    <script>
        window.addEventListener('scroll-to-comment-box', () => {
            const commentBox = document.getElementById('comment-box');
    
            if (commentBox) {
                commentBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
    
                // Optional: focus on the textarea
                const textarea = commentBox.querySelector('textarea');
                if (textarea) {
                    textarea.focus();
                }
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
        const alertEl = document.querySelector('.alert-dismissible');
        if (alertEl) {
        setTimeout(() => {
        bootstrap.Alert.getOrCreateInstance(alertEl).close();
        }, 5000); // 5 seconds
        }
        });
    </script>
    @endpush
</div>