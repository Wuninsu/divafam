<div>
    <div class="breadcrumb-hero text-center">
        <div class="container">
            <h1 class="breadcrumb-title">Donate</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('guest.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Donate</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="donate-section py-5">
        <div class="container">
            <div class="row g-4">

                <!-- LEFT: Online Donation -->
                <div class="col-lg-7">
                    <div class="card donate-card h-100">
                        <div class="card-body">

                            <h4 class="mb-3">Donate Online</h4>
                            <p class="text-muted">
                                Support our mission using secure online payment.
                            </p>

                            <!-- Amount -->
                            <div class="row g-2 mb-3">
                                <div class="col-3">
                                    <button class="amount-btn w-100">₵50</button>
                                </div>
                                <div class="col-3">
                                    <button class="amount-btn w-100">₵100</button>
                                </div>
                                <div class="col-3">
                                    <button class="amount-btn w-100 active">₵200</button>
                                </div>
                                <div class="col-3">
                                    <button class="amount-btn w-100">₵500</button>
                                </div>
                            </div>

                            <!-- Form -->
                            <div class="mb-3">
                                <label class="form-label">Custom Amount</label>
                                <input type="number" class="form-control" placeholder="Enter amount">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control">
                            </div>

                            <button class="btn donate-btn w-100">
                                <i class="fas fa-donate me-1"></i> Donate Now
                            </button>

                        </div>
                    </div>
                </div>

                <!-- RIGHT: Bank Details -->
                <div class="col-lg-5">
                    <div class="card bank-card h-100">
                        <div class="card-body">

                            <h4 class="mb-3">Bank Transfer</h4>
                            <p class="text-muted">
                                Prefer direct transfer? Use the details below.
                            </p>

                            <div class="bank-details">

                                <div class="bank-item">
                                    <span>Bank Name</span>
                                    <strong>Ecobank Ghana</strong>
                                </div>

                                <div class="bank-item">
                                    <span>Account Name</span>
                                    <strong>Diva Fam Foundation</strong>
                                </div>

                                <div class="bank-item">
                                    <span>Account Number</span>
                                    <strong>1234567890</strong>
                                </div>

                                <div class="bank-item">
                                    <span>Branch</span>
                                    <strong>Accra Main</strong>
                                </div>

                            </div>

                            <!-- Copy Button -->
                            <button class="btn btn-outline-secondary w-100 mt-3 copy-btn">
                                Copy Account Number
                            </button>

                            <!-- Trust Note -->
                            <div class="trust-note mt-3">
                                <small>
                                    ✔ Please include your name as reference
                                    ✔ Contact us after transfer for confirmation
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        /* CARD BASE */
        .donate-card,
        .bank-card {
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-md);
            background: var(--surface);
        }

        /* AMOUNT BUTTONS */
        .amount-btn {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 8px;
            background: var(--surface);
            transition: var(--transition);
        }

        .amount-btn.active,
        .amount-btn:hover {
            background: var(--brand-soft);
            border-color: var(--brand);
            color: var(--brand);
        }

        /* DONATE BUTTON */
        .donate-btn {
            background: var(--brand);
            color: #fff;
            border-radius: var(--radius);
            padding: 12px;
            font-weight: 600;
            transition: var(--transition);
        }

        .donate-btn:hover {
            background: var(--brand-600);
            box-shadow: 0 6px 18px var(--brand-glow);
        }

        /* BANK DETAILS */
        .bank-details {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .bank-item {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 10px;
            border-radius: var(--radius);
            background: var(--light-700);
            border: 1px solid var(--border);
        }

        .bank-item span {
            font-size: 13px;
            color: var(--muted);
        }

        .bank-item strong {
            font-size: 14px;
            color: var(--text);
        }

        /* COPY BUTTON */
        .copy-btn {
            border-radius: var(--radius);
        }

        /* TRUST NOTE */
        .trust-note {
            padding: 10px;
            border-radius: var(--radius);
            background: var(--brand-soft-4);
            border: 1px solid var(--border);
            color: var(--muted);
        }
    </style>

    <div class="content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card donate-card">
                        <div class="card-body p-4">

                            <!-- Header -->
                            <div class="text-center mb-4">
                                <h4 class="fw-bold">Support Diva Fam</h4>
                                <p class="text-muted mb-0">
                                    Your contribution helps transform lives.
                                </p>
                            </div>

                            <form wire:submit.prevent="initiatePayment">

                                <!-- ===================== -->
                                <!-- DONATION TYPE -->
                                <!-- ===================== -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Donation Preference
                                    </label>

                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model.live="is_donor"
                                                value="1" id="donorYes">
                                            <label class="form-check-label" for="donorYes">
                                                I want to be recognized
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model.live="is_donor"
                                                value="0" id="donorNo">
                                            <label class="form-check-label" for="donorNo">
                                                Donate anonymously
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===================== -->
                                <!-- AMOUNT (IMPORTANT) -->
                                <!-- ===================== -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Select Amount
                                    </label>

                                    <div class="row g-2 mb-2">
                                        <div class="col-3">
                                            <button type="button" class="amount-btn w-100">₵50</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="amount-btn w-100">₵100</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="amount-btn w-100 active">₵200</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="amount-btn w-100">₵500</button>
                                        </div>
                                    </div>

                                    <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                        placeholder="Or enter custom amount" wire:model="amount">

                                    @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- ===================== -->
                                <!-- DONOR INFO (CONDITIONAL) -->
                                <!-- ===================== -->
                                @if ($is_donor)
                                <div class="mb-4 border-top pt-4">
                                    <h6 class="text-muted mb-3">Your Details</h6>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('donor_name') is-invalid @enderror"
                                                placeholder="Full Name" wire:model="donor_name">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" wire:model="email">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Phone" wire:model="phone">
                                        </div>

                                        <div class="col-md-6">
                                            <select class="form-select @error('donor_type') is-invalid @enderror"
                                                wire:model="donor_type">
                                                <option value="">Donor Type</option>
                                                <option value="individual">Individual</option>
                                                <option value="corporate">Corporate</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- ===================== -->
                                <!-- PAYMENT INFO -->
                                <!-- ===================== -->
                                <div class="mb-4 border-top pt-4">
                                    <h6 class="text-muted mb-3">Payment Details</h6>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('currency') is-invalid @enderror"
                                                wire:model="currency" placeholder="Currency (e.g. GHS)">
                                        </div>

                                        <div class="col-md-6">
                                            <select class="form-select @error('donation_type') is-invalid @enderror"
                                                wire:model="donation_type">
                                                <option value="">Donation Type</option>
                                                <option value="cash">Cash</option>
                                                <option value="in-Kind">In-Kind</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===================== -->
                                <!-- ALERTS -->
                                <!-- ===================== -->
                                @if (session()->has('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <!-- ===================== -->
                                <!-- CTA -->
                                <!-- ===================== -->
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn donate-btn btn-lg">
                                        <i class="fas fa-lock me-1"></i>
                                        Donate Securely
                                    </button>
                                </div>

                                <!-- Trust Note -->
                                <p class="text-center small text-muted mt-3 mb-0">
                                    🔒 Secure payment • Your data is protected
                                </p>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>
        .donate-card {
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-md);
            background: var(--surface);
        }

        /* Amount buttons */
        .amount-btn {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 8px;
            background: var(--surface);
            transition: var(--transition);
        }

        .amount-btn.active,
        .amount-btn:hover {
            background: var(--brand-soft);
            border-color: var(--brand);
            color: var(--brand);
        }

        /* CTA */
        .donate-btn {
            background: var(--brand);
            border: none;
            color: #fff;
            border-radius: var(--radius);
            font-weight: 600;
            transition: var(--transition);
        }

        .donate-btn:hover {
            background: var(--brand-600);
            box-shadow: 0 8px 20px var(--brand-glow);
        }
    </style>

    {{-- <div class="content">
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
    </div> --}}
    <script src="https://js.paystack.co/v1/inline.js"></script>
    @script
    <script>
        document.querySelector('.copy-btn').addEventListener('click', () => {
    navigator.clipboard.writeText('1234567890');
    alert('Account number copied!');
});
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