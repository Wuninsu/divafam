@extends('layouts.app')
@section('content')
<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">About us</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    About
                </li>
            </ol>
        </nav>

    </div>
</div>



<!-- about -->
<div class="container mt-3">
    <!-- Make sure Font Awesome is loaded -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <section class="about-sec py-3">
        <div class="container">

            <!-- STORY -->
            <div class="row align-items-center g-5 mb-5">
                <div class="col-lg-6">
                    <img src="{{setup_data('about_image') ?? NO_IMAGE}}" class="img-fluid rounded-4" alt="">
                </div>
                <div class="col-lg-6">
                    <h4 class="fw-bold mb-3">
                        <i class="fas fa-seedling me-2 text-success"></i> Our Story
                    </h4>
                    <p class="about-text">
                        {{setup_data('about_us') ?? 'Divafam is a nonprofit organization rooted in the power
                        of family, community, and growth. Inspired by the strength of women and the resilience of
                        youth, we cultivate more than just
                        crops —
                        we cultivate futures. Through sustainable vegetable farming, we empower women and young
                        people
                        with the skills to thrive, feed their families, and build self-sustaining livelihoods'}}

                    </p>
                </div>
            </div>

            <!-- MISSION / VISION / VALUES -->
            <div class="row g-4 mb-5">

                <div class="col-md-6">
                    <div class="about-card text-center">
                        <div class="about-icon mb-3">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h5 class="fw-bold">Our Mission</h5>
                        <p>
                            {{setup_data('mission_statement') ?? 'To empower women and youth through sustainable
                            agriculture training,
                            equipping them with the knowledge and tools to achieve food security,
                            financial independence, and stronger families.'}}
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="about-card text-center">
                        <div class="about-icon mb-3">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h5 class="fw-bold">Our Vision</h5>
                        <p>
                            {{setup_data('vision_statement') ?? 'A future where women and youth are empowered
                            changemakers,
                            leading sustainable farming practices that uplift communities
                            and break the cycle of poverty.'}}
                        </p>
                    </div>
                </div>

                {{-- <div class="col-md-4">
                    <div class="about-card text-center">
                        <div class="about-icon mb-3">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h5 class="fw-bold">Our Values</h5>
                        <ul class="about-values text-start">
                            <li><i class="fas fa-check-circle me-2"></i>Integrity</li>
                            <li><i class="fas fa-check-circle me-2"></i>Inclusiveness</li>
                            <li><i class="fas fa-check-circle me-2"></i>Innovation</li>
                            <li><i class="fas fa-check-circle me-2"></i>Sustainability</li>
                        </ul>
                    </div>
                </div> --}}

            </div>

            <section class="card">
                <div class="card-header">
                    More About Diva Fam LBG
                </div>
                <div class="card-body">
                    <div class="rich-content">
                        {!! $more !!}
                    </div>
                </div>
            </section>


            <!-- IMPACT -->
            <div class="about-impact text-center mb-5">
                <h4 class="fw-bold mb-4">
                    <i class="fas fa-chart-line me-2 text-success"></i> Our Impact
                </h4>

                <div class="row g-4 justify-content-center">

                    <div class="col-6 col-md-3">
                        <div class="impact-box">
                            <i class="fas fa-users impact-icon"></i>
                            <h3>{{get_data_counts()['beneficiariesCount']}}+</h3>
                            <p>Beneficiaries Reached</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="impact-box">
                            <i class="fas fa-project-diagram impact-icon"></i>
                            <h3>{{get_data_counts()['projectsCount']}}</h3>
                            <p>Project Delivered</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="impact-box">
                            <i class="fas fa-map-marked-alt impact-icon"></i>
                            <h3>{{get_data_counts()['communitiesCount']}}</h3>
                            <p>Communities Served</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="impact-box">
                            <i class="fas fa-handshake impact-icon"></i>
                            <h3>{{get_data_counts()['activeDonors']}}</h3>
                            <p>Active Partners & Donors</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CTA -->
            <div class="about-cta text-center">
                <h4 class="fw-bold">Join Our Mission</h4>
                <p class="text-muted">
                    Be part of the movement to create sustainable livelihoods and empower communities.
                </p>
                <a href="/contact" class="btn btn-primary px-4">
                    Get Involved
                </a>
            </div>

        </div>
    </section>

  
    @endsection