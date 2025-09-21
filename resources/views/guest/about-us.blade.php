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

<!-- about -->
{{-- <div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center mb-4 pb-2">
                <ul class="nav nav-pills about-tab" id="aboutus" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-3 active" id="history-tab" data-bs-toggle="pill"
                            data-bs-target="#history" type="button" role="tab" aria-controls="history"
                            aria-selected="false">History</button>
                        <!--end nav-link-->
                    </li>
                    <!--end nav-item-->
                    <li class="nav-item mx-3" role="presentation">
                        <button class="nav-link rounded-3" id="vision-tab" data-bs-toggle="pill"
                            data-bs-target="#vision" type="button" role="tab" aria-controls="vision"
                            aria-selected="false">Vision</button>
                        <!--end nav-link-->
                    </li>
                    <!--end nav-item-->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-3 " id="mission-tab" data-bs-toggle="pill"
                            data-bs-target="#mission" type="button" role="tab" aria-controls="mission"
                            aria-selected="true">Mission</button>
                        <!--end nav-link-->
                    </li>
                    <!--end nav-item-->
                </ul>
                <!--nav-->
            </div>

            <div class="tab-content about-content" id="tabContent">
                <div class="tab-pane fade active show" id="history" role="tabpanel" aria-labelledby="history-tab">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="history-img text-lg-end text-center mb-4 mb-lg-0">
                                <img src="https://www.bootdey.com/image/312x315/FFB6C1/000000" alt="history"
                                    class="img-fluid rounded-circle">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-7">
                            <div class="card border-0 p-3 ms-lg-4">
                                <h4 class="about-title">History</h4>
                                <p class="mt-4 pt-3 text-muted mb-2"><em>Lorem Ipsum has been the industry's
                                        standard dummy text ever make a type since the 1500s.</em></p>
                                <p class="text-muted">
                                    When an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. Lorem Ipsum has been the industry's standard dummy text
                                    ever since unknown printer took a galley of
                                    type and it to make a type specimen book.
                                </p>
                                <div class="d-flex">
                                    <div class="about-social">
                                        <a href="#" class="text-primary">
                                            <i class="mdi mdi-facebook"></i>
                                        </a>
                                    </div>
                                    <div class="about-social mx-2">
                                        <a href="#" class="text-primary"><i class="mdi mdi-google"></i> </a>
                                    </div>
                                    <div class="about-social">
                                        <a href="#" class="text-primary"><i class="mdi mdi-instagram"></i> </a>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="text-primary">Learn More <span class="f-20">→</span></a>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="card border-0 p-3 me-lg-4">
                                <h4 class="about-title">Vision</h4>
                                <p class="mt-4 pt-3 text-muted mb-2"><em>Lorem Ipsum has been the industry's
                                        standard dummy text ever make a type since the 1500s.</em></p>
                                <p class="text-muted">
                                    When an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. Lorem Ipsum has been the industry's standard dummy text
                                    ever since unknown printer took a galley of
                                    type and it to make a type specimen book.
                                </p>
                                <a href="#" class="text-primary">Learn More <span class="f-20">→</span></a>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-md-5">
                            <div class="vision-img text-lg-end text-center mb-4 mb-lg-0">
                                <img src="https://www.bootdey.com/image/312x315/20B2AA/000000" alt="vision"
                                    class="img-fluid rounded-circle">
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end vision-tab-->
                <div class="tab-pane fade mission-tab" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="mission-img text-lg-end text-center mb-4 mb-lg-0">
                                <img src="https://www.bootdey.com/image/312x315/87CEFA/000000" alt="mission"
                                    class="img-fluid rounded-circle">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-7">
                            <div class="card border-0 p-3 ms-lg-4">
                                <h4 class="mb-4 pb-2 about-title">Our Mission</h4>
                                <div class="mission-box mt-3">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-eye mission-icon" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <h5 class="mb-0">Vision</h5>
                                            <p class="text-muted mb-0">Lorem Ipsum is text printing and
                                                typesetting.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end mission-box-->
                                <div class="mission-box ms-lg-4">
                                    <div class="d-flex align-items-center">
                                        <div class="mission-icon">
                                            <i class="mdi mdi-rocket" aria-hidden="true"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-0">Mission</h5>
                                            <p class="text-muted mb-0">Lorem Ipsum is text printing and
                                                typesetting.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end mission-box-->
                                <div class="mission-box">
                                    <div class="d-flex align-items-center">
                                        <div class="mission-icon">
                                            <i class="mdi mdi-bullseye" aria-hidden="true"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-0">Goal</h5>
                                            <p class="text-muted mb-0">Lorem Ipsum is text printing and
                                                typesetting.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end mission-box-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end mission-tab-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div> --}}
