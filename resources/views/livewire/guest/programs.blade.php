<div>
    <div class="breadcrumb-hero text-center">
        <div class="container">
            <h1 class="breadcrumb-title">Our Programs</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Programs</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="programs-section py-3">
        <div class="container">

            {{-- Section Header --}}
            <div class="text-center mb-5">
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    We design impactful programs that empower communities, improve livelihoods,
                    and create sustainable change.
                </p>
            </div>

            {{-- Programs Grid --}}
            <div class="row g-4">

                {{-- Program Card --}}
                @forelse ($programs as $program)
                <div class="col-lg-4 col-md-6">
                    <div class="program-card {{ $program->is_active ? 'border-primary' : '' }}">


                        {{-- Image --}}
                        <div class="program-image p-3">
                            <img src="{{asset($program->cover_image ?? setup_data('logo'))}}"
                                alt="{{ $program->name }}">
                        </div>

                        {{-- Content --}}
                        <div class="program-content">
                            <h5 class="program-title">{{ $program->name }}</h5>

                            {{-- <p class="program-text">
                                {!! Str::limit($program->description, 120) !!}
                            </p> --}}

                            {{-- CTA --}}
                            <button type="button" wire:click='readMore({{$program->id}})' class="btn btn-primary"><i
                                    class="fas fa-eye ms-1"></i> Read More</button>
                        </div>

                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="doc-empty text-center py-5">

                        <div class="empty-icon mb-3">
                            <i class="bi bi-diagram-3"></i>
                        </div>

                        <h5 class="mb-2">No Programs Available</h5>

                        <p class="text-muted mb-3">
                            There are currently no programs to display. Please check back later or explore other
                            sections of our work.
                        </p>

                        <a href="/" class="btn btn-outline-primary btn-sm">
                            Back to Home
                        </a>

                    </div>
                </div>
                @endforelse

            </div>
        </div>

        <div class="my-4 text-center">
            <button type="button" wire:click='loadMore' class="btn btn-lg btn-primary">Load More</button>
        </div>
    </section>



    <div wire:ignore.self class="modal fade" id="programModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow-sm rounded-4 overflow-hidden">

                <!-- HEADER -->
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold">
                        <i class="bi bi-diagram-3 me-2 text-success"></i>
                        Program Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body pt-3">

                    @if ($this->program)

                    <div class="row g-4">

                        <!-- IMAGE -->
                        <div class="col-lg-5">
                            <div class="program-image-wrapper">
                                <img src="{{ asset($this->program->image ?? setup_data('logo')) }}"
                                    class="img-fluid rounded-3 w-100" style="height: 240px; object-fit: cover;">
                            </div>
                        </div>

                        <!-- DETAILS -->
                        <div class="col-lg-7">

                            <!-- TITLE -->
                            <div class="mb-3">
                                <small class="text-muted d-block mb-1">Program Title</small>
                                <h5 class="fw-semibold mb-0">
                                    {{ $this->program->name }}
                                </h5>
                            </div>

                            <!-- DESCRIPTION -->
                            <div class="mb-3">
                                <small class="text-muted d-block mb-1">Description</small>
                                <p class="text-muted mb-0" style="line-height: 1.6;">
                                    {!! $this->program->description !!}
                                </p>
                            </div>

                            <!-- STATUS -->
                            <div class="mt-4">
                                <span
                                    class="badge rounded-pill px-3 py-2
                                {{ $this->program->is_active ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-muted' }}">
                                    <i
                                        class="bi {{ $this->program->is_active ? 'bi-check-circle' : 'bi-pause-circle' }} me-1"></i>
                                    {{ $this->program->is_active ? 'Active Program' : 'Inactive Program' }}
                                </span>
                            </div>

                        </div>
                    </div>

                    @endif

                </div>

                <!-- FOOTER -->
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>

            </div>
        </div>
    </div>

    @script
    <script>
        // Listen to Livewire events and control modal
            Livewire.on('open-modal', () => {
                let modal = new bootstrap.Modal(document.getElementById('programModal'));
                modal.show();
            });

            Livewire.on('close-modal', () => {
                let modalEl = document.getElementById('programModal');
                let modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
            });
    </script>
    @endscript

</div>