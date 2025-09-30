@extends('layouts.app')

@section('content')
<div class="banner-section-two">

 
    @if ($carouselData)
    <div id="bs-carousel" class="carousel slide fade-carousel" data-bs-ride="carousel" data-bs-interval="4000">
        <!-- Overlay -->
        <div class="overlay"></div>
        @if ($carouselData->carousel_items)
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($carouselData->carousel_items as $index => $slide)
            <li data-bs-target="#bs-carousel" data-bs-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}">
            </li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($carouselData->carousel_items as $index => $slide)
            <div class="carousel-item slides {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ asset($slide['image']) }}" class="d-block w-100" alt="{{ $slide['title'] }}">
                <div class="hero">
                    <hgroup>
                        <h1>{{ $slide['title'] }}</h1>
                        <h3>{{ $slide['description'] }}</h3>
                    </hgroup>
                    @if($slide['button_link'])
                    <a href="{{ $slide['button_link'] }}" class="btn btn-hero btn-lg" role="button">{{ $slide['button_text'] }}</a>
                    @else
                    <button class="btn btn-hero btn-lg" role="button">{{ $slide['button_text'] }}</button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>
    @endif


</div>

<!-- benefits -->
<section class="benefit-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Our Impact</span>
            <h2>Changing Lives Through DIVA-FAM</h2>
            <p>We are committed to empowering communities through projects, beneficiaries, and sustainable solutions.
            </p>
        </div>

        <div class="row">
            <!-- Beneficiaries -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="position-absolute top-0 end-0 mt-n3 me-n4">
                            <img src="assets/img/shapes/bg-1.png" alt="beneficiaries-shape">
                        </div>
                        <div class="p-4 rounded-pill bg-primary-transparent d-inline-flex">
                            <i class="fas fa-users fs-3 text-primary"></i>
                        </div>
                        <h5 class="mt-3 mb-1">Beneficiaries</h5>
                        <p>Over <strong>5,000 individuals</strong> have directly benefited from our programs.</p>
                    </div>
                </div>
            </div>

            <!-- Total Projects -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="position-absolute top-0 end-0 mt-n3 me-n4">
                            <img src="assets/img/shapes/bg-2.png" alt="projects-shape">
                        </div>
                        <div class="p-4 rounded-pill bg-secondary-transparent d-inline-flex">
                            <i class="fas fa-project-diagram fs-3 text-secondary"></i>
                        </div>
                        <h5 class="mt-3 mb-1">Total Projects</h5>
                        <p>We have successfully executed <strong>120+ community projects</strong> across various
                            sectors.</p>
                    </div>
                </div>
            </div>

            <!-- Community Support -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="position-absolute top-0 end-0 mt-n3 me-n4">
                            <img src="assets/img/shapes/bg-3.png" alt="support-shape">
                        </div>
                        <div class="p-4 rounded-pill bg-skyblue-transparent d-inline-flex">
                            <i class="fas fa-hands-helping fs-3 text-info"></i>
                        </div>
                        <h5 class="mt-3 mb-1">Community Support</h5>
                        <p>We provide continuous <strong>mentorship, training, and financial support</strong> to
                            families.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- benefits -->


<!-- top courses -->
<section class="top-courses-sec">
    <img class="top-courses-bg" src="{{asset('assets/img/bg/bg-20.png')}}" alt="img">
    <div class="container">
        <div class="section-header text-center">
            <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Our Partners</span>
            <h2>Honoring Our Sponsors & Donors</h2>
            <p>We sincerely appreciate the generous support of our sponsors and donors who make our mission possible.
            </p>
        </div>
        <div class="top-courses-slider lazy">
            <!-- Sponsor 1 -->
            @forelse ($donors as $donor)
            <div>
                <div class="categories-item categories-item-three mb-0">
                    <img class="mx-auto" src="{{asset($donor->logo ?? NO_IMAGE)}}" alt="{{$donor->name}}">
                    {{-- <h6 class="title">{{$donor->name}}</h6> --}}
                </div>
            </div>
            @empty

            @endforelse
        </div>
        <a href="#" class="btn btn-primary btn-md">View All Sponsors</a>
    </div>
