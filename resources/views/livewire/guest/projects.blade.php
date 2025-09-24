<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Divafam Projects</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Projects</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Course -->
    <section class="course-content">
        <div class="container">
            <div class="row align-items-baseline">
                <div class="col-lg-3 theiaStickySidebar">
                    <div class="filter-clear">
                        <div class="clear-filter mb-4 pb-lg-2 d-flex align-items-center justify-content-between">
                            <h5><i class="feather-filter me-2"></i>Filters</h5>
                            <a href="javascript:void(0);" wire:click="clearFilters" class="clear-text">
                                Clear
                            </a>
                        </div>

                        <div class="accordion accordion-customicon1 accordions-items-seperate">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingcustomicon1One">
                                    <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapsecustomicon1One" aria-expanded="false"
                                        aria-controls="collapsecustomicon1One">
                                        Categories <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                </h2>
                                <div id="collapsecustomicon1One" class="accordion-collapse collapse"
                                    aria-labelledby="headingcustomicon1One"
                                    data-bs-parent="#accordioncustomicon1Example">
                                    <div class="accordion-body">

                                        @foreach ($categories as $category)
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" wire:model.live="selectedCategories"
                                                    value="{{ $category->id }}">
                                                <span class="checkmark"></span>
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                        @endforeach

                                        {{-- Optional see more link --}}
                                        @if($categories->count() > 10)
                                        <a href="javascript:void(0);" class="see-more-btn">See More</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">

                    <!-- Filter -->
                    <div class="showing-list mb-4">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="show-filter add-course-info">
                                    <form action="#">
                                        <div
                                            class="d-sm-flex justify-content-center justify-content-lg-end mb-1 mb-lg-0">
                                            <select wire:model.change='status' class="form-select">
                                                <option value="">All</option>
                                                <option value="ongoing">Ongoing</option>
                                                <option value="completed">Completed</option>
                                                <option value="postponed">Upcoming</option>
                                            </select>
                                            <div class=" search-group">
                                                <i class="isax isax-search-normal-1"></i>
                                                <input type="text" class="form-control"
                                                    wire:model.live.debounce.3000sm='search'
                                                    placeholder="Search project name...">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->

                    <div class="row">
                        @forelse ($projects as $project)
                        <div class="col-md-6">
                            <div class="course-item-two course-item mx-0">
                                <div class="course-img">
                                    <a href="{{ route('guest.projects.show', ['project' => $project->slug]) }}">
                                        <img src="{{asset($project->cover_image ?? NO_IMAGE)}}" alt="{{$project->slug}}"
                                            class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                                    </a>
                                    @php
                                    $badgeClass = match ($project->status) {
                                    'ongoing' => 'warning',
                                    'completed' => 'success',
                                    'draft' => 'secondary',
                                    'archived' => 'dark',
                                    'postponed' => 'danger',
                                    default => 'primary',
                                    };
                                    @endphp
                                    <div
                                        class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                        <div class="badge text-bg-{{$badgeClass}}">{{$project->status}}</div>
                                       
                                    </div>
                                </div>
                                <div class="course-content">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('guest.projects.show', ['project' => $project->slug]) }}"
                                                class="avatar avatar-sm">
                                                <img src="{{asset($project->user->avatar_url ?? NO_IMAGE)}}"
                                                    alt="Coordinator" class="img-fluid avatar avatar-sm rounded-circle">
                                            </a>
                                            <div class="ms-2">
                                                <a href="#" title="{{$project->user->name}}"
                                                    class="link-default fs-14">{{Illuminate\Support\Str::limit($project->user->name,12)}}</a>
                                            </div>
                                        </div>
                                        <span
                                            class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                            {{$project->category->name}}
                                        </span>
                                    </div>
                                    <h6 class="title mb-2"><a
                                            href="{{ route('guest.projects.show', ['project' => $project->slug]) }}">{{$project->title}}</a>
                                    </h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ route('guest.projects.show', ['project' => $project->slug]) }}"
                                            class="btn btn-dark btn-sm d-inline-flex align-items-center">View Project<i
                                                class="isax isax-arrow-right-3 ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse



                    </div>

                    <!-- /pagination -->
                    <div class="row align-items-center">
                        @if ($projects->hasPages())
                        <div class="mt-3">
                            {{ $projects->links() }}
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
    </section>
    <!-- /Course -->
</div>