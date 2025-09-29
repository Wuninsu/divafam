<div>
    <form wire:submit='submit' aria-labelledby="contact-form">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <label class="form-label mb-0">Name <span class="ms-1 text-danger">*</span></label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid border-danger  
                    @enderror" placeholder="Your Name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-2">
                    <label class="form-label mb-0">Email Address <span class="ms-1 text-danger">*</span></label>
                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid border-danger
                    @enderror" placeholder="your@email.com">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <label class="form-label mb-0">Subject</label>
                    <input type="text" wire:model="subject" class="form-control @error('subject') is-invalid border-danger
                    @enderror" placeholder="Subject">
                    @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label mb-0">Your Message</label>
            <textarea wire:model="message" class="form-control @error('message') is-invalid border-danger   
            @enderror" rows="4" placeholder="Type your message here..."></textarea>
            @error('message')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Displaying validation errors -->
        <div>
            @if (session()->has('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
            @endif

            @if (session()->has('error'))
            <div class="alert alert-danger mb-3">
                {{ session('error') }}
            </div>
            @endif
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-outline-primary btn-lg" wire:loading.attr="disabled">
                <span wire:loading wire:target="submit">
                    <i class="fas fa-spinner fa-spin me-2"></i>
                </span>
                Send inquiry
            </button>
        </div>
    </form>
</div>