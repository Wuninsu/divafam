<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Communities</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Communities</h5>
                <small class="text-muted">Manage Communities.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search community...">
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="createCommunity">
                        <i class="fa fa-plus"></i>
                        Add community
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>Name</th>
                            <th scope="col" style="width:19%; min-width:200px;">Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->communities as $index => $community)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="text-nowrap text-heading">{{ ucfirst($community->name) }}</span>
                                </td>
                                <td>
                                    <span class="text-nowrap text-heading">{{ ucfirst($community->district) }}</span>
                                </td>
                                <td>
                                    <span class="text-nowrap text-heading">{{ ucfirst($community->region) }}</span>
                                </td>
                                <td>{{ $community->created_at->format('d M Y, h:i A') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary"
                                            wire:click='editCommunity({{ $community->id }})'>Edit</button>
                                        <button class="btn btn-sm btn-outline-danger"
                                            wire:click='confirmDelete({{ $community->id }})'>Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    No Communities found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot></tfoot>
                </table>
                @if ($this->communities->hasPages())
                    <div class="mt-3">
                        {{ $this->communities->links() }}
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
        <div wire:ignore.self class="modal fade" id="communityModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdateCommunity" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $communityId ? 'Edit Community' : 'Create Community' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Community Name</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid border-danger
                            @enderror"
                                wire:model="name">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">District</label>
                            <input type="text"
                                class="form-control @error('district') is-invalid border-danger
                            @enderror"
                                wire:model="district">
                            @error('district')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Region</label>
                            <input type="text"
                                class="form-control @error('region') is-invalid border-danger @enderror"
                                wire:model="region">
                            @error('region')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $communityId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    @script
        <script>
            // Listen to Livewire events and control modal
            Livewire.on('show-community-modal', () => {
                let modal = new bootstrap.Modal(document.getElementById('communityModal'));
                modal.show();
            });

            Livewire.on('hide-community-modal', () => {
                let modalEl = document.getElementById('communityModal');
                let modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
            });
        </script>
    @endscript
</div>
