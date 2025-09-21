@extends('layouts.app')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Divafam Projects</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Projects</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Course -->
    <section class="course-content">
        <div class="container">
            <div class="row align-items-baseline">
                <div class="col-lg-3 theiaStickySidebar">
                    <div class="filter-clear">
                        <div class="clear-filter mb-4 pb-lg-2 d-flex align-items-center justify-content-between">
                            <h5><i class="feather-filter me-2"></i>Filters</h5>
                            <a href="javascript:void(0);" class="clear-text">
                                Clear
                            </a>
                        </div>

                        <div class="accordion accordion-customicon1 accordions-items-seperate">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingcustomicon1One">
                                    <a href="#" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsecustomicon1One" aria-expanded="false"
                                        aria-controls="collapsecustomicon1One">
                                        Categories <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                </h2>
                                <div id="collapsecustomicon1One" class="accordion-collapse collapse show"
                                    aria-labelledby="headingcustomicon1One" data-bs-parent="#accordioncustomicon1Example"
                                    style="">
                                    <div class="accordion-body">
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" name="select_specialist">
                                                <span class="checkmark"></span> Backend (3)
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" name="select_specialist">
                                                <span class="checkmark"></span> CSS (2)
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" name="select_specialist">
                                                <span class="checkmark"></span> Frontend (2)
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" name="select_specialist">
                                                <span class="checkmark"></span> General (2)
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" name="select_specialist" checked>
                                                <span class="checkmark"></span> IT & Software (2)
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" name="select_specialist">
                                                <span class="checkmark"></span> Photography (2)
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="checkbox" name="select_specialist">
                                                <span class="checkmark"></span> Programming Language (3)
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check mb-0">
                                                <input type="checkbox" name="select_specialist">
                                                <span class="checkmark"></span> Technology (2)
                                            </label>
                                        </div>
                                        <a href="javascript:void(0);" class="see-more-btn">See More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">

                    <!-- Filter -->
                    <div class="showing-list mb-4">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="show-result text-center text-lg-start">
                                    <h6 class="fw-medium">Showing 1-9 of 50 results</h6>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="show-filter add-course-info">
                                    <form action="#">
                                        <div class="d-sm-flex justify-content-center justify-content-lg-end mb-1 mb-lg-0">
                                            <select class="form-select">
                                                <option>Newly Published </option>
                                                <option>Trending Courses</option>
                                                <option>Top Rated</option>
                                                <option>Free Courses</option>
                                            </select>
                                            <div class=" search-group">
                                                <i class="isax isax-search-normal-1"></i>
                                                <input type="text" class="form-control" placeholder="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="course-item-two course-item mx-0">
                                <div class="course-img">
                                    <a href="#">
                                        <img src="assets/diva/img-20.jpg" alt="DivaFam Project"
                                            class="img-fluid">
                                    </a>
                                    <div
                                        class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                        <div class="badge text-bg-danger">Ongoing</div>
                                        <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                                class="isax isax-heart"></i></a>
                                    </div>
                                </div>
                                <div class="course-content">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('guest.projects.show', ['id' => 3]) }}" class="avatar avatar-sm">
                                                <img src="assets/img/user/user-29.jpg" alt="Coordinator"
                                                    class="img-fluid avatar avatar-sm rounded-circle">
                                            </a>
                                            <div class="ms-2">
                                                <a href="{{ route('guest.projects.show', ['id' => 3]) }}"
                                                    class="link-default fs-14">Brenda
                                                    Slaton</a>
                                            </div>
                                        </div>
                                        <span
                                            class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                            Women Empowerment
                                        </span>
                                    </div>
                                    <h6 class="title mb-2"><a href="{{ route('guest.projects.show', ['id' => 3]) }}">DivaFam Skills
                                            Training for
                                            Women</a></h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ route('guest.projects.show', ['id' => 3]) }}"
                                            class="btn btn-dark btn-sm d-inline-flex align-items-center">View Project<i
                                                class="isax isax-arrow-right-3 ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="course-item-two course-item mx-0">
                                <div class="course-img">
                                    <a href="#">
                                        <img src="assets/diva/img-2.jpg" alt="DivaFam Project"
                                            class="img-fluid">
                                    </a>
                                    <div
                                        class="position-absolute start-0 top-0 d-flex align-items-start w-100 z-index-2 p-3">
                                        <a href="javascript:void(0);" class="fav-icon ms-auto"><i
                                                class="isax isax-heart"></i></a>
                                    </div>
                                </div>
                                <div class="course-content">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="avatar avatar-sm">
                                                <img src="assets/img/user/user-30.jpg" alt="Coordinator"
                                                    class="img-fluid avatar avatar-sm rounded-circle">
                                            </a>
                                            <div class="ms-2">
                                                <a href="#" class="link-default fs-14">Ana Reyes</a>
                                            </div>
                                        </div>
                                        <span
                                            class="badge badge-light rounded-pill bg-light d-inline-flex align-items-center fs-13 fw-medium mb-0">
                                            Community Health
                                        </span>
                                    </div>
                                    <h6 class="title mb-2"><a href="#">Maternal Health Support
                                            Program</a></h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="#"
                                            class="btn btn-dark btn-sm d-inline-flex align-items-center">View Project<i
                                                class="isax isax-arrow-right-3 ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /pagination -->
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <p class="pagination-text">Page 1 of 2</p>
                        </div>
                        <div class="col-md-10">
                            <ul class="pagination lms-page justify-content-center justify-content-md-end mt-2 mt-md-0">
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
    </section>
    <!-- /Course -->
@endsection
