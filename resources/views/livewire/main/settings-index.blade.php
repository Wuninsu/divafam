<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Settings</h5>
                <small class="text-muted">Manage general settings.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search by key...">
                </div>
                <div class="col-md-3 mb-2 mb-md-0">
                    <select class="form-select" wire:model.live="filterType">
                        <option value="">All Types</option>
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="file">File</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="$dispatch('show-add-modal')">
                        <i class="fa fa-plus"></i>
                        Add Key
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>KEY</th>
                            <th>VALUE</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($setups as $index => $setup)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="text-nowrap text-heading">{{ ucfirst(str_replace('_', ' ', $setup->key))
                                    }}</span>
                            </td>
                            <td>
                                @if ($setup->type === 'file')
                                <img src="{{ asset($setup->value ?? NO_IMAGE) }}" width="60" class="rounded">
                                @else
                                {{ Str::limit($setup->value, 10) }}
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $setup->status ? 'success' : 'secondary' }}">
                                    {{ $setup->status ? 'Visible' : 'Hidden' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click="edit({{ $setup->id }})">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click="deleteSetup('{{ $setup->id }}')" data-bs-toggle="tooltip"
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
                @if ($setups->hasPages())
                <div class="mt-3">
                    {{ $setups->links() }}
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
                        <h5>Add New Setup</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Key -->
                        <div class="mb-3">
                            <label class="form-label">Key</label>
                            <input type="text" class="form-control @error('newSetup.key') is-invalid @enderror"
                                wire:model="newSetup.key">
                            @error('newSetup.key')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select class="form-select @error('newSetup.type') is-invalid @enderror"
                                wire:model.live="newSetup.type">
                                <option value="text">Text</option>
                                <option value="textarea">Textarea</option>
                                <option value="file">File</option>
                            </select>
                            @error('newSetup.type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Value -->
                        <div class="mb-3">
                            <label class="form-label">Value</label>

                            @if ($newSetup['type'] === 'textarea')
                            <textarea class="form-control @error('newSetup.value') is-invalid @enderror"
                                wire:model="newSetup.value"></textarea>
                            @elseif ($newSetup['type'] === 'file')
                            {{-- File input --}}
                            <input type="file" class="form-control @error('newSetup.value') is-invalid @enderror"
                                wire:model.live="newSetup.value">

                            {{-- Loading indicator --}}
                            <div wire:loading wire:target="newSetup.value" class="mt-2">
                                <div class="spinner-border text-primary spinner-border-sm" role="status"></div>
                                <span class="small text-muted">Uploading...</span>
                            </div>

                            {{-- Preview image once uploaded --}}
                            @if ($newSetup['value'])
                            <div class="mb-2">
                                <img src="{{ $newSetup['value']->temporaryUrl() }}" width="100"
                                    class="rounded shadow-sm">
                            </div>
                            @endif
                            @else
                            <input type="text" class="form-control @error('newSetup.value') is-invalid @enderror"
                                wire:model="newSetup.value">
                            @endif

                            @error('newSetup.value')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select wire:model="newSetup.status"
                                class="form-select @error('newSetup.status') is-invalid @enderror">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('newSetup.status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" wire:click="create">Save</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Edit Modal -->
        <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Setup</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @if ($editing)
                        <div class="mb-3">
                            <label class="form-label">Key</label>
                            <input type="text" class="form-control" wire:model="editing.key" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Value</label>

                            @if ($editing['type'] === 'textarea')
                            <textarea class="form-control" wire:model="editing.value"></textarea>
                            @elseif ($editing['type'] === 'file')
                            {{-- File input --}}
                            <input type="file" class="form-control" wire:model="editing.value">

                            {{-- Show loading spinner while uploading --}}
                            <div wire:loading wire:target="editing.value" class="mt-2">
                                <div class="spinner-border text-primary spinner-border-sm" role="status">
                                </div>
                                <span class="small text-muted">Uploading...</span>
                            </div>

                            {{-- New upload preview --}}
                            @if ($editing['value'] instanceof
                            \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                            <img src="{{ $editing['value']->temporaryUrl() }}" width="100" class="d-block mb-2 rounded">

                            {{-- Old file preview if no new upload --}}
                            @elseif ($editing['value'])
                            <img src="{{ asset($editing['value']) }}" width="100" class="d-block mb-2 rounded">
                            @endif
                            @else
                            <input type="text" class="form-control" wire:model="editing.value">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select wire:model="editing.status" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" wire:click="update" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="update">Save</span>
                            <span wire:loading wire:target="update">
                                <div class="spinner-border spinner-border-sm text-light" role="status"></div>
                                Saving...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @script
    <script>
        Livewire.on('show-edit-modal', () => {
                    new bootstrap.Modal(document.getElementById('editModal')).show();
                });
                Livewire.on('hide-edit-modal', () => {
                    bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
                });

                Livewire.on('show-add-modal', () => {
                    new bootstrap.Modal(document.getElementById('addModal')).show();
                });
                Livewire.on('hide-add-modal', () => {
                    bootstrap.Modal.getInstance(document.getElementById('addModal')).hide();
                });
    </script>
    @endscript
</div>