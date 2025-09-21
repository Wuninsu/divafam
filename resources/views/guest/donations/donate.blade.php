@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="checkout-content">
            <div class="row">
                <div class="col-12">

                    <div class="checkout-item-1">
                        <div class="border-bottom pb-3 mb-3">
                            <h5>Payment Method </h5>
                        </div>
                        <ul class="nav-tabs mb-3 nav-justified border-0 nav-style-1 d-sm-flex d-block" role="tablist">
                            <li class="nav-item active" role="presentation">
                                <a class="btn nav-link p-3 active" data-bs-toggle="tab" role="tab" href="#overview"
                                    aria-selected="true">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="assets/img/icons/card.svg" alt="card" class="img-fluid me-2">
                                        <p class="fw-medium">Card</p>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="btn nav-link p-3" data-bs-toggle="tab" role="tab" href="#notes"
                                    aria-selected="false" tabindex="-1">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="assets/img/icons/paypal-2.svg" alt="card" class="img-fluid me-2">
                                        <p class="fw-medium">Paypal</p>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="btn nav-link p-3" data-bs-toggle="tab" role="tab" href="#faq"
                                    aria-selected="false" tabindex="-1">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="assets/img/icons/stripe.svg" alt="card" class="img-fluid me-2">
                                        <p class="fw-medium">Stripe</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="overview" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Card Number<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Name on Card<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Expiry Date<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Security Number<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <a href="#" class="btn btn-outline-primary rounded-pill">Pay $200.25</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="notes" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Email Address<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Password<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <a href="#" class="btn btn-outline-primary rounded-pill">Pay $200.25</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="faq" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Email Address<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Password<span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <a href="#" class="btn btn-outline-primary rounded-pill">Pay $200.25</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection