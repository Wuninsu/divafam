@extends('layouts.app')
@section('content')

<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">Contact Us</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Contact Us
                </li>
            </ol>
        </nav>

    </div>
</div>


{{--
<section class="contact-sec">
    <div class="container">
        @if (session('success'))
        <p>{{ session('success') }}</p>
        @endif
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
                        <div class="card-body p-0 p-sm-5 p-md-6">
                            <h4 class="mb-3">Send Us a Message</h4>
                            @livewire('guest.contact-form')
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
</section> --}}
<section class="contact-sec py-3">
    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-3">
            <p class="contact-subtitle mx-auto">
                Reach out for general inquiries, partnerships, programs, or media. We’re always open to collaboration
                and impact-driven conversations.
            </p>
        </div>

        <!-- CONTACT GRID -->
        <div class="row g-4">

            <!-- GENERAL -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <h6 class="contact-label">General Inquiries</h6>
                    <p>
                        <a href="mailto:info@divafarms.org"><i class="bi bi-envelope-fill"></i>
                            info@divafarms.org</a><br>
                        <a href="mailto:divafarms@divafarms.org"><i class="bi bi-envelope-fill"></i>
                            divafarms@divafarms.org</a>
                    </p>
                </div>
            </div>

            <!-- PARTNERSHIP -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <h6 class="contact-label">Partnership & Funding</h6>
                    <p class="mb-1 fw-semibold">Belawu M. Abubakari</p>
                    <p class="mb-1">
                        <a href="mailto:belawuabubakari22@gmail.com"><i class="bi bi-envelope-fill"></i>
                            belawuabubakari22@gmail.com</a>
                    </p>
                    <p>
                        <a href="tel:0206404142"><i class="bi bi-telephone-fill"></i> 020 640 4142</a>
                    </p>
                </div>
            </div>

            <!-- PROGRAMS -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <h6 class="contact-label">Programs & Technical</h6>
                    <p class="mb-1 fw-semibold">Abdulai Alhassan</p>
                    <small class="text-muted">Programs Director</small>
                    <p class="mb-1 mt-1">
                        <a href="mailto:abdulai@divafarms.org"><i class="bi bi-envelope-fill"></i>
                            abdulai@divafarms.org</a>
                    </p>
                    <p>
                        <a href="tel:0246530515"><i class="bi bi-telephone-fill"></i> 024 653 0515</a>
                    </p>
                </div>
            </div>

            <!-- MEDIA -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <h6 class="contact-label">Media Inquiries</h6>
                    <p class="mb-1 fw-semibold">Abdul-Hafiz Wuninsu</p>
                    <p class="mb-1 mt-1">
                        <a href="mailto:wuninsu.a@yahoo.com"><i class="bi bi-envelope-fill"></i>
                            wuninsu.a@yahoo.com</a>
                    </p>
                    <p>
                    <a href="tel:0554234794"><i class="bi bi-telephone-fill"></i> 055 423 4794</a>
                    </p>
                </div>
            </div>

            <!-- OFFICE -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <h6 class="contact-label">Head Office</h6>
                    <p class="mb-1 fw-semibold">Diva Farms & Livelihoods Initiative</p>
                    <p class="mb-1">
                        AS42 Education Ridge Rd<br>
                        NS-047-1995<br>
                        Tamale, Northern Region, Ghana
                    </p>
                    <p>
                        <a href="tel:+233206404142"><i class="bi bi-telephone-fill"></i> +233 20 640 4142</a>
                    </p>
                </div>
            </div>

            <!-- HOURS -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <h6 class="contact-label">Office Hours</h6>
                    <p>
                        Monday – Friday<br>
                        8:00 AM – 5:00 PM (GMT)
                    </p>
                </div>
            </div>

        </div>

        <!-- SOCIALS -->
        <div class="text-center mt-5">
            <h6 class="mb-3">Follow Us</h6>
            <div class="d-flex justify-content-center gap-4 flex-wrap">
                <a href="#" class="social-link"><i class="bi bi-facebook"></i> Facebook</a>
                <a href="#" class="social-link"><i class="bi bi-linkedin"></i> LinkedIn</a>
                <a href="#" class="social-link"><i class="bi bi-tiktok"></i> TikTok</a>
                <a href="#" class="social-link"><i class="bi bi-instagram"></i> Instagram</a>
            </div>
        </div>

        <!-- FORM + MAP -->
        <div class="row g-4 mt-5 align-items-stretch">

            <!-- FORM -->
            <div class="col-lg-6">
                <div class="contact-box h-100">
                    <h4 class="fw-bold mb-3">Send Us a Message</h4>
                    @livewire('guest.contact-form')
                </div>
            </div>

            <!-- MAP -->
            <div class="col-lg-6">
                <div class="contact-map h-100">
                    <iframe src="https://www.google.com/maps?q=Tamale,Ghana&output=embed" loading="lazy"></iframe>
                </div>
            </div>

        </div>

    </div>
</section>
<style>
    .contact-sec {
        background: var(--light-500);
        padding: 5rem 0;
    }

    .contact-title {
        color: var(--text);
        font-size: 2.2rem;
        font-weight: 700;
    }

    .contact-subtitle {
        max-width: 650px;
        color: var(--muted);
        font-size: 1rem;
    }

    .contact-card {
        background: var(--surface);
        border-radius: var(--radius-lg);
        padding: 30px;
        border: 1px solid var(--border-soft);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        height: 100%;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    .contact-label {
        font-size: 0.9rem;
        text-transform: uppercase;
        color: var(--muted-2);
        margin-bottom: 12px;
    }

    .contact-card a {
        color: var(--brand);
        text-decoration: none;
    }

    .contact-card a:hover {
        text-decoration: underline;
    }

    .social-link {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        border-radius: 30px;
        background: var(--surface);
        border: 1px solid var(--border-soft);
        color: var(--text);
        font-size: 1rem;
        transition: var(--transition);
    }

    .social-link:hover {
        background-color: var(--brand-soft);
        color: var(--brand);
    }

    .social-link i {
        margin-right: 10px;
    }

    .contact-box {
        background: var(--surface);
        padding: 35px;
        border-radius: var(--radius-lg);
        border: 1px solid var(--border-soft);
    }

    .contact-map iframe {
        width: 100%;
        height: 100%;
        min-height: 350px;
        border: 0;
        border-radius: var(--radius-lg);
    }
</style>

@endsection