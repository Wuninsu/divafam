<div>
    <div class="breadcrumb-hero text-center">
        <div class="container">
            <h1 class="breadcrumb-title">Divafam Projects</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="py-5 bg-light">
        <div class="container">

            <div class="row g-4">

                <!-- FILTER SIDEBAR -->
                <div class="col-lg-3">

                    <div class="sticky-top" style="top: 90px;">

                        <div class="card border-0 shadow-sm filter-card">

                            <div class="card-body">

                                <!-- HEADER -->
                                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">

                                    <h6 class="mb-0 fw-bold d-flex align-items-center">
                                        <i class="feather-filter me-2 text-success"></i>
                                        Filters
                                    </h6>

                                    @if (!empty($selectedCategories))
                                    <button wire:click="clearFilters" class="btn btn-sm btn-outline-danger">
                                        Clear
                                    </button>
                                    @endif

                                </div>

                                <!-- ACCORDION -->
                                <div class="accordion border-0" id="filterAccordion">

                                    <div class="accordion-item border-0">

                                        <h2 class="accordion-header">

                                            <button class="accordion-button bg-transparent shadow-none px-0
                            {{ empty($selectedCategories) ? 'collapsed' : '' }}" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseCategories"
                                                aria-expanded="{{ empty($selectedCategories) ? 'false' : 'true' }}">

                                                <span class="fw-semibold">Categories</span>

                                            </button>

                                        </h2>

                                        <div id="collapseCategories" class="accordion-collapse collapse
                         {{ !empty($selectedCategories) ? 'show' : '' }}">

                                            <div class="accordion-body px-0 pt-2">

                                                @foreach ($categories as $category)

                                                <div class="form-check mb-2">

                                                    <input class="form-check-input" type="checkbox"
                                                        wire:model.live="selectedCategories" value="{{ $category->id }}"
                                                        id="cat{{ $category->id }}">

                                                    <label class="form-check-label small" for="cat{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </label>

                                                </div>

                                                @endforeach

                                                @if($categories->count() > 10)
                                                <a href="javascript:void(0);" class="text-success small fw-medium">
                                                    See More
                                                </a>
                                                @endif

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <!-- MAIN CONTENT -->
                <div class="col-lg-9">

                    <!-- FILTER BAR -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                            <div class="row g-2 align-items-center">

                                <!-- STATUS -->
                                <div class="col-md-4">
                                    <select class="form-select" wire:model.live="status">
                                        <option value="">All Status</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                        <option value="postponed">Upcoming</option>
                                    </select>
                                </div>

                                <!-- SEARCH -->
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white">
                                            <i class="isax isax-search-normal-1"></i>
                                        </span>

                                        <input type="text" class="form-control" wire:model.live.debounce.500ms="search"
                                            placeholder="Search projects...">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- PROJECT GRID -->
                    <div class="row g-4 project-grid">

                        @forelse ($projects as $project)
                        <div class="col-md-6">

                            <div class="card project-card h-100 border-0">

                                <!-- IMAGE -->
                                <div class="position-relative project-img">

                                    <img src="{{ asset($project->cover_image ?? NO_IMAGE) }}" class="w-100"
                                        style="height: 220px; object-fit: cover;">

                                    @php
                                    $badge = match($project->status) {
                                    'ongoing' => 'warning',
                                    'completed' => 'success',
                                    'postponed' => 'danger',
                                    default => 'secondary',
                                    };
                                    @endphp

                                    <span
                                        class="position-absolute top-0 start-0 m-2 badge bg-{{ $badge }} project-badge">
                                        {{ ucfirst($project->status) }}
                                    </span>

                                </div>

                                <!-- BODY -->
                                <div class="card-body project-body">

                                    <div class="d-flex justify-content-between align-items-center mb-2">

                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($project->user->avatar_url ?? NO_IMAGE) }}"
                                                class="rounded-circle me-2 border" width="32" height="32">

                                            <small class="text-muted fw-medium">
                                                {{ \Illuminate\Support\Str::limit($project->user->name, 12) }}
                                            </small>
                                        </div>

                                        <span class="badge bg-light text-dark border category-badge">
                                            {{ $project->category->name }}
                                        </span>

                                    </div>

                                    <h6 class="project-title">
                                        {{ $project->title }}
                                    </h6>

                                    <a href="{{ route('guest.projects.show', $project->slug) }}"
                                        class="btn btn-success btn-sm w-100 mt-3 project-btn">
                                        View Project
                                    </a>

                                </div>

                            </div>

                        </div>

                        @empty
                        <div class="col-12">
                            <div class="text-center py-5 px-3 border rounded-4 bg-white shadow-sm">

                                <div class="mb-3">
                                    <i class="feather-folder-x fs-1 text-muted"></i>
                                </div>

                                <h5 class="fw-semibold mb-2">No Projects Found</h5>

                                <p class="text-muted small mb-3">
                                    We couldn’t find any projects matching your current filters.
                                    Try adjusting your search or clearing filters.
                                </p>

                                @if (!empty($selectedCategories) || $search || $status)
                                <button wire:click="clearFilters" class="btn btn-outline-success btn-sm">
                                    Clear Filters
                                </button>
                                @endif

                            </div>
                        </div>
                        @endforelse

                    </div>
                    <style>
                        .project-card {
                            border-radius: 14px;
                            background: var(--surface);
                            transition: var(--transition);
                            overflow: hidden;
                            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
                        }

                        /* hover effect */
                        .project-card:hover {
                            transform: translateY(-6px);
                            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.10);
                        }

                        /* image zoom effect */
                        .project-img {
                            overflow: hidden;
                        }

                        .project-img img {
                            transition: transform 0.4s ease;
                        }

                        .project-card:hover .project-img img {
                            transform: scale(1.05);
                        }

                        /* badge styling */
                        .project-badge {
                            font-size: 11px;
                            padding: 6px 10px;
                            border-radius: 20px;
                            text-transform: capitalize;
                        }

                        /* title */
                        .project-title {
                            font-weight: 600;
                            color: var(--text);
                            margin-top: 10px;
                            min-height: 40px;
                        }

                        /* category badge */
                        .category-badge {
                            font-size: 11px;
                            padding: 5px 10px;
                            border-radius: 20px;
                        }

                        /* button */
                        .project-btn {
                            border-radius: 10px;
                            font-weight: 500;
                            transition: 0.3s ease;
                        }

                        .project-btn:hover {
                            background: var(--brand-700);
                            transform: translateY(-1px);
                        }
                    </style>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $projects->links() }}
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>