@extends('layouts.app')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->



    <section class="contact-sec">
        <div class="container">
            <div class="contact-info">
                <div class="row row-gap-3">
                    <!-- Address info -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-body border p-sm-4">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon">
                                    <span
                                        class="bg-primary fs-24 rounded-3 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-map-marker-alt text-white"></i>
                                    </span>
                                </div>
                                <div class="ps-3">
                                    <h5 class="mb-1">Address</h5>
                                    <address class="mb-0">Tamale, Northern Region, Ghana</address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Phone info -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-body border p-sm-4">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon">
                                    <span
                                        class="bg-primary fs-24 rounded-3 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-phone-alt text-white"></i>
                                    </span>
                                </div>
                                <div class="ps-3">
                                    <h5 class="mb-1">Phone</h5>
                                    <p class="mb-0">
                                        <a href="tel:+233201234567"
                                            class="text-gray-5 text-primary-hover text-decoration-underline mb-0">
                                            +233 20 123 4567
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Email info -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-body border p-sm-4">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon">
                                    <span
                                        class="bg-primary fs-24 rounded-3 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-envelope text-white"></i>
                                    </span>
                                </div>
                                <div class="ps-3">
                                    <h5 class="mb-1">E-mail Address</h5>
                                    <p class="mb-0">
                                        <a href="mailto:info@divafam.org"
                                            class="text-gray-5 text-primary-hover text-decoration-underline mb-0">
                                            info@divafam.org
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact form -->
            <div class="bg-light border rounded-4 p-4 p-sm-5 p-md-6 mt-4">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-details">
                            <div class="section-header">
                                <span class="section-badge">
                                    Contact Us
                                </span>
                                <h2>Get in touch with DivaFam</h2>
                                <p>We’d love to hear from you! Whether you’re a potential partner, volunteer, or community
                                    member, connect with us to learn how we can work together to empower women and youth.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-0">
                            <div class="card-body p-4 p-sm-5 p-md-6">
                                <h4 class="mb-3">Send Us a Message</h4>
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label">Name <span
                                                        class="ms-1 text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label">Email Address <span
                                                        class="ms-1 text-danger">*</span></label>
                                                <input type="email" class="form-control form-control-lg"
                                                    placeholder="your@email.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label">Phone Number</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="+233...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label">Subject</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Your Message</label>
                                        <textarea class="form-control form-control-lg" rows="4" placeholder="Type your message here..."></textarea>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-secondary btn-lg">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="contact-map rounded-4 overflow-hidden mt-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.624965721963!2d-0.8491!3d9.4076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb9bd04ecafee9%3A0x4d07e9ab0c6ee0!2sTamale%2C%20Ghana!5e0!3m2!1sen!2sgh!4v1736539200000!5m2!1sen!2sgh"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
@endsection
