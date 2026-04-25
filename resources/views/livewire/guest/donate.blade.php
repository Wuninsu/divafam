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

    <div class="content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <div class="card bank-card">
                        <div class="card-body p-4">

                            <!-- Header -->
                            <div class="text-center mb-4">
                                <h4 class="fw-bold">Make Donation</h4>
                                <p class="text-muted mb-0">
                                    Please use the details below to support Diva Fam
                                </p>
                            </div>

                            <!-- Bank Details -->
                            <div class="bank-details">

                                <div class="bank-row">
                                    <span class="label">Bank Name</span>
                                    <span class="value">{{$bankName}}</span>
                                </div>

                                <div class="bank-row">
                                    <span class="label">Account Name</span>
                                    <span class="value">{{$accountName}}</span>
                                </div>

                                <div class="bank-row">
                                    <span class="label">Account Number</span>
                                    <span class="value" id="accNumber">{{$accountNumber}}</span>
                                </div>

                                <div class="bank-row">
                                    <span class="label">Branch</span>
                                    <span class="value">{{$bankBranch}}</span>
                                </div>

                            </div>

                            <!-- Copy Button -->
                            <button class="btn copy-btn w-100 mt-3" wire:click="copyAccountNumber">
                                <i class="fas fa-copy me-1"></i> Copy Account Number
                            </button>

                            <!-- Contact CTA -->
                            <div class="trust-box mt-4 text-center">

                                <h6 class="fw-semibold mb-2">
                                    Need Help With Your Donation?
                                </h6>

                                <p class="small text-muted mb-3">
                                    If you have any issues or need confirmation after payment, contact us directly.
                                </p>

                                <a href="{{ route('guest.contact') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-headset me-1"></i> Contact Us
                                </a>

                            </div>

                            <!-- Trust Footer -->
                            <p class="text-center small text-muted mt-3 mb-0">
                                <i class="fas fa-check-circle text-success me-1"></i> Registered NGO
                                <span class="mx-1"></span>

                                <i class="fas fa-shield-alt text-success me-1"></i> Transparent Fund Usage
                                <span class="mx-1"></span>

                                <i class="fas fa-user-check text-success me-1"></i> Verified Account
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://js.paystack.co/v1/inline.js"></script>
    @script
    <script>
        Livewire.on('copy-account-number', (event) => {
        const accountNumber = event.accountNumber;

        navigator.clipboard.writeText(accountNumber)
            .then(() => {
                alert('Account number copied!');
            })
            .catch(() => {
                alert('Failed to copy account number.');
            });
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