</section>


<!-- featured projects -->
<section class="featured-courses-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Projects</span>
            <h2>Our Featured Projects</h2>
            <p>Explore some of our impactful projects that are transforming lives and communities.</p>
        </div>

        <div class="feature-course-slider-2">
            @forelse ($featuredProjects as $featured)
            <div>
                <div class="course-item">
                    <div class="course-img">
                        <a href="{{ route('guest.projects.show', ['project' => $featured->slug]) }}">
                            <img src="{{asset($featured->cover_image ?? NO_IMAGE)}}" alt="{{$featured->slug}}"
                                class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        </a>
                        @php
                        $badgeClass = match ($featured->status) {
                        'ongoing' => 'warning',
                        'completed' => 'success',
                        'draft' => 'secondary',
                        'archived' => 'dark',
                        'postponed' => 'danger',
                        default => 'primary',
                        };
                        @endphp
                        <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                            <div class="badge text-bg-{{$badgeClass}}">{{$featured->status}}</div>

                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="badge badge-md badge-soft-info rounded-pill">{{$featured->category->name}}</span>

                    </div>
                    <div class="pb-3 border-bottom mb-3">
                        <h5><a
                                href="{{ route('guest.projects.show', ['project' => $featured->slug]) }}">{{$featured->title}}</a>
                        </h5>
                    </div>

                    <a href="{{ route('guest.projects.show', ['project' => $featured->slug]) }}"
                        class="btn btn-success">View Project</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-warning" role="alert">
                    <strong>Note:</strong> No featured projects available right now.
                </div>
            </div>
            @endforelse



        </div>
        <div class="d-flex align-items-center justify-content-center">
            <a href="{{route('guest.projects.index')}}" class="btn btn-primary btn-md">View All Projects</a>
        </div>
    </div>
</section>
<!-- /featured course -->

<!-- community-to-learn -->
@if ($impactData)
<section class="community-to-learn">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-header">
                    <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Community
                        Impact</span>
                    <h2>Creating a community of change-makers.</h2>
                    <p>We are dedicated to transforming lives by empowering beneficiaries, supporting women and
                        children, and building sustainable projects with the help of our sponsors and donors.</p>
                </div>
                @if ($impactData->community_impact)
                @foreach ($impactData->community_impact as $impact)
                <div class="community-item d-flex align-items-center">
                    <span class="community-icon-1">
                        <i class="fas fa-hands-helping"></i>
                    </span>
                    <div>
                        <h5 class="mb-2">{{$impact['title']}}</h5>
                        <p class="mb-0">{{$impact['description']}}</p>
                    </div>
                </div>
                @endforeach

                @endif

                <div class="d-flex align-items-center gap-2">
                    {{-- <a href="#" class="btn btn-secondary btn-md">Join as Beneficiary</a> --}}
                    <a href="{{route('guest.donations.donate')}}" class="btn btn-dark btn-md">Partner as Sponsor</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="community-img d-none d-lg-flex">
                    <img src="{{asset($impactData->image_1 ?? 'assets/diva/img-4.jpg')}}" alt="img"
                        class="img-fluid community-img-03">
                    <img src="{{asset($impactData->image_2 ?? 'assets/diva/img-16.jpg')}}" alt="img"
                        class="img-fluid community-img-04">
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- /community-to-learn -->

