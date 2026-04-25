<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Programs</li>
        </ol>
    </nav>
    <div class="mb-9">
        <div id="programSummary">
            <div class="row mb-4 gx-6 gy-3 align-items-center">
                <div class="col-auto">
                    <h2 class="mb-0">Programs<span class="fw-normal text-body-tertiary ms-3">({{
                            array_sum($statusCounts) }})</span></h2>
                </div>
                @can('create project')
                <div class="col-auto">
                    {{-- <a class="btn btn-primary px-5" href="{{ route('programs.create') }}">
                        <i class="fa-solid fa-plus me-2"></i>Add new Program</a> --}}
                    <button class="btn add-new btn-primary" type="button" wire:click="openModal">
                        <i class="fa fa-plus"></i>
                        Add new Program
                    </button>
                </div>

                @endcan
            </div>
            <div class="row g-3 justify-content-between align-items-end mb-4">
                <div class="col-12 col-sm-auto">
                    <ul class="nav nav-links mx-n2 program-tab">
                        {{-- All --}}
                        <li class="nav-item">
                            <a wire:click.prevent="$set('status', '')"
                                class="nav-link px-2 py-1 {{ $status === '' ? 'active' : '' }}" href="#">
                                <span>All</span>
                                <span class="text-body-tertiary fw-semibold">
                                    ({{ array_sum($statusCounts) }})
                                </span>
                            </a>
                        </li>

                        {{-- Loop through statuses --}}
                        @foreach (['active' => 'active', 'inactive' => 'inactive'] as $key => $label)
                        <li class="nav-item">
                            <a wire:click.prevent="$set('status', '{{ $key }}')"
                                class="nav-link px-2 py-1 {{ $status === $key ? 'active' : '' }}" href="#">
                                <span>{{ $label }}</span>
                                <span class="text-body-tertiary fw-semibold">
                                    ({{ $statusCounts[$key] ?? 0 }})
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="d-flex align-items-center">
                        <div class="search-box me-3">
                            <form class="position-relative"><input class="form-control search-input search"
                                    wire:model.live.debounce.1000ms="search" placeholder="Search programs"
                                    aria-label="Search">
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive scrollbar">
                <table class="table fs-9 mb-0 border-top border-translucent">
                    <thead>
                        <tr>
                            <th class="sort white-space-nowrap align-middle ps-0" scope="col" style="width:25%;">PROGRAM
                                NAME</th>
                            <th class="sort align-middle ps-3" scope="col" style="width:15%;">STATUS</th>
                            <th class="sort align-middle text-center" scope="col" style="width:10%;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($programs as $program)
                        <tr>
                            <td class="align-middle ps-0">{{ $program->name }}</td>
                            <td class="align-middle">
                                <img src="{{asset($program->image)}}" width="100" alt="">
                                <span
                                    class="badge badge-phoenix badge-phoenix-{{ $program->is_active ? 'success' : 'secondary' }} text-capitalized">
                                    {{ $program->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group">
                                    @can('update project')
                                    <button type="button" wire:click='edit({{ $program->id }})'
                                        class="btn btn-primary btn-sm">Edit</button>
                                    @endcan
                                    @can('delete project')
                                    <button type="button" wire:click='deleteProgram({{ $program->id }})'
                                        class="btn btn-danger btn-sm">Delete</button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">No program available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($programs->hasPages())
            <div class="mt-3">
                {{ $programs->links() }}
            </div>
            @else
            <div class="mt-3 text-muted">
                <em>No additional pages.</em>
            </div>
            @endif
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="programModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
            <form wire:submit.prevent="createOrUpdateProgram" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $programId ? 'Edit Program' : 'Create Program' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Program Name</label>
                        <input type="text" class="form-control @error('name') is-invalid border-danger
                            @enderror" wire:model="name">
                        @error('name')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea wire:model="description" class="form-control @error('description') is-invalid border-danger
                            @enderror" cols="30" rows="10"></textarea>
                        @error('description')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Status</label>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" wire:model="is_active"
                                id="isActiveSwitch">

                            <label class="form-check-label" for="isActiveSwitch">
                                {{ $is_active ? 'Active' : 'Inactive' }}
                            </label>
                        </div>

                        @error('is_active')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>

                        <input type="file" class="form-control @error('image') is-invalid border-danger @enderror"
                            wire:model="image">

                        @error('image')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror

                        <!-- PREVIEW -->
                        <div class="mt-3">
                            @if ($image)
                            <!-- New Upload Preview -->
                            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail" width="100">
                            <small class="d-block text-muted mt-1">New Image Preview</small>

                            @elseif ($programId && $existingImage)
                            <!-- Existing Image -->
                            <img src="{{ asset($existingImage) }}" alt="Current Image" class="img-thumbnail"
                                width="100">
                            <small class="d-block text-muted mt-1">Current Image</small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ $programId ? 'Update' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>


    @script
    <script>
        // Listen to Livewire events and control modal
            Livewire.on('show-program-modal', () => {
                let modal = new bootstrap.Modal(document.getElementById('programModal'));
                modal.show();
            });

            Livewire.on('hide-program-modal', () => {
                let modalEl = document.getElementById('programModal');
                let modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
            });
    </script>
    @endscript
</div>