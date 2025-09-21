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
                            <li class="breadcrumb-item"><a href="/news">News</a></li>
                            <li class="breadcrumb-item active" aria-current="page">News Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- /Breadcrumb -->

    <!-- blog -->
    <div class="blog-sec blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Sidebar -->
                {{-- <div class="col-lg-4 sidebar-left mt-4 mt-lg-0 theiaStickySidebar">
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
                            <h6><a href="javascript:void(0);"><i
                                        class="isax isax-arrow-right-3 fs-14 text-secondary fw-bold"></i> Farming<span
                                        class="float-end">06</span></a></h6>
                            <h6><a href="javascript:void(0);"><i
                                        class="isax isax-arrow-right-3 fs-14 text-secondary fw-bold"></i> Education<span
                                        class="float-end">03</span></a></h6>
                            <h6><a href="javascript:void(0);"><i
                                        class="isax isax-arrow-right-3 fs-14 text-secondary fw-bold"></i> Clean Water<span
                                        class="float-end">05</span></a></h6>
                            <h6><a href="javascript:void(0);"><i
                                        class="isax isax-arrow-right-3 fs-14 text-secondary fw-bold"></i> Climate
                                    Action<span class="float-end">02</span></a></h6>
                        </div>
                    </div>
                    <!-- /Categories -->

                    <!-- Recent Posts -->
                    <div class="blog-widget">
                        <h5 class="fs-18 mb-3">Recent Blogs</h5>
                        <ul class="recent-blog-list">
                            <li>
                                <div class="post-thumb">
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/blog/recent-blog-1.jpg" alt="Img">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h6 class="text-truncate line-clamb-2">
                                        <a href="#">Empowering Women Through Farming</a>
                                    </h6>
                                    <p><img class="img-fluid me-1" src="assets/img/icons/calendar2.svg" alt="Img">20
                                        Jul 2024</p>
                                </div>
                            </li>
                            <li>
                                <div class="post-thumb">
                                    <a href="#">
                                        <img class="img-fluid" src="assets/img/blog/recent-blog-2.jpg" alt="Img">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h6 class="text-truncate line-clamb-2">
                                        <a href="#">Boreholes Bringing Hope to Villages</a>
                                    </h6>
                                    <p><img class="img-fluid me-1" src="assets/img/icons/calendar2.svg" alt="Img">05
                                        Jun 2024</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /Recent Posts -->
                </div> --}}
                <!-- /Blog Sidebar -->

                <!-- Blog Content -->
                <div class="col-lg-10">
                    <img class="img-fluid rounded-2" src="{{asset('assets/diva/img-8.jpg')}}" alt="no-image">
                    <div class="blog-info my-3">
                        <ul class="d-flex align-items-center flex-wrap gap-2">
                            <li>
                                <div class="avatar avatar-sm rounded-pill me-2 flex-shrink-0">
                                    <span>
                                        <a href="#"><img class="rounded-pill w-auto"
                                                src="assets/diva/img-8.jpg" alt="img"></a>
                                    </span>
                                </div>
                                <p><a href="#">Abena Owusu</a></p>
                            </li>
                            <li>
                                <img class="me-1" src="assets/img/icons/calendar.svg" alt="img">
                                <p>12 Aug 2024</p>
                            </li>
                            <li>
                                <img class="me-1" src="assets/img/icons/tag.svg" alt="img">
                                <p>Farming, Empowerment</p>
                            </li>
                        </ul>
                    </div>

                    <h5 class="mb-3">Growing Futures: How Divafam is Empowering Youth Through Farming</h5>
                    <p>At Divafam, we believe farming is more than just planting crops — it is planting hope. In many rural
                        communities across Ghana, young people and women face limited opportunities for sustainable
                        livelihoods. Through hands-on training in vegetable farming, we are transforming lives by equipping
                        them with practical skills, tools, and resources to create self-sustaining futures.</p>

                    <div class="p-3 my-4 bg-light-900 blog-blockquote">
                        <p class="text-gray-9">“When a young person learns to farm, they don’t just feed their family — they
                            feed their future.”</p>
                    </div>

                    <p>Our training programs combine modern agricultural techniques with indigenous knowledge. Participants
                        learn about soil preparation, irrigation, organic fertilizer use, and climate-smart practices that
                        safeguard the environment. Beyond farming, Divafam also supports community health initiatives,
                        education, and clean water projects through boreholes.</p>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <img class="img-fluid rounded-2" src="assets/img/blog/divafam-training.jpg" alt="img">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <img class="img-fluid rounded-2" src="assets/img/blog/divafam-harvest.jpg" alt="img">
                        </div>
                    </div>

                    <p>Since 2022, Divafam has trained over 500 women and youth in sustainable vegetable farming. Many
                        graduates now run thriving gardens that not only provide food security but also generate income. Our
                        community-driven model ensures that small acts of kindness and support grow into powerful movements
                        that impact generations.</p>

                    <p>With continued support from donors and volunteers, we are determined to nurture stronger, greener,
                        and more equitable communities across Ghana. Together, we cultivate not just crops, but futures.</p>

                    <div
                        class="p-3 text-center text-md-start p-lg-4 my-4 bg-light-900 rounded-2 d-md-flex align-items-center">
                        <div class="avatar flex-shrink-0 blog-avatar">
                            <a href="author-details.html"><img class="img-fluid rounded-pill"
                                    src="assets/img/user/local-author-1.jpg" alt="img"></a>
                        </div>
                        <div class="ps-md-3 mt-2 mt-md-0">
                            <span class="text-secondary mb-1">Author</span>
                            <h5 class="mb-1 fs-18"><a href="author-details.html">Abena Owusu</a></h5>
                            <p>Abena is a youth leader and agricultural trainer with Divafam. She is passionate about
                                empowering young women through sustainable farming and climate education at the grassroots
                                level.</p>
                        </div>
                    </div>
                </div>
                <!-- /Blog Content -->
            </div>
        </div>
    </div>

    <!-- blog -->

    <!-- Footer -->
@endsection
