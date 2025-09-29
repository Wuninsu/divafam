<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tags</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Tags</h5>
                <small class="text-muted">Manage tags.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search tag...">
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="createTag">
                        <i class="fa fa-plus"></i>
                        Add Tag
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th scope="col" style="width:19%; min-width:200px;">Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->tags as $index => $tag)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="text-nowrap text-heading">{{ ucfirst($tag->name) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $tag->is_active ? 'success' : 'secondary' }}">
                                    {{ $tag->is_active ? 'Visible' : 'Hidden' }}
                                </span>
                            </td>
                            <td>{{ $tag->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click='editTag({{ $tag->id }})'>Edit</button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click='confirmDelete({{ $tag->id }})'>Delete</button>
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
                @if ($this->tags->hasPages())
                <div class="mt-3">
                    {{ $this->tags->links() }}
                </div>
                @else
                <div class="mt-3 text-muted">
                    <em>No additional pages.</em>
                </div>
                @endif
            </div>
        </div>

        <!-- /Modal -->

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="tagModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdateTag" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $tagId ? 'Edit Tag' : 'Create Tag' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tag Name</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" wire:model='status' id="flexSwitchCheckChecked"
                                    type="checkbox" checked="" />
                                <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $tagId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    @script
    <script>
        // Listen to Livewire events and control modal
                Livewire.on('show-tag-modal', () => {
                    let modal = new bootstrap.Modal(document.getElementById('tagModal'));
                    modal.show();
                });
    
                Livewire.on('hide-tag-modal', () => {
                    let modalEl = document.getElementById('tagModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                });
    </script>
    @endscript
</div>