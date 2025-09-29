<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Inquiries</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Inquiries</h5>
                <small class="text-muted">Manage Enquiries, Feedbacks & Testimonies.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search inquiry...">
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="createInquiry">
                        <i class="fa fa-plus"></i>
                        Add inquiry
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th scope="col" style="width:19%; min-width:200px;">Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->inquiries as $index => $inquiry)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="text-nowrap text-heading">{{ ucfirst($inquiry->name) }}</span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">{{ ucfirst($inquiry->type) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $inquiry->status ? 'success' : 'secondary' }}">
                                    {{ $inquiry->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click='editInquiry({{ $inquiry->id }})'>Edit</button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click='confirmDelete({{ $inquiry->id }})'>Delete</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                No Enquiries found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot></tfoot>
                </table>
                @if ($this->inquiries->hasPages())
                <div class="mt-3">
                    {{ $this->inquiries->links() }}
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
        <div wire:ignore.self class="modal fade" id="inquiryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdateInquiry" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $inquiryId ? 'Edit Inquiry' : 'Create Inquiry' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid border-danger
                            @enderror" wire:model="name">
                                @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid border-danger
                                                        @enderror" wire:model="phone">
                                @error('phone')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid border-danger
                            @enderror" wire:model="email">
                                @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type</label>
                                <select class="form-select  @error('type') is-invalid border-danger
                            @enderror" wire:model.change="type">
                                    <option value="">Select Type</option>
                                    {{-- <option value="inquiry">Inquiry</option> --}}
                                    <option value="feedback">Feedback</option>
                                    <option value="testimony">Testimony</option>
                                </select>
                                @error('type')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($this->type === 'inquiry')
                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control @error('subject') is-invalid border-danger
                                                                                @enderror" wire:model="subject">
                                @error('subject')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            @endif
                            <div class="col-12 mb-3">
                                <strong><label for="message">Message</label></strong>
                                <textarea wire:model="message" id="message"
                                    class="form-control @error('message') is-invalid border-danger @enderror"
                                    placeholder="Message" style="height: 100px"></textarea>

                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" wire:model='status' id="flexSwitchCheckChecked"
                                        type="checkbox" checked="" />
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                                </div>
                            </div>
                            @if ($this->inquiryId)
                            <div class="col-md-6 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" wire:model='responded' id="responded"
                                        type="checkbox" checked="" />
                                    <label class="form-check-label" for="responded">Responded</label>
                                </div>
                            </div>
                            @endif
                            @if ($this->type === 'testimony' || $this->type === 'feedback')
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file"
                                    class="form-control @error('image') is-invalid border-danger @enderror"
                                    wire:model="image">
                                @error('image') <span class="text-danger small">{{ $message }}</span> @enderror

                                {{-- @if($image && !$errors->has('image')) --}}
                                <div class="mt-2">
                                    <img src="{{  asset($showImage) ?? $image->temporaryUrl() }}" class="img-thumbnail"
                                        width="100">
                                </div>
                                {{-- @endif --}}
                            </div>
                            @endif

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $inquiryId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
  

    @script
    <script>
        $wire.on('hide-inquiry-modal', (event) => {
                            $('#inquiryModal').modal('hide');
                                                   });
                        $wire.on('show-inquiry-modal', (event) => {
                            $('#inquiryModal').modal('show');
                        });
    </script>
    @endscript
</div>