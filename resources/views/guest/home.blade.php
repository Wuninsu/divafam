@extends('layouts.app')

@section('content')
    <div class="banner-section-two">

        <div id="bs-carousel" class="carousel slide fade-carousel" data-bs-ride="carousel" data-bs-interval="4000">
            <!-- Overlay -->
            <div class="overlay"></div>

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-bs-target="#bs-carousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#bs-carousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#bs-carousel" data-bs-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item slides active">
                    <img src="assets/diva/img-2.jpg" class="d-block w-100" alt="cabage-farm">
                    <div class="hero">
                        <hgroup>
                            <h1>Cabbage Farm</h1>
                            <h3>A thriving cabbage farm project supporting local farmers.</h3>
                        </hgroup>
                        <button class="btn btn-hero btn-lg" role="button">See all features</button>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item slides">
                    <img src="assets/diva/img-15.jpg" class="d-block w-100" alt="team-meat-with-partners">
                    <div class="hero">
                        <hgroup>
                            <h1>Team Meeting with Partners</h1>
                            <h3>Collaborating with partners to build stronger communities.</h3>
                        </hgroup>
                        <button class="btn btn-hero btn-lg" role="button">See all features</button>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item slides">
                    <img src="assets/diva/img-18.jpg" class="d-block w-100" alt="serving-kids-food">
                    <div class="hero">
                        <hgroup>
                            <h1>Serving Kids Food</h1>
                            <h3>Providing nutritious meals to children in need.</h3>
                        </hgroup>
                        <button class="btn btn-hero btn-lg" role="button">See all features</button>
                    </div>
                </div>
            </div>
        </div>

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
        <img class="top-courses-bg" src="assets/img/bg/bg-20.png" alt="img">
        <div class="container">
            <div class="section-header text-center">
                <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Our Partners</span>
                <h2>Honoring Our Sponsors & Donors</h2>
                <p>We sincerely appreciate the generous support of our sponsors and donors who make our mission possible.
                </p>
            </div>
            <div class="top-courses-slider lazy">
                <!-- Sponsor 1 -->
                <div>
                    <div class="categories-item categories-item-three mb-0">
                        <img class="mx-auto" src="assets/diva/sponsors/sponsor1.png" alt="Sponsor 1 Logo">
                        <h6 class="title">Sponsor One</h6>
                    </div>
                </div>
                <!-- Sponsor 2 -->
                <div>
                    <div class="categories-item categories-item-three mb-0">
                        <img class="mx-auto" src="assets/diva/sponsors/sponsor2.png" alt="Sponsor 2 Logo">
                        <h6 class="title">Donor Two</h6>
                    </div>
                </div>
                <!-- Sponsor 3 -->
                <div>
                    <div class="categories-item categories-item-three mb-0">
                        <img class="mx-auto" src="assets/diva/sponsors/sponsor3.png" alt="Sponsor 3 Logo">
                        <h6 class="title">Sponsor Three</h6>
                    </div>
                </div>
                <!-- Sponsor 4 -->
                <!-- Sponsor 1 -->
                <div>
                    <div class="categories-item categories-item-three mb-0">
                        <img class="mx-auto" src="assets/diva/sponsors/sponsor1.png" alt="Sponsor 1 Logo">
                        <h6 class="title">Sponsor One</h6>
                    </div>
                </div>
                <!-- Sponsor 2 -->
                <div>
                    <div class="categories-item categories-item-three mb-0">
                        <img class="mx-auto" src="assets/diva/sponsors/sponsor2.png" alt="Sponsor 2 Logo">
                        <h6 class="title">Donor Two</h6>
                    </div>
                </div>
                <!-- Sponsor 3 -->
                <div>
                    <div class="categories-item categories-item-three mb-0">
                        <img class="mx-auto" src="assets/diva/sponsors/sponsor3.png" alt="Sponsor 3 Logo">
                        <h6 class="title">Sponsor Three</h6>
                    </div>
                </div>
                <!-- Sponsor 4 -->
                <div>
                    <div class="categories-item categories-item-three mb-0">
                        <img class="mx-auto" src="assets/diva/sponsors/sponsor4.png" alt="Sponsor 4 Logo">
                        <h6 class="title">Donor Four</h6>
                    </div>
                </div>
                <!-- Add more as needed -->
            </div>
            <a href="sponsors.html" class="btn btn-primary btn-md">View All Sponsors</a>
        </div>
    </section>

    <!-- /top courses -->

    <!-- trust -->
    <section class="trust-sec">
        <div class="container">
            <div class="video-showcase">
                <img src="assets/img/feature/feature-1.jpg" class="img-fluid w-100 rounded-2" alt="banner">
                <div class="video-play">
                    <a href="https://www.youtube.com/embed/1trvO6dqQUI" data-fancybox=""><i
                            class="isax isax-play5"></i></a>
                </div>
            </div>
            <div class="trust-content">
                <img src="assets/img/bg/bg-19.png" alt="img" class="w-100 trust-bg">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <h4>Trusted by the 15,000+ happy students and online users since 2000</h4>
                        <div class="d-flex align-items-center flex-wrap mt-5 gap-2">
                            <a href="login.html" class="btn btn-secondary">Enroll as Student</a>
                            <a href="become-an-instructor.html" class="btn btn-dark">Apply as Tutor</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-white mb-2">9.8/10</h4>
                                <h5 class="text-white mb-2">Course Approval Score</h5>
                                <p class="text-white mb-5">Achieving a complete course approval score is a
                                    significant.</p>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-white mb-2">13k</h4>
                                <h5 class="text-white mb-2">Satisfied Students Worldwide</h5>
                                <p class="text-white mb-5">Satisfied students worldwide share a common thread of
                                    happiness.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white user-goal p-2">
                            <div class="avatar avatar-lg flex-shrink-0">
                                <img class="rounded-pill" src="assets/img/user/user-28.jpg" alt="img">
                            </div>
                            <p class="text-gray-9 mb-0">“All courses are incredibly help people to achieve their
                                goals”</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /trust -->

    <!-- featured course -->
    <section class="featured-courses-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Projects</span>
                <h2>Our Featured Projects</h2>
                <p>Explore some of our impactful projects that are transforming lives and communities.</p>
            </div>

            <div class="feature-course-slider-2">
                <div>
                    <div class="course-item">
                        <div class="course-img">
                            <a href="project-details.html">
                                <img src="assets/diva/img-2.jpg" alt="DivaFam Project" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                            </a>
                            <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                <span class="badge bg-success ms-auto">Ongoing</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge badge-md badge-soft-info rounded-pill">Women Empowerment</span>
                            <a href="javascript:void(0);" class="fav-icon"><i class="isax isax-heart"></i></a>
                        </div>
                        <div class="pb-3 border-bottom mb-3">
                            <h5><a href="project-details.html">DivaFam Women Empowerment Initiative</a></h5>
                        </div>
                       
                        <a href="project-details.html" class="btn btn-success">View Project</a>
                    </div>
                </div>

                <div>
                    <div class="course-item">
                        <div class="course-img">
                            <a href="project-details.html">
                                <img src="assets/diva/img-5.jpg" alt="DivaFam Project" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                            </a>
                            <div class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-2">
                                <span class="badge bg-primary ms-auto">Completed</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge badge-md badge-soft-danger rounded-pill">Youth Development</span>
                            <a href="javascript:void(0);" class="fav-icon"><i class="isax isax-heart"></i></a>
                        </div>
                        <div class="pb-3 border-bottom mb-3">
                            <h5><a href="project-details.html">DivaFam Digital Skills Training for Youth</a></h5>
                        </div>
                       
                        <a href="project-details.html" class="btn btn-success">View Project</a>
                    </div>
                </div>

            </div>
            <div class="d-flex align-items-center justify-content-center">
                <a href="course-list.html" class="btn btn-primary btn-md">View All Courses</a>
            </div>
        </div>
    </section>
    <!-- /featured course -->

    <!-- community-to-learn -->
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

                    <div class="community-item d-flex align-items-center">
                        <span class="community-icon-1">
                            <i class="fas fa-hands-helping"></i>
                        </span>
                        <div>
                            <h5 class="mb-2">Support for All</h5>
                            <p class="mb-0">We reach out to communities in need, ensuring support and opportunities for
                                everyone.</p>
                        </div>
                    </div>

                    <div class="community-item d-flex align-items-center">
                        <span class="community-icon-2">
                            <i class="fas fa-users"></i>
                        </span>
                        <div>
                            <h5 class="mb-2">Dedicated Partners</h5>
                            <p class="mb-0">Our sponsors and donors are the backbone of every successful initiative we
                                run.</p>
                        </div>
                    </div>

                    <div class="community-item d-flex align-items-center">
                        <span class="community-icon-3">
                            <i class="fas fa-seedling"></i>
                        </span>
                        <div>
                            <h5 class="mb-2">Sustainable Growth</h5>
                            <p class="mb-0">We focus on long-term skills, projects, and programs that uplift entire
                                communities.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a href="become-beneficiary.html" class="btn btn-secondary btn-md">Join as Beneficiary</a>
                        <a href="become-sponsor.html" class="btn btn-dark btn-md">Partner as Sponsor</a>
                    </div>
                </div>

                <!-- Keep the right side image/counter as is (can adapt text later) -->
                <div class="col-lg-6">
                    <div class="community-img d-none d-lg-flex">
                        <img src="assets/img/shapes/shape-5.png" alt="img" class="img-fluid community-img-01">
                        <img src="assets/img/shapes/shape-6.png" alt="img" class="img-fluid community-img-02">
                        <img src="assets/diva/img-4.jpg" alt="img" class="img-fluid community-img-03">
                        <img src="assets/diva/img-16.jpg" alt="img" class="img-fluid community-img-04">
                        <img src="assets/img/shapes/shape-7.svg" alt="img" class="img-fluid community-img-05">
                        <div class="community-count p-2">
                            <div class="enrolled-list">
                                <div class="avatar-list-stacked mb-2">
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-4.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-4.jpg" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img class="border border-white" src="assets/diva/img-4.jpg" alt="img">
                                    </span>
                                </div>
                                <p class="mb-0"><span class="text-secondary">35K+</span> Lives Impacted</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /community-to-learn -->

    <!-- client -->
    <div class="cliets-section-one">
        <div class="brand-slide">
            <div>
                <img src="assets/img/client/08.svg" alt="img">
            </div>
            <div>
                <img src="assets/img/client/09.svg" alt="img">
            </div>
            <div>
                <img src="assets/img/client/10.svg" alt="img">
            </div>
            <div>
                <img src="assets/img/client/11.svg" alt="img">
            </div>
            <div>
                <img src="assets/img/client/12.svg" alt="img">
            </div>
            <div>
                <img src="assets/img/client/13.svg" alt="img">
            </div>
            <div>
                <img src="assets/img/client/08.svg" alt="img">
            </div>
            <div>
                <img src="assets/img/client/09.svg" alt="img">
            </div>
        </div>
    </div>
    <!-- /client -->

    <!-- how it works -->
    <div class="how-it-works-sec-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="me-5" data-aos="fade-up">
                        <img src="assets/diva/img-13.jpg" class="img-fluid rounded-5" alt="DivaFam Impact">
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

                        <div class="d-flex align-items-center works-items">
                            <span class="count">01</span>
                            <div>
                                <h5 class="mb-1">Sign Up as Sponsor or Donor</h5>
                                <p>Join our mission by registering as a sponsor, donor, or partner through our platform.</p>
                            </div>
                        </div>

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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- how it works -->


    <!-- testimonials -->
    <div class="testimonials-section testimonials-sec-one text-center">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">Featured
                    Instructors</span>
                <h2>Top Class & Professional Instructors</h2>
                <p>Words from Those Who’ve Experienced Real Growth</p>
            </div>
            <div class="testimonials-slider lazy mt-4">
                <div>
                    <div class="testimonials-item rounded-3 bg-white" data-aos="flip-right">
                        <div class="position-relative d-inline-flex">
                            <div class="avatar rounded-circle avatar-xxl border border-white border-3">
                                <a href="student-details.html"><img class="img-fluid rounded-circle"
                                        src="assets/img/user/user-41.jpg" alt="img"></a>
                            </div>
                            <i class="isax isax-quote-up5 bg-secondary quote rounded-pill fs-16 p-1"></i>
                        </div>
                        <h6 class="mb-1"><a href="student-details.html">Brenda Slaton</a></h6>
                        <p class="designation">Designer</p>
                        <p class="mb-3 text-truncate line-clamb-2">This mentor helped me understand concepts that
                            I had been struggling with for weeks.</p>
                        <div>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="testimonials-item rounded-3 bg-white" data-aos="flip-right">
                        <div class="position-relative d-inline-flex">
                            <div class="avatar rounded-circle avatar-xxl border border-white border-3">
                                <a href="student-details.html"><img class="img-fluid rounded-circle"
                                        src="assets/img/user/user-42.jpg" alt="img"></a>
                            </div>
                            <i class="isax isax-quote-up5 bg-secondary quote rounded-pill fs-16 p-1"></i>
                        </div>
                        <h6 class="mb-1"><a href="student-details.html">Adrian Dennis</a></h6>
                        <p class="designation">Developer</p>
                        <p class="mb-3 text-truncate line-clamb-2">I’ve learned so much from my mentor’s personal
                            experience.</p>
                        <div>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="testimonials-item rounded-3 bg-white" data-aos="flip-right">
                        <div class="position-relative d-inline-flex">
                            <div class="avatar rounded-circle avatar-xxl border border-white border-3">
                                <a href="student-details.html"><img class="img-fluid rounded-circle"
                                        src="assets/img/user/user-43.jpg" alt="img"></a>
                            </div>
                            <i class="isax isax-quote-up5 bg-secondary quote rounded-pill fs-16 p-1"></i>
                        </div>
                        <h6 class="mb-1"><a href="student-details.html">Adrian Coztanza</a></h6>
                        <p class="designation">Architect</p>
                        <p class="mb-3 text-truncate line-clamb-2">The advice was useful, but I wish my mentor had
                            been more available for follow-up discussions.</p>
                        <div>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="testimonials-item rounded-3 bg-white">
                        <div class="position-relative d-inline-flex">
                            <div class="avatar rounded-circle avatar-xxl border border-white border-3">
                                <a href="student-details.html"><img class="img-fluid rounded-circle"
                                        src="assets/img/user/user-43.jpg" alt="img"></a>
                            </div>
                            <i class="isax isax-quote-up5 bg-secondary quote rounded-pill fs-16 p-1"></i>
                        </div>
                        <h6 class="mb-1"><a href="student-details.html">Adrian Coztanza</a></h6>
                        <p class="designation">Architect</p>
                        <p class="mb-3 text-truncate line-clamb-2">The advice was useful, but I wish my mentor had
                            been more available for follow-up discussions.</p>
                        <div>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonials -->

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

                            <!-- Item 1 -->
                            <div class="accordion-item" data-aos="fade-up">
                                <h2 class="accordion-header" id="faqHeadingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapseOne" aria-expanded="true"
                                        aria-controls="faqCollapseOne">
                                        What is Divafam’s mission?
                                        <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                    </button>
                                </h2>
                                <div id="faqCollapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0">
                                        <p>Divafam (formerly Diva Farms) empowers women and youth through sustainable
                                            vegetable farming, education, clean water access, farmer health support, and
                                            grassroots climate awareness. We cultivate more than crops — we cultivate
                                            futures.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="150">
                                <h2 class="accordion-header" id="faqHeadingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapseTwo" aria-expanded="false"
                                        aria-controls="faqCollapseTwo">
                                        Who can join Divafam’s training programs?
                                        <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                    </button>
                                </h2>
                                <div id="faqCollapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0">
                                        <p>Our programs are open to young people, women, and marginalized community members
                                            who want to learn sustainable farming, business skills, and community leadership
                                            for self-sustaining livelihoods.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h2 class="accordion-header" id="faqHeadingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapseThree" aria-expanded="false"
                                        aria-controls="faqCollapseThree">
                                        How does Divafam use donations?
                                        <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                    </button>
                                </h2>
                                <div id="faqCollapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0">
                                        <p>Every donation, no matter how small, is treated with rigorous care. Funds support
                                            training programs, boreholes for clean water, farmer health initiatives,
                                            education for marginalized groups, and climate resilience projects.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                                <h2 class="accordion-header" id="faqHeadingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapseFour" aria-expanded="false"
                                        aria-controls="faqCollapseFour">
                                        How can I get involved with Divafam?
                                        <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                    </button>
                                </h2>
                                <div id="faqCollapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="faqHeadingFour" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0">
                                        <p>You can join as a trainee, volunteer, donor, or partner. Whether through
                                            financial contributions, sharing expertise, or offering community support —
                                            every action strengthens our impact.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 5 -->
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="accordion-header" id="faqHeadingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapseFive" aria-expanded="false"
                                        aria-controls="faqCollapseFive">
                                        How does Divafam ensure transparency?
                                        <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                    </button>
                                </h2>
                                <div id="faqCollapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="faqHeadingFive" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0">
                                        <p>We publish both our success metrics and setbacks openly. This fosters honest
                                            dialogue, faster course-corrections, and stronger trust with our partners and
                                            the communities we serve.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 6 -->
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="350">
                                <h2 class="accordion-header" id="faqHeadingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapseSix" aria-expanded="false"
                                        aria-controls="faqCollapseSix">
                                        How can I contact Divafam for support or partnership?
                                        <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                    </button>
                                </h2>
                                <div id="faqCollapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="faqHeadingSix" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body pt-0">
                                        <p>You can reach us through our website contact form, by email at
                                            <a href="mailto:info@divafam.org">info@divafam.org</a>, or via our community
                                            engagement team.
                                        </p>
                                    </div>
                                </div>
                            </div>

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

                            <div class="item flex-fill">
                                <div class="review-item">
                                    <h5 class="title">"A New Beginning"</h5>
                                    <p>Through Divafam’s farming training, I can now grow enough food to feed my family and
                                        even sell some at the market. It has given me hope and confidence for the future.
                                    </p>
                                    <div class="d-flex align-items-center review-user">
                                        <div class="me-2">
                                            <img src="assets/img/user/user-12.jpg" alt="img"
                                                class="img-fluid rounded-circle" width="50">
                                        </div>
                                        <div>
                                            <h6 class="fw-medium mb-0">Adwoa Mensah</h6>
                                            <p class="mb-0 small">Young Farmer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item flex-fill">
                                <div class="review-item">
                                    <h5 class="title">"Clean Water Changed Everything"</h5>
                                    <p>Before Divafam’s borehole project, we walked long distances for water. Now, my
                                        children are healthier and I have more time to focus on farming and school
                                        activities.</p>
                                    <div class="d-flex align-items-center review-user">
                                        <div class="me-2">
                                            <img src="assets/img/user/user-06.jpg" alt="img"
                                                class="img-fluid rounded-circle" width="50">
                                        </div>
                                        <div>
                                            <h6 class="fw-medium mb-0">Fatima Yakubu</h6>
                                            <p class="mb-0 small">Mother of 4</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item flex-fill">
                                <div class="review-item">
                                    <h5 class="title">"Learning for the Future"</h5>
                                    <p>Divafam taught me not just farming but how to save, plan, and look after my health. I
                                        now dream of starting my own small agribusiness.</p>
                                    <div class="d-flex align-items-center review-user">
                                        <div class="me-2">
                                            <img src="assets/img/user/user-09.jpg" alt="img"
                                                class="img-fluid rounded-circle" width="50">
                                        </div>
                                        <div>
                                            <h6 class="fw-medium mb-0">Kwame Boateng</h6>
                                            <p class="mb-0 small">Youth Trainee</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="img-section">
                            <img src="assets/img/feature/feature-23.jpg" alt="img" class="img-fluid about-img aos"
                                data-aos="zoom-in">
                            <div class="enrolled-list-cover d-none d-xl-flex aos" data-aos="fade-down">
                                <div class="enrolled-list">
                                    <div class="avatar-list-stacked">
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="assets/img/user/user-01.jpg"
                                                alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="assets/img/user/user-35.jpg"
                                                alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="assets/img/user/user-09.jpg"
                                                alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img class="border border-white" src="assets/img/user/user-06.jpg"
                                                alt="img">
                                        </span>
                                        <span class="avatar avatar-rounded">
                                            <img src="assets/img/user/user-36.jpg" alt="img">
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
                                    <a href="become-sponsor.html"
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
                        <div class="role-item student-bg aos aos-init aos-animate shadow-sm p-4 rounded"
                            data-aos="fade-up">
                            <div class="row align-items-center">
                                <div class="col-xl-8">
                                    <h5 class="mb-2">Become a Donor</h5>
                                    <p class="mb-4">Contribute to training, tools, and food security projects in local
                                        communities.</p>
                                    <a href="#"
                                        class="btn btn-secondary rounded-pill d-inline-flex align-items-center">
                                        Continue <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                                <div class="col-xl-4 text-center">
                                    <i class="fas fa-donate fa-4x text-secondary"></i>
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
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card aos aos-init aos-animate" data-aos="zoom-in">
                        <div class="blog-img">
                            <a href="#"><img class="img-fluid w-100" style="height: 200px; object-fit: cover;"
                                    alt="Img" src="assets/diva/img-1.jpg"></a>
                        </div>
                        <div class="blog-content">
                            <h5><a href="#">Training Women in Sustainable Vegetable Farming</a></h5>
                            <p>Learning to grow vegetables sustainably can empower women and improve their livelihoods...
                            </p>
                            <div class="blog-user d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="avatar me-2">
                                        <img src="assets/img/user/user-ghana.jpg" alt="img" class="img-fluid">
                                    </a>
                                    <p class="mb-0 d-flex align-items-center">by <a href="#"
                                            class="fw-medium ms-1">Fuseini Abdul-Hafiz Wuninsu</a></p>
                                </div>
                                <p class="d-flex align-items-center"><i class="isax isax-calendar-1 text-gray-7"></i>02
                                    Sep 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img">
                            <a href="#"><img class="img-fluid w-100" style="height: 200px; object-fit: cover;"
                                    alt="Img" src="assets/diva/img-19.jpg"></a>
                        </div>
                        <div class="blog-content">
                            <h5><a href="#">Boreholes and Clean Water: Transforming Rural Villages</a></h5>
                            <p>Access to clean water is transforming rural communities, improving health, and increasing
                                productivity...</p>
                            <div class="blog-user d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="avatar me-2">
                                        <img src="assets/img/user/user-ghana.jpg" alt="img" class="img-fluid">
                                    </a>
                                    <p class="mb-0 d-flex align-items-center">by <a href="#"
                                            class="fw-medium ms-1">Ama Boateng</a></p>
                                </div>
                                <p class="d-flex align-items-center"><i class="isax isax-calendar-1 text-gray-7"></i>15
                                    Aug 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img">
                            <a href="#"><img class="img-fluid w-100" style="height: 200px; object-fit: cover;"
                                    alt="Img" src="assets/diva/img-6.jpg"></a>
                        </div>
                        <div class="blog-content">
                            <h5><a href="#">Grassroots Climate Awareness for a Greener Future</a></h5>
                            <p>Climate awareness at the grassroots level is crucial in creating sustainable environmental
                                change...</p>
                            <div class="blog-user d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="avatar me-2">
                                        <img src="assets/img/user/user-ghana.jpg" alt="img" class="img-fluid">
                                    </a>
                                    <p class="mb-0 d-flex align-items-center">by <a href="#"
                                            class="fw-medium ms-1">Kwame Mensah</a></p>
                                </div>
                                <p class="d-flex align-items-center"><i class="isax isax-calendar-1 text-gray-7"></i>01
                                    Jul 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a class="btn btn-primary" data-aos="fade-up" href="{{ route('news.index') }}">View All Articles</a>
            </div>
        </div>
    </div>

    <!-- /Latest Blog -->
@endsection
