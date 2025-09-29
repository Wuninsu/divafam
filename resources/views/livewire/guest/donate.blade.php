<div>
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Donate</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('guest.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Donate</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="checkout-content">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="checkout-item-1">
                            <div class="border-bottom pb-3 mb-3">
                                <h5>Make Donation</h5>
                            </div>
                            <form wire:submit.prevent="initiatePayment">
                                <div class="row">
                                    <!-- Donor Choice -->
                                    <div class="col-md-12">
                                        <h5 class="text-muted mb-3">Would you like to be a donor?</h5>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" id="yes" type="radio"
                                                    wire:model.live="is_donor" value="1">
                                                <label class="form-check-label" for="yes">
                                                    Yes, I want to be a donor.
                                                </label>
                                            </div>
                                            <div class="form-check ms-4">
                                                <input class="form-check-input" id="no" type="radio"
                                                    wire:model.live="is_donor" value="0">
                                                <label class="form-check-label" for="no">
                                                    No, I want to remain anonymous.
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- If the user chooses to be a donor, show donor info section -->
                                    @if ($is_donor)
                                    <div class="col-md-12 mt-4">
                                        <h5 class="text-muted mb-3">Donor Information</h5>
                                    </div>

                                    <!-- Donor Name -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Donor Name<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('donor_name') is-invalid border-danger
                                            @enderror" wire:model="donor_name">
                                            @error('donor_name')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Contact Person -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Contact Person</label>
                                            <input type="text" class="form-control @error('contact_person') is-invalid border-danger
                                            @enderror" wire:model="contact_person">
                                            @error('contact_person')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Email<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid border-danger
                                            @enderror" wire:model="email">
                                            @error('email')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Phone<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('phone') is-invalid border-danger
                                            @enderror" wire:model="phone">
                                            @error('phone')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Address<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('address') is-invalid border-danger
                                            @enderror" wire:model="address">
                                            @error('address')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Donor Type -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Type<span
                                                    class="text-danger ms-1">*</span></label>
                                            <select
                                                class="form-select @error('donor_type') is-invalid border-danger @enderror"
                                                wire:model="donor_type">
                                                <option value="">Select Donor Type</option>
                                                <option value="individual">Individual</option>
                                                <option value="corporate">Corporate</option>
                                                <option value="foundation">Foundation</option>
                                                <option value="government">Government</option>
                                            </select>
                                            @error('donor_type')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Logo -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Logo</label>
                                            <input type="file" class="form-control @error('logo') is-invalid border-danger
                                            @enderror" wire:model="logo">
                                            @error('logo')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Donation Information Section -->
                                    <div class="col-md-12 mt-5">
                                        <h5 class="text-muted mb-3">Donation Information</h5>
                                    </div>

                                    <!-- Amount -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Amount<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="number" step="0.01" class="form-control @error('amount') is-invalid border-danger
                                            @enderror" wire:model="amount">
                                            @error('amount')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Currency -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Currency<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('currency') is-invalid border-danger
                                            @enderror" wire:model="currency">
                                            @error('currency')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Donation Type -->
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Donation Type<span
                                                    class="text-danger ms-1">*</span></label>
                                            <select class="form-select @error('donation_type') is-invalid border-danger
                                            @enderror" wire:model="donation_type">
                                                <option value="">Select Donation Type</option>
                                                <option value="cash">Cash</option>
                                                <option value="in-Kind">In-Kind</option>
                                                <option value="other">Other</option>
                                            </select>
                                            @error('donation_type')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Item Description -->
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Item Description (Optional)</label>
                                            <textarea class="form-control @error('item_description') is-invalid border-danger
                                            @enderror" wire:model="item_description" rows="3"
                                                placeholder="Describe the items being donated"></textarea>
                                            @error('item_description')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Notes -->
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control @error('notes') is-invalid border-danger
                                            @enderror" wire:model="notes" rows="3"
                                                placeholder="Enter any additional notes"></textarea>
                                            @error('notes')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    @if (session()->has('error'))
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                    @endif
                                    @if (session()->has('success'))
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Submit Button -->
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary rounded-pill">Submit
                                                Donation</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    @script
    <script>
        $wire.on('payOnline', (event) => {
        const { amount, email, currency, reference } = event.data;
        const PAYSTACK_PUBLIC_KEY = "{{ config('services.paystack.public_key') }}";

        let handler = PaystackPop.setup({
            key: PAYSTACK_PUBLIC_KEY,
            email: email,
            amount: amount * 100,
            currency: currency,
            ref: reference,
            onClose: function () {
                alert('Transaction was not completed, window closed.');
            },
            callback: function (response) {
                if (response.status === 'success') {
                    $wire.verifyPayment(response.reference);
                } else {
                    alert('Transaction failed');
                }
            }
        });

        handler.openIframe();
    });
    </script>
    @endscript
</div>