@if ($worksData)
<!-- how it works -->
<div class="how-it-works-sec-two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="me-5" data-aos="fade-up">
                    <img src="{{asset($worksData->image_1 ?? 'assets/diva/img-13.jpg') }}" class="img-fluid rounded-5"
                        alt="DivaFam Impact">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="how-it-works-content aos" data-aos="fade-up">
                    <div class="section-header">
                        <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">How it
                            Works</span>
                        <h2 class="mb-1">Getting Involved with DivaFam</h2>
                        <p>Together with our sponsors, donors, and community members, we bring projects to life that
                            create lasting impact.</p>
                    </div>

                    @if ($worksData->steps)
                    @foreach ($worksData->steps as $index => $step)
                    <div class="d-flex align-items-center works-items">
                        <span class="count">0{{$index+1}}</span>
                        <div>
                            <h5 class="mb-1">{{$step['title']}}</h5>
                            <p>{{$step['description']}}</p>
                        </div>
                    </div>
                    @endforeach

                    @endif

                    {{--
                    <div class="d-flex align-items-center works-items">
                        <span class="count">02</span>
                        <div>
                            <h5 class="mb-1">Support a Project</h5>
                            <p>Browse through our ongoing initiatives and choose the one you’d like to support
                                financially or with resources.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center works-items">
                        <span class="count">03</span>
                        <div>
                            <h5 class="mb-1">Beneficiaries Receive Support</h5>
                            <p>Your contribution directly impacts women, children, and families in need, providing them
                                with skills and opportunities.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center works-items mb-0 pb-0 border-0">
                        <span class="count">04</span>
                        <div>
                            <h5 class="mb-1">See the Impact</h5>
                            <p>Track the success stories, project updates, and the lives changed because of your
                                support.</p>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endif


<!-- how it works -->

<!-- faq -->
<div class="faq-section faq-banner-bg">
    <!-- Background Decorations -->
    <img src="assets/img/bg/bg-21.svg" alt="background" class="d-lg-flex d-none faq-bg2">
    <img src="assets/img/bg/bg-22.svg" alt="background" class="d-lg-flex d-none faq-bg3">

    <div class="container">
        <div class="row align-items-center">
            <!-- FAQ Image -->
            <div class="col-lg-6">
                <div class="faq-img" data-aos="fade-up">
                    <img class="img-fluid rounded-5" src="assets/diva/img-17.jpg" alt="Divafam FAQ">
                    <span><i class="isax isax-message-question5"></i></span>
                </div>
            </div>

            <!-- FAQ Content -->
            <div class="col-lg-6">
                <div class="faq-content">
                    <div class="section-header" data-aos="fade-up">
                        <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">
                            Your Questions are Answered
                        </span>
                        <h2 class="mb-1">Frequently Asked Questions</h2>
                        <p>Learn more about Divafam’s mission, training, donations, and community impact.</p>
                    </div>

                    <!-- Accordion -->
                    <div class="accordion accordion-customicon1 accordions-items-seperate" id="faqAccordion">

                        @foreach($faqs as $index => $faq)
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                            <h2 class="accordion-header" id="faqHeading{{ $index }}">
                                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="faqCollapse{{ $index }}">
                                    {{ $faq->question }}
                                    <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                </button>
                            </h2>
                            <div id="faqCollapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                aria-labelledby="faqHeading{{ $index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-0">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- faq -->

<div class="about-us">
    <div class="container">
        <div class="about-us-content">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 aos" data-aos="fade-up">
                    <div class="about-us-head" data-aos="fade-up">
                        <h2>What Our Beneficiaries Say ❤️</h2>
                        <p>Hear directly from women and young people whose lives have been transformed through Divafam’s
                            work.</p>
                    </div>
                    <div class="owl-carousel owl-theme nav-bottom" id="review-carousel">
                        @forelse ($testimonies as $testimony)
                        <div class="item flex-fill">
                            <div class="review-item">
                                <h5 class="title">"{{$testimony->subject}}"</h5>
                                <p>{{$testimony->message}}</p>
                                <div class="d-flex align-items-center review-user">
                                    <div class="me-2">
                                        <img src="{{asset($testimony->image ?? NO_IMAGE)}}" alt="img"
                                            class="img-fluid rounded-circle" width="50">
                                    </div>
                                    <div>
                                        <h6 class="fw-medium mb-0">{{$testimony->name}}</h6>
                                        {{-- <p class="mb-0 small"></p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-section">
                        <img src="assets/diva/img-4.jpg" alt="img" class="img-fluid about-img aos" data-aos="zoom-in">
                        <div class="enrolled-list-cover d-none d-xl-flex aos" data-aos="fade-down">
                            <div class="enrolled-list">
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-3.jpg" alt="img">
                                    </span>

                                </div>
                                <p class="mb-0 text-light fw-bold text-center">
                                    <span class="text-secondary">200+</span> Stories Shared
                                </p>
                            </div>
                        </div>
                        <img src="assets/img/bg/arrow.png" alt="img" class="img-fluid arrow d-none d-xl-flex">
                    </div>
                </div>
            </div>

        </div>
        <div class="apply-role-section py-5">
            <div class="row row-gap-4">
                <!-- Become a Sponsor -->
                <div class="col-md-6">
                    <div class="role-item aos aos-init aos-animate shadow-sm p-4 rounded" data-aos="fade-right">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <h5 class="mb-2">Become a Sponsor</h5>
                                <p class="mb-4">Support our programs and help provide resources for women and youth
                                    in farming.</p>
                                <a href="{{route('guest.donations.donate')}}"
                                    class="btn btn-primary rounded-pill d-inline-flex align-items-center">
                                    Continue <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                            <div class="col-xl-4 text-center">
                                <i class="fas fa-hand-holding-usd fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Become a Donor -->
                <div class="col-md-6">
                    <div class="role-item student-bg aos aos-init aos-animate shadow-sm p-4 rounded" data-aos="fade-up">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <h5 class="mb-2">Become a Donor</h5>
                                <p class="mb-4">Contribute to training, tools, and food security projects in local
                                    communities.</p>
                                <a href="{{route('guest.donations.donate')}}"
                                    class="btn btn-light rounded-pill d-inline-flex align-items-center">
                                    Continue <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                            <div class="col-xl-4 text-center">
                                <i class="fas fa-donate fa-4x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img src="assets/img/bg/about-bg-01.png" alt="img" class="img-fluid about-bg-01 d-none d-xl-flex">
        <img src="assets/img/bg/about-bg-02.png" alt="img" class="img-fluid about-bg-02 d-none d-xl-flex">
    </div>
</div>
<div class="blog-section position-relative">
    <div class="container">
        <div class="section-header text-center aos aos-init aos-animate" data-aos="fade-up">
            <span class="section-badge">Blog</span>
            <h2>Latest Articles &amp; News</h2>
            <p>Explore curated content to enlighten, entertain and engage global readers.</p>
        </div>
        <div class="row row-gap-4 justify-content-center">
            @forelse ($featuredPosts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="blog-card aos aos-init aos-animate" data-aos="zoom-in">
                    <div class="blog-img">
                        <a href="{{ route('guest.news.show', ['slug' => $post->slug]) }}"><img class="img-fluid w-100"
                                style="height: 200px; object-fit: cover;" alt="Img"
                                src="{{asset($post->cover_image ?? NO_IMAGE)}}"></a>
                    </div>
                    <div class="blog-content">
                        <h5><a href="{{ route('guest.news.show', ['slug' => $post->slug]) }}">{{$post->title}}</a>
                        </h5>
                        <p>{{$post->summary}}
                        </p>
                        <div class="blog-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <a href="#" class="avatar me-2">
                                    <img src="{{asset($post->author->avatar_url ?? NO_IMAGE)}}" alt="img"
                                        class="img-fluid">
                                </a>
                                <p class="mb-0 d-flex align-items-center"><a href="#"
                                        class="fw-medium ms-1">{{$post->author->name}}</a></p>
                            </div>
                            <p class="d-flex align-items-center"><i
                                    class="isax isax-calendar-1 text-gray-7"></i>{{$post->published_at->format('jS M,
                                Y')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-warning" role="alert">
                    <strong>Note:</strong> No featured posts available right now.
                </div>
            </div>
            @endforelse

        </div>
        <div class="text-center mt-3">
            <a class="btn btn-primary" data-aos="fade-up" href="{{ route('guest.news.index') }}">View All Articles</a>
        </div>
    </div>
</div>

<!-- /Latest Blog -->
@endsection