@extends('layouts.app')

@section('content')

<!-- HERO / BREADCRUMB -->
<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">Our Partners</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Partners
                </li>
            </ol>
        </nav>

    </div>
</div>

<section class="partners-section py-5">
    <div class="container">

        <!-- INTRO -->
        <div class="text-center mb-5">
            <h2 class="fw-bold partners-title">Working Together for Impact</h2>
            <p class="partners-subtitle mx-auto">
                Our work is made possible through strategic partnerships with donors, institutions, and organizations
                who share our vision for sustainable development and community transformation.
            </p>
        </div>

        <!-- CURRENT PARTNERS -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="section-label">Current Partners</h5>
                <span class="badge partners-badge">Active</span>
            </div>

            <div class="row g-4">

                <!-- Partner -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="partner-card active text-center">
                        <img src="https://divafarms.org/storage/donors/270df87c-9da6-4aa8-813b-5f26f012a362.jpeg"
                            class="partner-logo" alt="Partner One">
                    </div>
                </div>

                <!-- Partner -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="partner-card active text-center">
                        <img src="https://divafarms.org/storage/donors/df0000a9-753a-44b2-88fe-c6d1c8343193.jpg"
                            class="partner-logo" alt="Partner Two">
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="partner-card active text-center">
                        <img src="https://divafarms.org/storage/donors/e9e2babf-179c-4b86-98a9-2a757000fa77.jpg"
                            class="partner-logo" alt="Former Partner">
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="partner-card active text-center">
                        <img src="https://divafarms.org/storage/donors/8caed3c0-b013-4315-8b72-b0a2c3d54845.JPG"
                            class="partner-logo" alt="Old Partner">
                    </div>
                </div>
            </div>
        </div>

        <!-- PAST PARTNERS -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="section-label">Past Partners</h5>
                <span class="badge partners-badge-outline">Past</span>
            </div>

            <div class="row g-4">

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="partner-card previous text-center">
                        <img src="https://divafarms.org/storage/donors/e9e2babf-179c-4b86-98a9-2a757000fa77.jpg"
                            class="partner-logo" alt="Former Partner">
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="partner-card previous text-center">
                        <img src="https://divafarms.org/storage/donors/8caed3c0-b013-4315-8b72-b0a2c3d54845.JPG"
                            class="partner-logo" alt="Old Partner">
                    </div>
                </div>

            </div>
        </div>

        <!-- CTA -->
        <div class="partners-cta mt-5">
            <div class="cta-inner d-lg-flex align-items-center justify-content-between text-center text-lg-start">

                <!-- TEXT -->
                <div class="cta-text">
                    <h3 class="cta-title">Partner With Us</h3>
                    <p class="cta-subtitle mb-0">
                        Join forces with us to deliver sustainable impact and transform communities together.
                    </p>
                </div>

                <!-- ACTION -->
                <div class="cta-action mt-4 mt-lg-0">
                    <a href="/contact" class="cta-btn">
                        Become a Partner
                        <span class="cta-arrow"> <i class="bi bi-arrow-right"></i> </span>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

<style>
    /* SECTION */
    .partners-section {
        background: var(--light-500);
    }

    /* TITLES */
    .partners-title {
        color: var(--text);
    }

    /* LABEL */
    .section-label {
        font-weight: 600;
    }

    /* BADGES */
    .partners-badge {
        background: var(--brand);
        color: #fff;
        border-radius: 50px;
        padding: 6px 12px;
        font-size: 0.75rem;
    }

    .partners-badge-outline {
        border: 1px solid var(--border-strong);
        color: var(--muted);
        border-radius: 50px;
        padding: 6px 12px;
        font-size: 0.75rem;
    }

    /* CARD */
    .partner-card {
        background: var(--surface);
        border-radius: var(--radius-lg);
        padding: 25px 20px;
        border: 1px solid var(--border-soft);
        transition: var(--transition);
    }

    /* ACTIVE */
    .partner-card.active:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-md);
    }

    /* PREVIOUS */
    .partner-card.previous {
        opacity: 0.65;
    }

    .partner-card.previous:hover {
        opacity: 1;
    }

    /* LOGO */
    .previous .partner-logo {
        max-height: inherit;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.85;
        transition: var(--transition);
    }

    .active .partner-logo {
        max-height: inherit;
        object-fit: contain;
        opacity: 0.85;
        transition: var(--transition);
    }

    .partner-card.active:hover .partner-logo {
        filter: grayscale(0);
        opacity: 1;
    }

    /* TEXT */
    .partner-name {
        font-size: 0.95rem;
        font-weight: 600;
    }

    /* CTA CONTAINER */
    .partners-cta {
        background: linear-gradient(135deg,
                var(--brand-soft),
                var(--surface));
        border: 1px solid var(--brand-border);
        border-radius: var(--radius-lg);
        padding: 40px 32px;
        position: relative;
        overflow: hidden;
        transition: var(--transition);
    }

    /* subtle glow accent */
    .partners-cta::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        background: var(--brand-soft-3);
        border-radius: 50%;
        top: -100px;
        right: -80px;
        filter: blur(40px);
        opacity: 0.6;
    }

    /* INNER */
    .cta-inner {
        position: relative;
        z-index: 2;
    }

    /* TEXT */
    .cta-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text);
        letter-spacing: -0.3px;
    }

    .cta-subtitle {
        color: var(--muted);
        max-width: 520px;
        font-size: 0.95rem;
    }

    /* BUTTON */
    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--brand);
        color: #fff;
        padding: 12px 22px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        box-shadow: 0 6px 18px var(--brand-soft-3);
    }

    /* HOVER */
    .cta-btn:hover {
        background: var(--brand-600);
        transform: translateY(-2px);
        box-shadow: 0 10px 24px var(--brand-soft-3);
    }

    /* ARROW ANIMATION */
    .cta-arrow {
        transition: transform var(--transition);
    }

    .cta-btn:hover .cta-arrow {
        transform: translateX(4px);
    }

    /* HOVER EFFECT ON CARD */
    .partners-cta:hover {
        box-shadow: var(--shadow-md);
        border-color: var(--brand);
    }
</style>

@endsection