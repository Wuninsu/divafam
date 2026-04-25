<div>
    <form wire:ignore.self>
        <div class="input-group">
            <input type="email" wire:model="email" class="form-control" placeholder="Enter your Email Address">
            <button type="button" wire:click='submit' class="btn btn-primary btn-sm">
                <i class="isax isax-send-2 me-1"></i>Subscribe
            </button>
        </div>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </form>
    @if (session()->has('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
    @endif

</div>