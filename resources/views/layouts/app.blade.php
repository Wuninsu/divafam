<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-seo::meta />

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">

    <!-- Theme Settings Js -->
    <script src="assets/js/theme-script.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/plugins/swiper/css/swiper-bundle.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="assets/plugins/slick/slick-theme.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <!-- Aos CSS -->
    <link rel="stylesheet" href="assets/plugins/aos/aos.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="assets/plugins/tabler-icons/tabler-icons.css">

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="assets/css/iconsax.css">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <header class="header-one">
            <div class="container">
                <div class="header-nav">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                                <i class="isax isax-menu"></i>
                            </span>
                        </a>
                        <div class="navbar-logo">
                            <a class="logo-white header-logo" href="/">
                                <img src="assets/img/logo-white.svg" class="logo" alt="Logo">
                            </a>
                            <a class="logo-dark header-logo" href="/">
                                <img src="assets/img/logo-white.svg" class="logo" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="/" class="menu-logo">
                                <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li><a class="nav-link" href="/">Home</a></li>
                            <li><a class="nav-link" href="#">About</a></li>
                            <li><a class="nav-link" href="#">Programs</a></li>
                            <li><a class="nav-link" href="#">Blog</a></li>
                            <li><a class="nav-link" href="#">Events</a></li>
                            <li><a class="nav-link" href="#">Gallery</a></li>
                            <li><a class="nav-link" href="#">Contact</a></li>
                            <li class="has-submenu">
                                <a href="#">Courses <i class="fas fa-chevron-down"></i></a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                        <a href="javascript:void(0);">Courses</a>
                                        <ul class="submenu">
                                            <li><a href="course-grid.html">Course Grid</a></li>
                                            <li><a href="course-list.html">Course List</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="javascript:void(0);">Course Category</a>
                                        <ul class="submenu">
                                            <li><a href="course-category.html">Course Category</a></li>
                                            <li><a href="course-category-2.html">Course Category 2</a></li>
                                            <li><a href="course-category-3.html">Course Category 3</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="javascript:void(0);">Course Details</a>
                                        <ul class="submenu">
                                            <li><a href="course-details.html">Course Details</a></li>
                                            <li><a href="course-details-2.html">Course Details 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="course-resume.html">Course Resume</a></li>
                                    <li><a href="course-watch.html">Course Watch</a></li>
                                    <li><a href="cart.html">Course Cart</a></li>
                                    <li><a href="checkout.html">Course Checkout</a></li>
                                    <li><a href="add-course.html">Add New Course</a></li>
                                </ul>
                            </li>
                        </ul>

                        <div class="menu-dropdown">
                            <div class="dropdown flag-dropdown mb-2">
                                <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
                                </a>
                                <ul class="dropdown-menu p-2 mt-2">
                                    <li>
                                        <a class="dropdown-item rounded d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img src="assets/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item rounded d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img src="assets/img/flags/arab-flag.svg" class="me-2"
                                                alt="flag">ARA
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item rounded d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img src="assets/img/flags/france-flag.svg" class="me-2"
                                                alt="flag">FRE
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Mobile Dropdown Only -->
                            <div class="dropdown mb-2 d-block d-md-none">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false" id="mobile-theme-toggle-title">
                                    Light
                                </a>
                                <ul class="dropdown-menu p-2 mt-2">
                                    <li><a class="dropdown-item rounded" id="mobile-light-mode-toggle"
                                            href="javascript:void(0);">Light</a></li>
                                    <li><a class="dropdown-item rounded" id="mobile-dark-mode-toggle"
                                            href="javascript:void(0);">Dark</a></li>
                                </ul>
                            </div>



                        </div>
                        <div class="menu-login">
                            <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">
                                <i class="fas fa-sign-in-alt me-2"></i> Sign In
                            </a>
                            <a href="#" class="btn btn-secondary w-100 me-0">
                                <i class="fas fa-donate me-2"></i> Donate
                            </a>
                        </div>
                    </div>
                    <div class="header-btn d-flex align-items-center">
                        <div class="dropdown flag-dropdown icon-btn">
                            <a href="javascript:void(0);" class="d-inline-flex align-items-center"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/img/flags/us-flag.svg" alt="flag">
                            </a>
                            <ul class="dropdown-menu p-2 mt-2">
                                <li>
                                    <a class="dropdown-item rounded d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img src="assets/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img src="assets/img/flags/arab-flag.svg" class="me-2" alt="flag">ARA
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img src="assets/img/flags/france-flag.svg" class="me-2" alt="flag">FRE
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="icon-btn">
                            <a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle activate">
                                <i class="isax isax-sun-15"></i>
                            </a>
                            <a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle">
                                <i class="isax isax-moon"></i>
                            </a>
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-primary d-inline-flex align-items-center me-2">
                            <i class="fas fa-sign-in-alt me-2"></i> Sign In
                        </a>
                        <a href="#" class="btn btn-secondary me-0">
                            <i class="fas fa-donate me-2"></i> Donate
                        </a>

                    </div>
                </div>
            </div>
        </header>
        <!-- /Header -->

        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer footer-one">
            <div class="footer-top">
                <div class="container">
                    <div class="row row-gap-4">
                        <div class="col-lg-4">
                            <div class="footer-about">
                                <div class="footer-logo">
                                    <img src="assets/img/logo-white.svg" alt="">
                                </div>
                                <p>Platform designed to help organizations, educators, and learners manage, deliver, and
                                    track learning and training activities.</p>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="me-2"><img src="assets/img/icon/appstore.svg"
                                            alt=""></a>
                                    <a href="#"><img src="assets/img/icon/googleplay.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row row-gap-4">
                                <div class="col-lg-4 col-md-4">
                                    <div class="footer-widget footer-menu">
                                        <h5 class="footer-title">Support</h5>
                                        <ul>
                                            <li><a href="course-grid.html">Education</a></li>
                                            <li><a href="add-course.html">Enroll Course</a></li>
                                            <li><a href="javscript:void(0);">Orders</a></li>
                                            <li><a href="pricing-plan.html">Payments</a></li>
                                            <li><a href="blog-grid.html">Blogs</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="footer-widget footer-menu">
                                        <h5 class="footer-title">About</h5>
                                        <ul>
                                            <li><a href="course-category.html">Categories</a></li>
                                            <li><a href="course-list.html">Courses</a></li>
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="contact-us.html">Contacts</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="footer-widget footer-menu">
                                        <h5 class="footer-title">Useful Links</h5>
                                        <ul>
                                            <li><a href="javascript:void(0);">Our values</a></li>
                                            <li><a href="javascript:void(0);">Our advisory board</a></li>
                                            <li><a href="javascript:void(0);">Our partners</a></li>
                                            <li><a href="javascript:void(0);">Become a partner</a></li>
                                            <li><a href="javascript:void(0);">Work at Future Learn</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="footer-widget footer-contact">
                                <h5 class="footer-title">Subscribe Newsletter</h5>
                                <div class="footer-newsletter">
                                    <p>Sign up to get updates & news.</p>
                                    <form action="javascript:void(0);">
                                        <div class="subscribe-form">
                                            <span>
                                                <i class="isax isax-message-text"></i>
                                            </span>
                                            <input type="email" class="form-control" placeholder="Email Address">
                                        </div>
                                        <button type="submit"
                                            class="btn btn-secondary btn-xl w-100">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row row-gap-2">
                        <div class="col-lg-5">
                            <div class="text-center text-lg-start">
                                <p>Copyright 2025 © <span class="text-secondary">DreamsLMS</span>. All right reserved.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ul class="d-flex align-items-center justify-content-center footer-link">
                                <li><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <div class="social-icon">
                                <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->
    </div>
    <!-- /Main Wrapper -->


    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <!-- Slick Slider -->
    <script src="assets/plugins/slick/slick.js"></script>

    <!-- Swiper Slider -->
    <script src="assets/plugins/swiper/js/swiper-bundle.min.js"></script>

    <!-- Counterup JS -->
    <script src="assets/js/counter.js"></script>

    <!-- AOS -->
    <script src="assets/plugins/aos/aos.js"></script>

    <!-- Fancybox JS -->
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <script>
        (function() {
            const darkMode = localStorage.getItem("darkMode");
            const themeClass = darkMode === "enabled" ? "dark-mode" : "light-mode";

            // Apply the theme class to the document immediately
            document.documentElement.className = themeClass;

            // Wait for DOMContentLoaded to set up event listeners
            document.addEventListener("DOMContentLoaded", () => {
                // Mobile Toggle Elements
                const mobileDarkModeToggle = document.getElementById("mobile-dark-mode-toggle");
                const mobileLightModeToggle = document.getElementById("mobile-light-mode-toggle");
                const mobileThemeToggleTitle = document.getElementById("mobile-theme-toggle-title");

                // Toggle Theme function
                const toggleMode = (isDarkMode) => {
                    document.documentElement.classList.toggle("dark-mode", isDarkMode);
                    localStorage.setItem(
                        "darkMode",
                        isDarkMode ? "enabled" : "disabled"
                    );
                    updateToggleButtons(isDarkMode);
                };

                // Update the theme toggle buttons
                const updateToggleButtons = (isDarkMode) => {
                    if (isDarkMode) {
                        mobileDarkModeToggle.classList.remove("activate");
                        mobileLightModeToggle.classList.add("activate");
                        mobileThemeToggleTitle.textContent = "Dark"; // Update mobile title
                    } else {
                        mobileLightModeToggle.classList.remove("activate");
                        mobileDarkModeToggle.classList.add("activate");
                        mobileThemeToggleTitle.textContent = "Light"; // Update mobile title
                    }
                };

                // Initial activation based on current theme
                updateToggleButtons(themeClass === "dark-mode");

                // Add event listeners if elements are present
                if (mobileDarkModeToggle && mobileLightModeToggle) {
                    mobileDarkModeToggle.addEventListener("click", () => toggleMode(true));
                    mobileLightModeToggle.addEventListener("click", () => toggleMode(false));
                }
            });
        })();
    </script>
</body>

</html>
