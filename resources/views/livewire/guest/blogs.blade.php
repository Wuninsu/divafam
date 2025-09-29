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
                            <li class="breadcrumb-item active" aria-current="page">News</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- blog -->
    <div class="content">
        <div class="container">

            <div class="row">
                <!-- Blog Sidebar -->
                <div class="col-lg-4 sidebar-left mt-4 mt-lg-0 theiaStickySidebar">

                    <!-- Search -->
                    <div class="search-widget blog-search blog-widget">
                        <div>
                            <h5 class="mb-3 fs-18">Search</h5>
                            <form class="search-form">
                                <div class="position-relative">
                                    <input type="text" wire:model.live.debounce.3000ms='search' placeholder="Search..."
                                        class="form-control">
                                    <button type="button" class="search-btn"><i
                                            class="isax isax-search-normal-1"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="accordion" id="filtersAccordion">

                        <!-- /Search -->
                        <div class="blog-widget mb-4">
                            <div class="accordion" id="categoryAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingCategories">
                                        <button
                                            class="accordion-button fs-18 fw-semibold px-3 py-2 {{ empty($selectedCategories) ? 'collapsed' : '' }}"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategories"
                                            aria-expanded="{{ empty($selectedCategories) ? 'false' : 'true' }}"
                                            aria-controls="collapseCategories">
                                            Categories
                                        </button>
                                    </h2>
                                    <div id="collapseCategories"
                                        class="accordion-collapse collapse {{ !empty($selectedCategories) ? 'show' : '' }}"
                                        aria-labelledby="headingCategories" data-bs-parent="#categoryAccordion">
                                        <div class="accordion-body p-3">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="fs-14 fw-bold text-muted">Filter by category</span>
                                                @if (!empty($selectedCategories))
                                                <button wire:click="clearFilters"
                                                    class="btn btn-sm btn-link">Clear</button>
                                                @endif
                                            </div>
                                            <div class="categories-list">
                                                @foreach ($categories as $category)
                                                <h6 class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="form-check">
                                                        <input type="checkbox" wire:model.live="selectedCategories"
                                                            value="{{ $category->id }}" id="cat-{{ $category->id }}"
                                                            class="form-check-input me-2">
                                                        <label class="form-check-label fs-14 text-secondary fw-bold"
                                                            for="cat-{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </label>
                                                    </div>
                                                    <span class="badge rounded-pill bg-light text-dark">
                                                        {{ $category->posts_count }}
                                                    </span>
                                                </h6>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTags">
                                        <button
                                            class="accordion-button accordion-button fs-18 fw-semibold px-3 py-2 {{ empty($selectedTags) ? 'collapsed' : '' }}"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseTags"
                                            aria-expanded="{{ empty($selectedTags) ? 'false' : 'true' }}"
                                            aria-controls="collapseTags">
                                            Tags
                                        </button>
                                    </h2>
                                    <div id="collapseTags"
                                        class="accordion-collapse collapse {{ empty($selectedTags) ? '' : 'show' }}"
                                        aria-labelledby="headingTags" data-bs-parent="#filtersAccordion">
                                        <div class="accordion-body">
                                            <h5 class="fs-18 mb-3">Latest Tags</h5>
                                            <ul class="latest-tags list-unstyled d-flex flex-wrap gap-2">
                                                @foreach ($allTags as $tag)
                                                <li>
                                                    <label
                                                        class="tag rounded-1 p-2 fs-10 fw-medium d-flex align-items-center
                                                                                    {{ in_array($tag->id, $selectedTags) ? 'bg-primary text-white' : 'bg-light text-dark' }}">
                                                        <input type="checkbox" wire:model.live="selectedTags"
                                                            value="{{ $tag->id }}" class="me-1"
                                                            style="margin-top: 2px;">
                                                        {{ $tag->name }}
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /Blog Sidebar -->
                <div class="col-lg-8">
                    <div class="row">
                        @forelse ($posts as $post)

                        <div class="col-md-6">
                            <div class="blog">
                                <div class="blog-image">
                                    <a href="{{ route('guest.news.show', ['slug' => $post->slug]) }}">
                                        <img class="img-fluid w-100" style="height: 250px; object-fit: cover;"
                                            src="{{asset($post->cover_image ?? NO_IMAGE)}}" alt="img">
                                    </a>
                                </div>
                                <div class="blog-item">
                                    <span class="badge bg-success mb-2">{{$post?->category->name}}</span>
                                    <h5 class="mb-2"><a
                                            href="{{ route('guest.news.show', ['slug' => $post->slug]) }}">{{$post->title}}</a>
                                    </h5>
                                    <p class="text-truncate line-clamb-2">{{$post->summary}}</p>
                                    <div class="blog-info">
                                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                                            <div class="d-flex align-items-center user-profile">
                                                <a href="#" class="user-img">
                                                    <img class="rounded-pill w-auto"
                                                        src="{{asset($post->author->avatar_url ?? NO_IMAGE)}}"
                                                        alt="img">
                                                </a>
                                                <a href="#" class="user-name">{{$post->author->name}}</a>
                                            </div>
                                            <ul class="d-flex align-items-center flex-wrap gap-2">
                                                <li>
                                                    <div wire:ignore>
                                                        <i class="fa fa-calendar me-1"></i>
                                                    </div>
                                                    <p>{{$post->created_at->format('jS M, Y')}}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty

                        <div class="col-12 text-center">
                            <div class="alert alert-warning" role="alert">
                                <strong>Note:</strong>No blog post available right now.
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <!-- /pagination -->
                    <div class="row align-items-center">
                        @if ($posts->hasPages())
                        <div class="mt-3">
                            {{ $posts->links() }}
                        </div>
                        @else
                        <div class="mt-3 text-muted">
                            <em>No additional pages.</em>
                        </div>
                        @endif
                    </div>
                    <!-- /pagination -->
                </div>
            </div>
        </div>
    </div>
    <!-- blog -->
</div>