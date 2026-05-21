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

                @forelse ($activePartners as $partner)
                <!-- Partner -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="partner-card active text-center">
                        <img src="{{asset($partner->logo ?? NO_IMAGE)}}" class="partner-logo" alt="Partner One">
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="doc-empty text-center py-5">

                        <div class="empty-icon mb-3">
                            <i class="bi bi-people"></i>
                        </div>

                        <h5 class="mb-2">No Active Partners</h5>

                        <p class="text-muted mb-3">
                            We currently have no active partners listed.
                        </p>
                    </div>
                </div>
                @endforelse

            </div>
        </div>

        <!-- PAST PARTNERS -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="section-label">Past Partners</h5>
                <span class="badge partners-badge-outline">Past</span>
            </div>

            <div class="row g-4">
                @forelse ($pastPartners as $partner)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="partner-card previous text-center">
                        <img src="{{asset($partner->logo ?? NO_IMAGE)}}" class="partner-logo" alt="Former Partner">
                    </div>
                </div>
                @empty
              <div class="col-12">
                    <div class="doc-empty text-center py-5">

                        <div class="empty-icon mb-3">
                            <i class="bi bi-people"></i>
                        </div>

                        <h5 class="mb-2">No Inactive Partners</h5>

                        <p class="text-muted mb-3">
                            We currently have no past partners listed.
                        </p>
                    </div>
                </div>
                @endforelse
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
                    <a href="{{route('guest.contact')}}" class="cta-btn">
                        Become a Partner
                        <span class="cta-arrow"> <i class="bi bi-arrow-right"></i> </span>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection