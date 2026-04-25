<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Documents</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Documents</h5>
                <small class="text-muted">Manage files.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search by key...">
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="$dispatch('show-modal')">
                        <i class="fa fa-plus"></i>
                        Add Document
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($documents as $index => $document)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="text-nowrap text-heading">{{ $document->file_name }}</span>
                            </td>
                            <td>
                                {{$document->file_type}}
                            </td>
                            <td>
                                {{ number_format($document->file_size / 1024, 2) }} KB
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click="edit({{ $document->id }})">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click="confirmDelete('{{ $document->id }}')" data-bs-toggle="tooltip"
                                        data-bs-placement="top" aria-label="Delete"
                                        data-bs-original-title="Delete">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                No tags found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot></tfoot>
                </table>
                @if ($documents->hasPages())
                <div class="mt-3">
                    {{ $documents->links() }}
                </div>
                @else
                <div class="mt-3 text-muted">
                    <em>No additional pages.</em>
                </div>
                @endif
            </div>
        </div>

        <!-- /Modal -->


        <!-- Add New Modal -->
        <div wire:ignore.self class="modal fade" id="addModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>{{$isEdit ? 'Edit' : 'Add'}} document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Key -->
                        <div class="mb-3">
                            <label class="form-label">Document Name</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                wire:model="title">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                wire:model="description"></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">File</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                wire:model.live="file">
                            <div wire:loading wire:target="file" class="mt-2">
                                <div class="spinner-border text-primary spinner-border-sm" role="status"></div>
                                <span class="small text-muted">Uploading...</span>
                            </div>

                            @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" wire:click="createUpdate">
                            {{$isEdit ? 'Edit' : 'Save'}}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @script
    <script>
        Livewire.on('show-modal', () => {
                    new bootstrap.Modal(document.getElementById('addModal')).show();
                });
                Livewire.on('hide-modal', () => {
                    bootstrap.Modal.getInstance(document.getElementById('addModal')).hide();
                });
    </script>
    @endscript
</div>