<section class="about-section-two pb-0">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="p-3 p-sm-4 position-relative">
                    <div class="position-absolute top-0 start-0 z-n1">
                        <img src="assets/img/shapes/shape-1.svg" alt="img">
                    </div>
                    <div class="position-absolute bottom-0 end-0 z-n1">
                        <img src="assets/img/shapes/shape-2.svg" alt="img">
                    </div>
                    <div class="position-absolute bottom-0 start-0 mb-md-5 ms-md-n5">
                        <img src="assets/img/icons/icon-1.svg" alt="img">
                    </div>
                    <img class="img-fluid img-radius" src="assets/diva/img-10.jpg" alt="img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ps-0 ps-lg-2 pt-4 pt-lg-0 ps-xl-5">
                    <div class="section-header">
                        <span
                            class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">About</span>
                        <h2>Cultivating Futures, Strengthening Communities</h2>
                        <p>
                            Divafam is a nonprofit organization rooted in the power of family, community, and growth.
                            Inspired by the strength of women and the resilience of youth, we cultivate more than just
                            crops —
                            we cultivate futures. Through sustainable vegetable farming, we empower women and young
                            people
                            with the skills to thrive, feed their families, and build self-sustaining livelihoods.
                        </p>
                    </div>

                    <!-- Mission -->
                    <div class="d-flex align-items-center about-us-banner">
                        <div>
                            <span
                                class="bg-primary-transparent rounded-3 p-2 about-icon d-flex justify-content-center align-items-center">
                                <i class="isax isax-leaf fs-24"></i>
                            </span>
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-2">Our Mission</h6>
                            <p>
                                To empower women and youth through sustainable agriculture training,
                                equipping them with the knowledge and tools to achieve food security,
                                financial independence, and stronger families.
                            </p>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="d-flex align-items-center about-us-banner">
                        <div>
                            <span
                                class="bg-secondary-transparent rounded-3 p-2 about-icon d-flex justify-content-center align-items-center">
                                <i class="isax isax-people fs-24"></i>
                            </span>
                        </div>
                        <div class="ps-3">
                            <h6 class="mb-2">Our Vision</h6>
                            <p>
                                A future where women and youth are empowered changemakers,
                                leading sustainable farming practices that uplift communities
                                and break the cycle of poverty.
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
                <h6 class="mb-2">Our History</h6>
                <p>
                    Divafam was founded with a vision to uplift women and youth by harnessing the power of
                    sustainable farming. What began as a small community initiative has grown into a vibrant
                    nonprofit organization that not only cultivates vegetables but also cultivates hope, resilience,
                    and opportunity.
                </p>
                <p>
                    Over the years, we have trained and supported countless women and young people,
                    enabling them to secure food for their families, create livelihoods, and become
                    change agents in their communities.
                </p>

                <!-- What You'll Learn / Gain -->
                <h6 class="mb-2">What We Do</h6>
                <ul class="custom-list mb-3">
                    <li class="list-item">Train women and youth in sustainable vegetable farming</li>
                    <li class="list-item">Provide resources and mentorship for self-sustaining livelihoods</li>
                    <li class="list-item">Promote food security and community resilience</li>
                    <li class="list-item">Encourage environmental sustainability through eco-friendly practices</li>
                    <li class="list-item">Foster collaboration, family strength, and community growth</li>
                </ul>

                <!-- Requirements -->
                <h6 class="mb-2">Get Involved</h6>
                <ul class="custom-list mb-0">
                    <li class="list-item">No farming background required — we provide hands-on training</li>
                    <li class="list-item">Passion for learning and growing with your community</li>
                    <li class="list-item">Commitment to sustainable practices and family well-being</li>
                    <li class="list-item">Volunteers and partners are welcome to support our mission</li>
                </ul>
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
                                <h4 class="text-info"><span class="count-digit" data-count="15000">0</span>+</h4>
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
                                <h4 class="text-warning"><span class="count-digit" data-count="120">0</span>+</h4>
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
                                <h4 class="text-success"><span class="count-digit" data-count="50">0</span>+</h4>
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
                                <i class="fas fa-hands-helping fa-2x text-primary"></i>
                            </div>
                            <div class="count-content">
                                <h4 class="text-primary"><span class="count-digit" data-count="500">0</span>+</h4>
                                <p>Active Volunteers</p>
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
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/01.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/02.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/03.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/04.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/05.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/06.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/07.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/02.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/03.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/04.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/05.svg" alt="img">
            </div>
            <div class="institutions-items p-1">
                <img class="img-fluid" src="assets/img/client/06.svg" alt="img">
            </div>
        </div>
    </div>
