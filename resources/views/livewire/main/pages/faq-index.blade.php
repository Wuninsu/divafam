<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Enquiries</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Enquiries</h5>
                <small class="text-muted">Manage Enquiries.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search faq...">
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="createFaq">
                        <i class="fa fa-plus"></i>
                        Add faq
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Questions</th>
                            <th>Status</th>
                            <th scope="col" style="width:19%; min-width:200px;">Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->faqs as $index => $faq)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="text-nowrap text-heading">{{ ucfirst($faq->question) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $faq->is_active ? 'success' : 'secondary' }}">
                                    {{ $faq->is_active ? 'Visible' : 'Hidden' }}
                                </span>
                            </td>
                            <td>{{ $faq->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click='editFaq({{ $faq->id }})'>Edit</button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click='confirmDelete({{ $faq->id }})'>Delete</button>
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
                @if ($this->faqs->hasPages())
                <div class="mt-3">
                    {{ $this->faqs->links() }}
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
        <div wire:ignore.self class="modal fade" id="faqModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdateFaq" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $faqId ? 'Edit Enquiry' : 'Create Enquiry' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Question</label>
                            <input type="text" class="form-control @error('question') is-invalid border-danger
                            @enderror" wire:model="question">
                            @error('question')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <strong><label for="answer">Answer</label></strong>
                            <textarea wire:model="answer" id="answer"
                                class="form-control @error('answer') is-invalid border-danger @enderror"
                                placeholder="Answer" style="height: 250px"></textarea>

                            @error('answer')
                            <div class="invalid-feedback">{{ $message }}</div>
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
                            {{ $faqId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    @script
    <script>
        // Listen to Livewire events and control modal
                Livewire.on('show-faq-modal', () => {
                    let modal = new bootstrap.Modal(document.getElementById('faqModal'));
                    modal.show();
                });
    
                Livewire.on('hide-faq-modal', () => {
                    let modalEl = document.getElementById('faqModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                });
    </script>
    @endscript
</div>