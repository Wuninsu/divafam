@extends('layouts.app')

@section('content')
<div style=" overflow-x: hidden;">
    <div class="banner-section-two">

        <section class="mc-hero-slider">
            <div id="heroCarousel" class="carousel slide mc-hero-carousel" data-bs-ride="carousel"
                data-bs-interval="6500" data-bs-pause="hover">
                {{-- Dots --}}
                <div class="carousel-indicators">
                    @foreach ($carouselData as $index => $slide)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>

                <div class="carousel-inner mb-4">
                    @forelse($carouselData as $index => $slide)

                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="mc-hero-slide">
                            <div class="container">
                                <div class="row align-items-center g-4">

                                    {{-- LEFT CONTENT --}}
                                    <div class="col-lg-7 order-2 order-lg-1">

                                        @if(!empty($slide['eyebrow']))
                                        <div class="mc-eyebrow mb-2">
                                            <i class="{{ $slide['icon'] ?? 'fa-solid fa-circle' }} me-2"></i>
                                            {{ $slide['eyebrow'] }}
                                        </div>
                                        @endif

                                        <h1 class="fw-bold mb-3 mc-title">
                                            {{ $slide['title'] }}
                                        </h1>

                                        <p class="text-muted mb-4 mc-desc">
                                            {{ $slide['description'] }}
                                        </p>

                                        {{-- BUTTONS --}}
                                        <div class="d-flex flex-column flex-sm-row gap-2">

                                            @if(!empty($slide['button_text']))
                                            <a href="{{ $slide['button_link'] ?? '#' }}"
                                                class="btn btn-primary btn-lg mc-btn">
                                                <i class="fa-solid fa-arrow-right me-2"></i>
                                                {{ $slide['button_text'] }}
                                            </a>
                                            @endif

                                            @if(!empty($slide['button_text_2']))
                                            <a href="{{ $slide['button_link_2'] ?? '#' }}"
                                                class="btn btn-outline-primary btn-lg mc-btn">
                                                {{ $slide['button_text_2'] }}
                                            </a>
                                            @endif

                                        </div>

                                    </div>

                                    {{-- RIGHT IMAGE --}}
                                    <div class="col-lg-5 order-1 order-lg-2">
                                        <div class="mc-hero-image-wrap">
                                            <img class="mc-hero-image" src="{{ asset($slide['image'] ?? NO_IMAGE) }}"
                                                alt="{{ $slide['title'] }}" loading="lazy">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="carousel-item active">
                        <div class="text-center p-5">
                            <p>No slides available</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                {{-- Controls --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"
                    aria-label="Previous slide">
                    <span class="mc-carousel-control" aria-hidden="true">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"
                    aria-label="Next slide">
                    <span class="mc-carousel-control" aria-hidden="true">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </button>
            </div>
        </section>


    </div>


    <section class="py-5 bg-body-tertiary">
        <div class="container">

            <!-- Section Header -->
            <div class="text-center mb-5 mx-auto" style="max-width: 650px;">
                <span class="text-uppercase small fw-semibold text-muted d-block mb-2">
                    Our Impact
                </span>
                <h2 class="fw-bold">Changing Lives Through DIVA-FAM</h2>
                <p class="text-muted mb-0">
                    We empower communities through impactful projects, measurable results, and sustainable solutions.
                </p>
            </div>

            <!-- Cards -->
            <div class="row g-4">

                <!-- Beneficiaries -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm impact-card">
                        <div class="card-body text-center p-4">

                            <div class="icon-wrapper bg-primary-subtle text-primary mb-3">
                                <i class="fas fa-users"></i>
                            </div>

                            <h5 class="fw-semibold">Beneficiaries</h5>
                            <p class="text-muted mb-0">
                                Over <strong>{{get_data_counts()['beneficiariesCount']}}+</strong> individuals have
                                benefited from our programs.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Projects -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm impact-card">
                        <div class="card-body text-center p-4">

                            <div class="icon-wrapper bg-secondary-subtle text-secondary mb-3">
                                <i class="fas fa-project-diagram"></i>
                            </div>

                            <h5 class="fw-semibold">Total Projects</h5>
                            <p class="text-muted mb-0">
                                <strong>{{get_data_counts()['projectsCount']}}</strong> community projects successfully
                                executed.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Support -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm impact-card">
                        <div class="card-body text-center p-4">

                            <div class="icon-wrapper bg-info-subtle text-info mb-3">
                                <i class="fas fa-hands-helping"></i>
                            </div>

                            <h5 class="fw-semibold">Community Support</h5>
                            <p class="text-muted mb-0">
                                Ongoing <strong>mentorship, training, and financial support</strong> for families.
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5 bg-body">
        <div class="container-fluid">
            <div class="section-head text-center">
                <span class="text-uppercase small fw-semibold text-muted d-block mb-2">
                    Our Partners
                </span>
                <h2 class="fw-bold">Honoring Our Sponsors & Donors</h2>
                <p class="text-muted mb-0">
                    We appreciate the generous support of our sponsors and donors who make our mission possible.
                </p>
            </div>

            <div class="surface p-4 p-lg-5">
                <div class="partners-marquee" aria-label="Partners logos marquee">
                    <div class="partners-track">
                        {{-- track 1 --}}
                        @foreach ($donors as $don)
                        <div class="partner-item">
                            <img class="partner-logo" src="{{ asset($don->logo ?? NO_IMAGE) }}" alt="Partner logo">
                        </div>
                        @endforeach

                        {{-- track 2 (duplicate for seamless loop) --}}
                        @foreach ($donors as $don)
                        <div class="partner-item">
                            <img class="partner-logo" src="{{ asset($don->logo ?? NO_IMAGE) }}" alt="Partner logo">
                        </div>
                        @endforeach
                    </div>

                    {{-- soft fade edges --}}
                    <div class="partners-fade partners-fade-left"></div>
                    <div class="partners-fade partners-fade-right"></div>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{route('guest.parters')}}" class="btn btn-primary px-4">
                    View All Partners
                </a>
            </div>
        </div>
    </section>


    <section class="programs-section py-3">
        <div class="container">

            {{-- Section Header --}}
            <div class="text-center mb-5">
                <span class="text-uppercase small fw-semibold text-muted d-block mb-2">
                    Featured Projects
                </span>
                <h2 class="fw-bold">Browse Our Featured Projects</h2>
                <p class="text-muted">
                    Discover how our initiatives are creating meaningful impact in communities.
                </p>
            </div>

            {{-- Programs Grid --}}
            <div class="row g-4">

                {{-- Program Card --}}
                @forelse($featuredProjects as $featured)
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
                <div class="col-lg-4 col-md-6">
                    <div class="program-card h-100">

                        {{-- Image --}}

                        <div class="position-relative">
                            {{-- <img src="{{ asset($featured->cover_image ?? NO_IMAGE) }}" class="card-img-top"
                                alt="{{ $featured->title }}"> --}}
                            <div class="program-image p-3">
                                <img src="{{asset($featured->cover_image ?? NO_IMAGE)}}" alt="{{ $featured->title }}">
                            </div>

                            <div class="image-overlay"></div>

                            <span class="bg-{{$badgeClass}} position-absolute top-0 start-0 m-4 px-2 rounded-4">
                                {{ ucfirst($featured->status) }}
                            </span>
                        </div>
                        {{-- Content --}}
                        <div class="program-content">
                            <small class="mb-1">
                                <span class="rounded-4 px-2 bg-success-subtle border">{{ $featured->category->name
                                    }}</span>
                            </small>

                            <h5 class="program-title">{{ $featured->title }}</h5>
                            <a href="{{ route('guest.projects.show', $featured->slug) }}" class="btn btn-success w-100">
                                View Project <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>

                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        No featured projects available at the moment.
                    </div>
                </div>
                @endforelse

            </div>
        </div>

        <div class="my-4 text-center">
            <a href="{{ route('guest.projects.index') }}" class="btn btn-outline-success">
                View All Projects
            </a>
        </div>
    </section>

    <!-- community-to-learn -->
    @if ($impactData)
    <section class="community-to-learn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-header">
                        <span class="text-uppercase small fw-semibold text-muted d-block mb-2">
                            Our Impact
                        </span>
                        <h2>We measure outcomes, not activities.</h2>
                        <p>We are dedicated to transforming lives by empowering beneficiaries, supporting women and
                            children, and building sustainable projects with the help of our sponsors and donors.</p>
                    </div>
                    @if ($impactData->community_impact)
                    @foreach ($impactData->community_impact as $impact)
                    <div class="community-item d-flex align-items-center">
                        <span class="community-icon-1">
                            <i class="fas {{$impact['icon']}}"></i>
                        </span>
                        <div>
                            <h5 class="mb-2">{{$impact['title']}}</h5>
                            <p class="mb-0">{{$impact['description']}}</p>
                        </div>
                    </div>
                    @endforeach

                    @endif

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{route('guest.about.impact')}}" class="btn btn-dark btn-md">View More</a>
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


    @if ($worksData)
    <!-- how it works -->
    <div class="how-it-works-sec-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="me-5" data-aos="fade-up">
                        <img src="{{asset($worksData->image_1 ?? 'assets/diva/img-13.jpg') }}"
                            class="img-fluid rounded-5" alt="DivaFam Impact">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="how-it-works-content aos" data-aos="fade-up">
                        <div class="section-header">
                            <span class="text-uppercase small fw-semibold text-muted d-block mb-2">
                                How We Work
                            </span>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- faq -->
    <div class="faq-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-4 order-2 order-lg-1">
                    <div class="faq-side-cta p-4 rounded-4 h-100 d-flex flex-column justify-content-center">

                        <div class="mb-3">
                            <h5 class="fw-bold">Need More Help?</h5>
                            <p class="text-muted mb-0">
                                If your question isn’t answered here, our team is ready to assist you.
                            </p>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <h6 class="fw-semibold">Get in Touch</h6>
                            <p class="text-muted small">
                                Reach out for inquiries, partnerships, or support.
                            </p>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('guest.contact') }}" class="btn btn-success">
                                Contact Us
                            </a>

                            <a href="{{ route('guest.projects.index') }}" class="btn btn-outline-success">
                                View Our Projects
                            </a>
                        </div>

                    </div>
                </div>

                <!-- FAQ Content -->
                <div class="col-lg-8 order-1 order-lg-2 mb-4 mb-lg-0">
                    <div class="faq-content">
                        <div class="section-header" data-aos="fade-up">
                            <span class="text-uppercase small fw-semibold text-muted d-block mb-2">
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

    <section class="testimonials-section py-5">
        <div class="container">

            <!-- HEADER -->
            <div class="text-center mb-5">
                <span class="text-uppercase small fw-semibold text-muted d-block mb-2">
                    Testimonies
                </span>
                <h2 class="fw-bold">Voices from Our Community</h2>
                <p class="text-muted">
                    Real stories from women and youth whose lives have been impacted through our programs.
                </p>
            </div>

            <div class="row align-items-center g-4">

                <!-- TESTIMONIALS -->
                <div class="col-lg-7">
                    <div class="owl-carousel owl-theme" id="review-carousel">

                        @forelse ($testimonies as $testimony)
                        <div class="item">
                            <div class="card testimonial-card shadow-sm">

                                <div class="card-body">

                                    <!-- QUOTE -->
                                    <div class="mb-3">
                                        <i class="isax isax-quote-up5 text-success fs-3 opacity-50"></i>
                                    </div>

                                    <!-- TITLE -->
                                    <h5 class="fw-semibold">
                                        {{ $testimony->subject }}
                                    </h5>

                                    <!-- MESSAGE -->
                                    <p class="text-muted">
                                        {{ $testimony->message }}
                                    </p>

                                    <!-- USER -->
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset($testimony->image ?? NO_IMAGE) }}"
                                            class="testimonial-avatar rounded-circle me-2" alt="{{ $testimony->name }}">

                                        <div>
                                            <h6 class="mb-0 fw-medium">
                                                {{ $testimony->name }}
                                            </h6>
                                            <small class="text-muted">
                                                Beneficiary
                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="item">
                            <div class="card border-0 text-center p-4 shadow-sm">
                                <h5>No testimonies yet</h5>
                                <p class="text-muted">
                                    Be the first to share your story and inspire others.
                                </p>
                            </div>
                        </div>
                        @endforelse

                    </div>
                </div>

                <!-- SIDE PANEL (IMAGE + IMPACT) -->
                <div class="col-lg-5">
                    <div class="testimonial-side text-center p-4 rounded-4 h-100">

                        <img src="{{ asset(setup_data('home_testimony_image') ?? NO_IMAGE) }}"
                            class="img-fluid rounded-4 mb-3" alt="Community impact">

                        <h5 class="fw-bold">
                            {{ get_data_counts()['testimonyCount'] }}+ Stories Shared
                        </h5>

                        <p class="text-muted">
                            Every story represents a life transformed through empowerment, training, and support.
                        </p>

                        <a href="{{ route('guest.testimonials') }}" class="btn btn-outline-success mt-2">
                            See More
                        </a>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <div class="blog-section position-relative">
        <div class="container">
            <div class="section-header text-center aos aos-init aos-animate" data-aos="fade-up">
                <span class="text-uppercase small fw-semibold text-muted d-block mb-2">
                    Our Blog
                </span>
                <h2>Latest Articles &amp; News</h2>
                <p>Explore curated content to enlighten, entertain and engage global readers.</p>
            </div>
            <div class="row row-gap-4 justify-content-center">
                @forelse ($featuredPosts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card aos aos-init aos-animate" data-aos="zoom-in">

                        <div class="blog-content">
                            <div class="blog-img">
                                <a href="{{ route('guest.news.show', ['slug' => $post->slug]) }}"><img
                                        class="img-fluid w-100" style="height: 200px; object-fit: cover;" alt="Img"
                                        src="{{asset($post->cover_image ?? NO_IMAGE)}}"></a>
                            </div>
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
                                        class="isax isax-calendar-1 text-gray-7"></i>{{$post->published_at->format('jS
                                    M,
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
                <a class="btn btn-primary" data-aos="fade-up" href="{{ route('guest.news.index') }}">View All
                    Articles</a>
            </div>
        </div>
    </div>
    <!-- /Latest Blog -->

</div>
@endsection