</section>
<!-- institutions -->



<!-- Team 2 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 py-xl-8 bg-light">
    <div class="container">

        <div class="section-header text-center aos" data-aos="fade-up">
            <h2>Our Team</h2>
            <p class="mb-0">
                Behind Divafam is a dedicated team of women, youth, and community leaders
                committed to empowering families, strengthening communities, and cultivating futures.
                Together, we bring passion, experience, and heart to every initiative.
            </p>
        </div>

    </div>
    <div class="container overflow-hidden align-items-center">
        <div class="row gy-4 gy-lg-0">
            <div class="col-12 col-lg-3">
                <div class="card border-0">
                    <figure class="card-img-top m-0 overflow-hidden bsb-overlay-hover">
                        <a href="#!">
                            <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                src="assets/team/team-1.jpg" alt="Abubakari Belawu Mbangba Co-founder & director">
                        </a>
                        <figcaption>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                        </figcaption>
                    </figure>
                    <div class="card-body border bg-white p-2">
                        <h2 class="card-title h4 fw-bold mb-3 text-center">Abubakari Belawu Mbangba</h2>
                        <p></p>
                    </div>
                    <div class="card-footer border border-top-0 bg-white text-center">
                        <span>Co-founder & Director</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card border-0">
                    <figure class="card-img-top m-0 overflow-hidden bsb-overlay-hover">
                        <a href="#!">
                            <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                src="assets/team/team-2.jpg" alt="Abukari Wasilatu_Secretary">
                        </a>
                        <figcaption>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                        </figcaption>
                    </figure>
                    <div class="card-body border bg-white p-2">
                        <h2 class="card-title h4 fw-bold mb-3 text-center">Abukari Wasilatu</h2>
                        <p></p>
                    </div>
                    <div class="card-footer border border-top-0 bg-white p-4 text-center">
                        <span>Secretary</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card border-0">
                    <figure class="card-img-top m-0 overflow-hidden bsb-overlay-hover">
                        <a href="#!">
                            <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                src="assets/team/team-3.jpg" alt="Al-Hassan  Abdulai">
                        </a>
                        <figcaption>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-eye text-white bsb-hover-fadeInLeft" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Read More</h4>
                        </figcaption>
                    </figure>
                    <div class="card-body border bg-white p-2">
                        <h2 class="card-title h4 fw-bold mb-3 text-center">Al-Hassan Abdulai</h2>
                        <p></p>
                    </div>
                    <div class="card-footer border border-top-0 bg-white p-4 text-center">
                        <span>Co-founder & Director</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- faq -->
