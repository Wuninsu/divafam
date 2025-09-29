<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Donations</li>
        </ol>
    </nav>

    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Donations</h5>
                <small class="text-muted">Manage all donations.</small>
            </div>

            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.500ms="search" class="form-control form-control-sm"
                        placeholder="Search donation...">
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="createDonation">
                        <i class="fa fa-plus"></i> Add Donation
                    </button>
                </div>
            </div>

            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Donor</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->donations as $index => $donation)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ optional($donation->donor)->name ?? '-' }}</td>
                            <td>{{ number_format($donation->amount, 2) }}</td>
                            <td>{{ strtoupper($donation->currency) }}</td>
                            <td>{{ ucfirst($donation->donation_type) }}</td>
                            <td>{{ Str::limit($donation->item_description, 40) }}</td>
                            <td>{{ \Carbon\Carbon::parse($donation->donation_date)->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click='editDonation({{ $donation->id }})'>Edit</button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click='confirmDelete({{ $donation->id }})'>Delete</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">
                                No donations found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($this->donations->hasPages())
                <div class="mt-3">
                    {{ $this->donations->links() }}
                </div>
                @else
                <div class="mt-3 text-muted">
                    <em>No additional pages.</em>
                </div>
                @endif
            </div>
        </div>

        {{-- Modal --}}
        <div wire:ignore.self class="modal fade" id="donationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdateDonation" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $donationId ? 'Edit Donation' : 'Create Donation' }}
                        </h5>
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

                            {{-- Amount --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('amount') is-invalid border-danger @enderror"
                                    wire:model="amount">
                                @error('amount') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Currency --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Currency</label>
                                <input type="text"
                                    class="form-control @error('currency') is-invalid border-danger @enderror"
                                    wire:model="currency" placeholder="e.g. USD">
                                @error('currency') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Donation Type --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Donation Type</label>
                                <input type="text"
                                    class="form-control @error('donation_type') is-invalid border-danger @enderror"
                                    wire:model="donation_type" placeholder="e.g. cash, goods">
                                @error('donation_type') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Item Description --}}
                            <div class="col-12 mb-3">
                                <label class="form-label">Item Description</label>
                                <textarea rows="2"
                                    class="form-control @error('item_description') is-invalid border-danger @enderror"
                                    wire:model="item_description"></textarea>
                                @error('item_description') <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Donation Date --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Donation Date</label>
                                <input type="date"
                                    class="form-control @error('donation_date') is-invalid border-danger @enderror"
                                    wire:model="donation_date">
                                @error('donation_date') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            {{-- Notes --}}
                            <div class="col-12 mb-3">
                                <label class="form-label">Notes</label>
                                <textarea rows="2"
                                    class="form-control @error('notes') is-invalid border-danger @enderror"
                                    wire:model="notes"></textarea>
                                @error('notes') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $donationId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JS for modal --}}
    @script
    <script>
        Livewire.on('show-donation-modal', () => {
            let modal = new bootstrap.Modal(document.getElementById('donationModal'));
            modal.show();
        });

        Livewire.on('hide-donation-modal', () => {
            let modalEl = document.getElementById('donationModal');
            let modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        });
    </script>
    @endscript
</div>