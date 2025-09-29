<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Sponsors</li>
        </ol>
    </nav>

    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Sponsors</h5>
                <small class="text-muted">Manage project sponsors.</small>
            </div>

            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.500ms="search" class="form-control form-control-sm"
                        placeholder="Search by donor or project...">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" type="button" wire:click="createSponsor">
                        <i class="fa fa-plus"></i> Add Sponsor
                    </button>
                </div>
            </div>

            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Donor</th>
                            <th>Project</th>
                            <th>Amount</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->sponsors as $index => $sponsor)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ optional($sponsor->donor)->name ?? '-' }}</td>
                            <td>{{ optional($sponsor->project)->title ?? '-' }}</td>
                            <td>{{ number_format($sponsor->amount, 2) }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($sponsor->start_date)->format('M d, Y') }}
                                <br>
                                <small class="text-muted">to</small>
                                {{ \Carbon\Carbon::parse($sponsor->end_date)->format('M d, Y') }}
                            </td>
                            <td>
                                <span class="badge bg-{{ $sponsor->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($sponsor->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click="editSponsor({{ $sponsor->id }})">Edit</button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click="confirmDelete({{ $sponsor->id }})">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-3">
                                No sponsors found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($this->sponsors->hasPages())
                <div class="mt-3">
                    {{ $this->sponsors->links() }}
                </div>
                @else
                <div class="mt-3 text-muted">
                    <em>No additional pages.</em>
                </div>
                @endif
            </div>
        </div>

        {{-- Modal --}}
        <div wire:ignore.self class="modal fade" id="sponsorModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdateSponsor" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $sponsorId ? 'Edit Sponsor' : 'Create Sponsor' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            {{-- Donor --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Donor</label>
                                <select class="form-select @error('donor_id') is-invalid @enderror"
                                    wire:model="donor_id">
                                    <option value="">Select Donor</option>
                                    @foreach ($donors as $donor)
                                    <option value="{{ $donor->id }}">{{ $donor->name }}</option>
                                    @endforeach
                                </select>
                                @error('donor_id') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Project --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Project</label>
                                <select class="form-select @error('project_id') is-invalid @enderror"
                                    wire:model="project_id">
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                                @error('project_id') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Amount --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('amount') is-invalid @enderror" wire:model="amount">
                                @error('amount') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Start Date --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    wire:model="start_date">
                                @error('start_date') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- End Date --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    wire:model="end_date">
                                @error('end_date') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" wire:model="status">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                @error('status') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $sponsorId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JavaScript for modal --}}
    @script
    <script>
        Livewire.on('show-sponsor-modal', () => {
            let modal = new bootstrap.Modal(document.getElementById('sponsorModal'));
            modal.show();
        });

        Livewire.on('hide-sponsor-modal', () => {
            let modalEl = document.getElementById('sponsorModal');
            let modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        });
    </script>
    @endscript
</div>