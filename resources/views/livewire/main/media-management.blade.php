<div>
    <div class="">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Media</li>
            </ol>
        </nav>
        <div class="mb-9">
            <h2 class="mb-5">Album</h2>
            <div class="d-flex flex-wrap gap-3 justify-content-between">
                <div>
                    <button class="btn btn-primary me-4" type="button" data-bs-toggle="modal"
                        data-bs-target="#addMediaModal">
                        <span class="fas fa-plus me-2"></span>
                        Add New
                    </button>
                    {{-- <button class="btn btn-link text-body me-4 px-0">
                        <span class="fa-solid fa-file-export fs-9 me-2"></span>
                        Export
                    </button> --}}
                </div>
                <div class="search-box">
                    <form class="position-relative"><input class="form-control search-input search" type="search"
                            placeholder="Search by name" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
            {{-- <ul class="nav nav-underline my-4 gap-0 w-max-content" data-filter-nav="data-filter-nav">
                <li class="nav-item"><a class="nav-link pe-3 cursor-pointer text-start active" data-filter="*">All</a>
                </li>
                <li class="nav-item"><a class="nav-link px-3 cursor-pointer" data-filter=".image">Image</a></li>
                <li class="nav-item"><a class="nav-link px-3 cursor-pointer" data-filter=".video">Video</a></li>
            </ul> --}}
            <div class="row g-4" id="gallery-album">
                @forelse ($allMedia as $projectId => $mediaItems)
                <div class="col-12  col-md-4">
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden position-relative">
                        <!-- Image container: Make the image full width -->
                        <div class="card-body p-0">
                            <div class="d-flex flex-wrap justify-content-center">
                                @foreach ($mediaItems as $index => $image)
                                @if ($index == 0)
                                <div class="w-100">
                                    <a href="{{route('media.show',['id'=>$image->project_id])}}">
                                        <img class="w-100 rounded-2 object-fit-cover transition-transform transform-hover"
                                            style="height: 250px; object-fit: cover;"
                                            src="{{ asset( ($image->path ?? NO_IMAGE)) }}" alt="{{ $image->alt_text }}">
                                    </a>
                                </div>
                                @endif
                                @break
                                <!-- Break after the first image -->
                                @endforeach
                            </div>
                        </div>

                        <!-- Dropdown Menu (Floating over the image) -->
                        <div class="dropdown position-absolute top-0 end-0 mt-3 me-3 z-5">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end py-2">
                                <li><a class="dropdown-item"
                                        href="{{route('media.show',['id'=>$image->project_id])}}">View</a></li>
                                <li><button type="button" wire:click='deleteCollection({{$image->project_id}})'
                                        class="dropdown-item text-danger" href="#">Delete</button></li>
                            </ul>
                        </div>

                        <!-- Project Title and Item Count -->
                        <div class="card-footer text-white text-center py-3">
                            <h5 class="mb-0">{{ $mediaItems->first()->project->title }}</h5>
                            <p class="text-muted mb-0">{{ $mediaItems->count() }} Items</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 mt-5">
                    <div class="alert alert-warning text-center mb-0" role="alert">
                        No media found. Please add new media.
                    </div>
                </div>
                @endforelse


            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="addMediaModal" tabindex="-1" aria-labelledby="addMediaModalForm"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMediaModalForm">Add Media</h5>
                        <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form wire:submit.prevent="submitMedia">
                            <div class="mb-3">
                                <label for="project_id" class="form-label">Project</label>
                                <select id="project_id" class="form-select" wire:model="project_id">
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Select Images</label>
                                <input type="file" id="images" class="form-control" wire:model="images" multiple>
                                @error('images.*')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Show Preview -->
                            @if ($images)
                            <div class="mt-3">
                                @foreach ($images as $image)
                                <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail me-2" width="100">
                                @endforeach
                            </div>
                            @endif

                            <div class="modal-footer">
                                <button class="btn btn-outline-primary" type="button"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" type="submit">Submit Media</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Add smooth transition on hover */
        .transition-transform {
            transition: transform 0.3s ease-in-out;
        }

        .transition-transform:hover {
            transform: scale(1.05);
        }
    </style>
    @script
    <script>
        $wire.on('close-modal', (event) => {
            $('#addMediaModal').modal('hide');
        });
    </script>
    @endscript
</div>