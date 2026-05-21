<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Donors</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Donors</h5>
                <small class="text-muted">Manage Donors.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search donor...">
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="createDonor">
                        <i class="fa fa-plus"></i>
                        Add Donor
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>CONTACT</th>
                            <th>TYPE</th>
                            <th>STATUS</th>
                            <th scope="col" style="width:19%; min-width:200px;">Created</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->donors as $index => $donor)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ ucfirst($donor->name) }}
                                </span>
                            </td>

                            <td class="email align-middle white-space-nowrap">
                                <a class="fw-semibold" href="mailto:{{ $donor->email }}">
                                    {{ $donor->email }}
                                </a>
                            </td>

                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ ucfirst($donor->contact_person) }}
                                </span>
                            </td>

                            {{-- Type --}}
                            <td>
                                @php
                                $badgeClass = match ($donor->type) {
                                'individual' => 'info',
                                'corporate' => 'primary',
                                'foundation' => 'success',
                                'government' => 'warning',
                                default => 'secondary',
                                };
                                @endphp
                                <span class="badge badge-phoenix badge-phoenix-{{ $badgeClass }} text-capitalized">
                                    {{ ucfirst($donor->type) }}
                                </span>
                            </td>

                            {{-- Active Status --}}
                            <td>
                                @if($donor->is_active)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>{{ $donor->created_at->format('d M Y, h:i A') }}</td>

                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click='editDonor({{ $donor->id }})'>
                                        Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click='confirmDelete({{ $donor->id }})'>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                No donors found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot></tfoot>
                </table>
                @if ($this->donors->hasPages())
                <div class="mt-3">
                    {{ $this->donors->links() }}
                </div>
                @else
                <div class="mt-3 text-muted">
                    <em>No additional pages.</em>
                </div>
                @endif
            </div>
        </div>

        <!-- /Modal -->
        <div wire:ignore.self class="modal fade" id="donorModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdateDonor" class="modal-content" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $donorId ? 'Edit Donor' : 'Create Donor' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {{-- Donor Name --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Donor Name</label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid border-danger @enderror"
                                    wire:model="name">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Contact Person --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Person</label>
                                <input type="text"
                                    class="form-control @error('contact_person') is-invalid border-danger @enderror"
                                    wire:model="contact_person">
                                @error('contact_person') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                    class="form-control @error('email') is-invalid border-danger @enderror"
                                    wire:model="email">
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text"
                                    class="form-control @error('phone') is-invalid border-danger @enderror"
                                    wire:model="phone">
                                @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Address --}}
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control @error('address') is-invalid border-danger @enderror"
                                    wire:model="address" rows="2"></textarea>
                                @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Type --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Donor Type</label>
                                <select class="form-select @error('type') is-invalid border-danger @enderror"
                                    wire:model="type">
                                    <option value="">Select Type</option>
                                    <option value="individual">Individual</option>
                                    <option value="foundation">Foundation</option>
                                    <option value="organization">Organization</option>
                                    <option value="corporate">Corporate</option>
                                </select>
                                @error('type') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Logo --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file"
                                    class="form-control @error('logo') is-invalid border-danger @enderror"
                                    wire:model="logo">
                                @error('logo') <span class="text-danger small">{{ $message }}</span> @enderror

                                @if($logo && !$errors->has('logo'))
                                <div class="mt-2">
                                    <img src="{{ is_string($logo) ? asset($logo) : $logo->temporaryUrl() }}"
                                        class="img-thumbnail" width="100">
                                </div>

                                @else
                                <div class="mt-2">
                                    <img src="{{ asset($showImage) }}"
                                        class="img-thumbnail" width="100">
                                </div>
                                @endif
                            </div>
                            {{-- Active Status --}}
                            <div class="col-12 mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox"
                                        class="form-check-input @error('is_active') is-invalid @enderror" id="is_active"
                                        wire:model="is_active">
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                    @error('is_active')
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $donorId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    @script
    <script>
        // Listen to Livewire events and control modal
                Livewire.on('show-donor-modal', () => {
                    let modal = new bootstrap.Modal(document.getElementById('donorModal'));
                    modal.show();
                });
    
                Livewire.on('hide-donor-modal', () => {
                    let modalEl = document.getElementById('donorModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                });
    </script>
    @endscript
</div>