<div>
    <form wire:submit='submit' class="project-feedback-form">

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
                    <option value="inquiry">Inquiry</option>
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
                                                                                        @enderror"
                    wire:model="subject">
                @error('subject')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            @endif
            <div class="col-12 mb-3">
                <strong><label for="message">Message</label></strong>
                <textarea wire:model="message" id="message"
                    class="form-control @error('message') is-invalid border-danger @enderror" placeholder="Message"
                    style="height: 100px"></textarea>

                @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if ($this->type === 'testimony' || $this->type === 'feedback')
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid border-danger @enderror"
                    wire:model="image">
                @error('image') <span class="text-danger small">{{ $message }}</span> @enderror

                @if($image && !$errors->has('image'))
                <div class="mt-2">
                    <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" width="100">
                </div>
                @endif
            </div>
            @endif

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
        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                Submit Feedback
            </button>
        </div>
    </form>
</div>