<section class="faq-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 pe-md-5">
                <div class="position-relative">
                    <img class="img-fluid rounded-4" src="assets/diva/img-17.jpg" alt="img">
                    <div
                        class="bg-warning text-center p-3 rounded-5 position-absolute top-0 end-0 z-index-1 d-none d-sm-block my-3 mx-3">
                        <i class="isax isax-message-question5 heading-color fs-46"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-header">
                    <span class="fw-medium text-secondary text-decoration-underline mb-2 d-inline-block">FAQs</span>
                    <h2>Frequently Asked Questions</h2>
                    <p>Explore detailed answers to the most common questions about our platform.</p>
                </div>
                <div class="faq-content">
                    <div class="accordion accordion-customicon1 accordions-items-seperate"
                        id="accordioncustomicon1Example">
                        <div class="accordion-item" data-aos="fade-up">
                            <h2 class="accordion-header" id="headingcustomicon1One">
                                <a href="#" class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsecustomicon1One" aria-expanded="true"
                                    aria-controls="collapsecustomicon1One">
                                    What’s DreamLMS want to give you? <i
                                        class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                </a>
                            </h2>
                            <div id="collapsecustomicon1One" class="accordion-collapse collapse show"
                                aria-labelledby="headingcustomicon1One" data-bs-parent="#accordioncustomicon1Example">
                                <div class="accordion-body pt-0">
                                    <p>DreamLMS aims to provide you with a comprehensive and intuitive learning platform
                                        that enhances your educational experience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                            <h2 class="accordion-header" id="headingcustomicon1Two">
                                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapsecustomicon1Two" aria-expanded="false"
                                    aria-controls="collapsecustomicon1One">
                                    Why choose us for your education? <i
                                        class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                </a>
                            </h2>
                            <div id="collapsecustomicon1Two" class="accordion-collapse collapse"
                                aria-labelledby="headingcustomicon1Two" data-bs-parent="#accordioncustomicon1Example">
                                <div class="accordion-body pt-0">
                                    <p>DreamLMS aims to provide you with a comprehensive and intuitive learning platform
                                        that enhances your educational experience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                            <h2 class="accordion-header" id="headingcustomicon1Three">
                                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapsecustomicon1Three" aria-expanded="false"
                                    aria-controls="collapsecustomicon1One">
                                    How We Provide Service For you? <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                </a>
                            </h2>
                            <div id="collapsecustomicon1Three" class="accordion-collapse collapse"
                                aria-labelledby="headingcustomicon1Three" data-bs-parent="#accordioncustomicon1Example">
                                <div class="accordion-body pt-0">
                                    <p>DreamLMS aims to provide you with a comprehensive and intuitive learning platform
                                        that enhances your educational experience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                            <h2 class="accordion-header" id="headingcustomicon1Four">
                                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapsecustomicon1Four" aria-expanded="false"
                                    aria-controls="collapsecustomicon1One">
                                    Do you have a monthly plan? <i class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                </a>
                            </h2>
                            <div id="collapsecustomicon1Four" class="accordion-collapse collapse"
                                aria-labelledby="headingcustomicon1Four" data-bs-parent="#accordioncustomicon1Example">
                                <div class="accordion-body pt-0">
                                    <p>DreamLMS aims to provide you with a comprehensive and intuitive learning platform
                                        that enhances your educational experience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                            <h2 class="accordion-header" id="headingcustomicon1Five">
                                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapsecustomicon1Five" aria-expanded="false"
                                    aria-controls="collapsecustomicon1One">
                                    Are you Affordable For Your Course <i
                                        class="isax isax-add fs-20 fw-semibold ms-1"></i>
                                </a>
                            </h2>
                            <div id="collapsecustomicon1Five" class="accordion-collapse collapse"
                                aria-labelledby="headingcustomicon1Five" data-bs-parent="#accordioncustomicon1Example">
                                <div class="accordion-body pt-0">
                                    <p>DreamLMS aims to provide you with a comprehensive and intuitive learning platform
                                        that enhances your educational experience.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq -->
@endsection