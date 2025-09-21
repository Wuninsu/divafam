@extends('layouts.app')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Divafam News</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">News</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- blog -->
    <div class="content">
        <div class="container">

            <div class="row">
                <!-- Blog Sidebar -->
                <div class="col-lg-4 sidebar-left mt-4 mt-lg-0 theiaStickySidebar">

                    <!-- Search -->
                    <div class="search-widget blog-search blog-widget">
                        <div>
                            <h5 class="mb-3 fs-18">Search</h5>
                            <form class="search-form">
                                <div class="position-relative">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit" class="search-btn"><i
                                            class="isax isax-search-normal-1"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Search -->

                    <!-- Categories -->
                    <div class="blog-widget">
                        <h5 class="fs-18 mb-3">Categories</h5>
                        <div class="categories-list">
                            <h6 class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" id="category-agriculture" class="me-2">
                                    <label for="category-agriculture" class="fs-14 text-secondary fw-bold">
                                        Agriculture
                                    </label>
                                </div>
                                <span class="badge rounded-pill bg-light text-dark">08</span>
                            </h6>
                            <h6 class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" id="category-community" class="me-2">
                                    <label for="category-community" class="fs-14 text-secondary fw-bold">
                                        Community Development
                                    </label>
                                </div>
                                <span class="badge rounded-pill bg-light text-dark">05</span>
                            </h6>
                            <h6 class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" id="category-education" class="me-2">
                                    <label for="category-education" class="fs-14 text-secondary fw-bold">
                                        Education & Training
                                    </label>
                                </div>
                                <span class="badge rounded-pill bg-light text-dark">06</span>
                            </h6>
                            <h6 class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" id="category-health" class="me-2">
                                    <label for="category-health" class="fs-14 text-secondary fw-bold">
                                        Farmer Health
                                    </label>
                                </div>
                                <span class="badge rounded-pill bg-light text-dark">03</span>
                            </h6>
                            <h6 class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" id="category-climate" class="me-2">
                                    <label for="category-climate" class="fs-14 text-secondary fw-bold">
                                        Climate Awareness
                                    </label>
                                </div>
                                <span class="badge rounded-pill bg-light text-dark">04</span>
                            </h6>
                            <h6 class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" id="category-water" class="me-2">
                                    <label for="category-water" class="fs-14 text-secondary fw-bold">
                                        Clean Water Projects
                                    </label>
                                </div>
                                <span class="badge rounded-pill bg-light text-dark">02</span>
                            </h6>
                        </div>
                    </div>


                    <!-- /Categories -->

                    <!-- Tags -->
                    <div class="blog-widget">
                        <h5 class="fs-18 mb-3">Latest Tags</h5>
                        <div class="card-body">
                            <ul class="latest-tags">
                                <li><a href="javascript:void(0);"
                                        class="tag rounded-1 p-2 fs-10 fw-medium d-flex">Sustainable Farming</a></li>
                                <li><a href="javascript:void(0);" class="tag rounded-1 p-2 fs-10 fw-medium d-flex">Women
                                        Empowerment</a></li>
                                <li><a href="javascript:void(0);" class="tag rounded-1 p-2 fs-10 fw-medium d-flex">Youth
                                        Training</a></li>
                                <li><a href="javascript:void(0);" class="tag rounded-1 p-2 fs-10 fw-medium d-flex">Community
                                        Development</a></li>
                                <li><a href="javascript:void(0);" class="tag rounded-1 p-2 fs-10 fw-medium d-flex">Clean
                                        Water</a></li>
                                <li><a href="javascript:void(0);" class="tag rounded-1 p-2 fs-10 fw-medium d-flex">Climate
                                        Action</a></li>
                                <li><a href="javascript:void(0);" class="tag rounded-1 p-2 fs-10 fw-medium d-flex">Farmer
                                        Health</a></li>
                                <li><a href="javascript:void(0);" class="tag rounded-1 p-2 fs-10 fw-medium d-flex">Education
                                        Access</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- /Tags -->

                </div>
                <!-- /Blog Sidebar -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="blog">
                                <div class="blog-image">
                                    <a href="{{ route('guest.news.show', ['id' => 2]) }}">
                                        <img class="img-fluid w-100" style="height: 250px; object-fit: cover;"
                                            src="assets/diva/img-15.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="blog-item">
                                    <span class="badge bg-success mb-2">Education</span>
                                    <h5 class="mb-2"><a href="{{ route('guest.news.show', ['id' => 2]) }}">Empowering Youth Through
                                            Sustainable
                                            Farming</a></h5>
                                    <p class="text-truncate line-clamb-2">Discover how Divafam is training young people in
                                        modern, eco-friendly
                                        farming practices to secure brighter futures for themselves and their communities...
                                    </p>
                                    <div class="blog-info">
                                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                                            <div class="d-flex align-items-center user-profile">
                                                <a href="#" class="user-img">
                                                    <img class="rounded-pill w-auto"
                                                        src="assets/img/user/local-author-1.jpg" alt="img">
                                                </a>
                                                <a href="#" class="user-name">Abena Owusu</a>
                                            </div>
                                            <ul class="d-flex align-items-center flex-wrap gap-2">
                                                <li>
                                                    <img class="me-1" src="assets/img/icons/calendar.svg"
                                                        alt="img">
                                                    <p>23 Apr 2024</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="blog">
                                <div class="blog-image">
                                    <a href="{{ route('guest.news.show', ['id' => 2]) }}">
                                        <img class="img-fluid w-100" style="height: 250px; object-fit: cover;"
                                            src="assets/diva/img-8.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="blog-item">
                                    <span class="badge bg-success mb-2">Guides</span>
                                    <h5 class="mb-2"><a href="{{ route('guest.news.show', ['id' => 2]) }}">Clean Water Projects
                                            Transforming Rural
                                            Lives</a></h5>
                                    <p class="text-truncate line-clamb-2">Learn how borehole installations and water
                                        initiatives are bringing
                                        hope, health, and dignity to marginalized families in rural Ghana...</p>
                                    <div class="blog-info">
                                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                                            <div class="d-flex align-items-center user-profile">
                                                <a href="#" class="user-img">
                                                    <img class="rounded-pill w-auto"
                                                        src="assets/img/user/local-author-2.jpg" alt="img">
                                                </a>
                                                <a href="#" class="user-name">Kwame Mensah</a>
                                            </div>
                                            <ul class="d-flex align-items-center flex-wrap gap-2">
                                                <li>
                                                    <img class="me-1" src="assets/img/icons/calendar.svg"
                                                        alt="img">
                                                    <p>20 Apr 2024</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /pagination -->
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="pagination justify-content-center">
                                <li class="page-item prev">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1"><i
                                            class="fas fa-angle-left"></i></a>
                                </li>
                                <li class="page-item first-page active">
                                    <a class="page-link" href="javascript:void(0)">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">3</a>
                                </li>
                                <li class="page-item next">
                                    <a class="page-link" href="javascript:void(0)"><i class="fas fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /pagination -->
                </div>
            </div>
        </div>
    </div>
    <!-- blog -->
@endsection
