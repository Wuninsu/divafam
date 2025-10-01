@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title mb-2">About Us</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<section class="about-section-two pb-0">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="p-3 p-sm-4 position-relative">

                    <img class="img-fluid img-radius" src="{{setup_data('about_image') ?? NO_IMAGE}}" alt="img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ps-0 ps-lg-2 pt-4 pt-lg-0 ps-xl-5">
                    <div class="section-header">
                        <span
                            class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">About</span>
                        <h2>Cultivating Futures, Strengthening Communities</h2>
                        <p>
                            {{setup_data('about_us') ?? 'Divafam is a nonprofit organization rooted in the power
                            of family, community, and growth. Inspired by the strength of women and the resilience of
                            youth, we cultivate more than just
                            crops —
                            we cultivate futures. Through sustainable vegetable farming, we empower women and young
                            people
                            with the skills to thrive, feed their families, and build self-sustaining livelihoods'}}
                        </p>
                    </div>

                    <!-- Mission -->
                    <div class="d-flex align-items-center about-us-banner">
                        <div>
                            <span
                                class="bg-primary-transparent rounded-3 p-2 about-icon d-flex justify-content-center align-items-center">
                                <i class="fas fa-leaf fs-24"></i>
                            </span>
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-2">Our Mission</h6>
                            <p>
                                {{setup_data('mission_statement') ?? 'To empower women and youth through sustainable
                                agriculture training,
                                equipping them with the knowledge and tools to achieve food security,
                                financial independence, and stronger families.'}}

                            </p>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="d-flex align-items-center about-us-banner">
                        <div>
                            <span
                                class="bg-secondary-transparent rounded-3 p-2 about-icon d-flex justify-content-center align-items-center">
                                <i class="fas fa-users fs-24"></i>
                            </span>
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-2">Our Vision</h6>
                            <p>
                                {{setup_data('vision_statement') ?? 'A future where women and youth are empowered
                                changemakers,
                                leading sustainable farming practices that uplift communities
                                and break the cycle of poverty.'}}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- about -->
<div class="container mt-3">
    <div class="course-page-content pt-0">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-3">More About</h5>

                <!-- History -->
                <div class="mb-4">
                    {!! $more ?? 'Founded in 2022, Divafam began as a small community
                    initiative in northern Ghana. Witnessing the challenges faced by women and youth in the region, we
                    set out to empower families through sustainable agriculture and community-driven solutions.' !!}
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- counter -->
    <section class="counter-sec mb-3">
        <div class="container">
            <div class="row gy-3">
                <!-- Beneficiaries -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="counter-icon me-3">
                                    <i class="fas fa-users fa-2x text-info"></i>
                                </div>
                                <div class="count-content">
                                    <h4 class="text-info"><span class="count-digit"
                                            data-count="{{get_data_counts()['beneficiariesCount']}}">{{get_data_counts()['beneficiariesCount']}}</span>+</h4>
                                    <p>Beneficiaries Reached</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Projects -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="counter-icon me-3">
                                    <i class="fas fa-seedling fa-2x text-warning"></i>
                                </div>
                                <div class="count-content">
                                    <h4 class="text-warning"><span class="count-digit"
                                            data-count="{{get_data_counts()['projectsCount']}}">
                                            {{get_data_counts()['projectsCount']}}</span>+</h4>
                                    <p>Total Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partners -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="counter-icon me-3">
                                    <i class="fas fa-handshake fa-2x text-success"></i>
                                </div>
                                <div class="count-content">
                                    <h4 class="text-success"><span class="count-digit"
                                            data-count="{{get_data_counts()['activeDonors']}}">
                                            {{get_data_counts()['activeDonors']}}</span>+</h4>
                                    <p>Partner Organizations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Volunteers -->
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="counter-icon me-3">
                                    <i class="fas fa-city fa-2x text-primary"></i>
                                </div>
                                <div class="count-content">
                                    <h4 class="text-primary"><span class="count-digit"
                                            data-count="{{get_data_counts()['communitiesCount']}}">
                                            {{get_data_counts()['communitiesCount']}}</span>+</h4>
                                    <p>Communities Reached</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- counter -->
    <!-- institutions -->
    <section class="client-section border-bottom">
        <div class="container">
            <h6 class="fw-medium text-center mb-4"> <span
                    class="text-decoration-underline text-secondary me-2">THANKS</span>TO OUR SPONSORS!</h6>
            <div class="institutions-slider lazy slider">
                @forelse ($donors as $donor)
                <div class="institutions-items p-1">
                    <img class="img-fluid" src="{{asset($donor->logo ?? NO_IMAGE)}}" alt="{{$donor->name}}">
                </div>
                @empty

                @endforelse

            </div>
        </div>
    </section>
    <!-- institutions -->


    <!-- Team Section -->
    <section class="bg-light">
        <!-- Section Header -->
        <div class="instructor-list">
            <div class="container">
                <div class="row align-items-baseline">

                    <div class="text-center mb-5">
                        <h2 class="h3">Meet Our Team</h2>
                        <p class="text-muted mx-auto">
                            Behind Divafam is a dedicated team of women, youth, and community leaders committed to
                            empowering
                            families, strengthening communities, and cultivating futures.
                            Together, we bring passion, experience, and heart to every initiative.
                        </p>
                    </div>
                    {{-- <div class="col-lg-9"> --}}
                        @forelse ($teamMembers as $team)
                        <div class="col-md-6">
                            <div class="card p-0">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img class="img-fluid h-100 rounded-start"
                                            src="{{ $team->avatar_url ?? NO_IMAGE }}" alt="{{ $team->name }}" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title mb-0 text-uppercase">{{ $team->name }}</h4>
                                            <span class="text-primary">{{ $team->getMeta('designation') ?? 'Unknown'
                                                }}</span>
                                            <p class="card-text">{{ $team->getMeta('biography') }}</p>
                                            </p>
                                            <div
                                                class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                                                @if ($team->getMeta('facebook'))
                                                <a href="{{ $team->getMeta('facebook') }}" target="_blank"
                                                    class="text-muted"
                                                    style="font-size: 20px; color: #3b5998; transition: color 0.3s;">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                @endif
                                                @if ($team->getMeta('twitter'))
                                                <a href="{{ $team->getMeta('twitter') }}" target="_blank"
                                                    class="text-muted"
                                                    style="font-size: 20px; color: #1da1f2; transition: color 0.3s;">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                @endif
                                                @if ($team->getMeta('instagram'))
                                                <a href="{{ $team->getMeta('instagram') }}" target="_blank"
                                                    class="text-muted"
                                                    style="font-size: 20px; color: #e4405f; transition: color 0.3s;">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                @endif
                                                @if ($team->getMeta('tiktok'))
                                                <a href="{{ $team->getMeta('tiktok') }}" target="_blank"
                                                    class="text-muted"
                                                    style="font-size: 20px; color: #000000; transition: color 0.3s;">
                                                    <i class="fab fa-tiktok"></i>
                                                </a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>No team members found.</p>
                        @endforelse
                        {{--
                    </div> --}}
                </div>
            </div>
            <!-- /Course -->


        </div>
    </section>

    @endsection