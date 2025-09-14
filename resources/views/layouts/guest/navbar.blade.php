 <!-- Header Topbar-->
 {{-- <div class="header-topbar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                            <p class="d-flex align-items-center fw-medium fs-14 mb-2 me-3"><i
                                    class="isax isax-location5 me-2"></i>1442 Crosswind Drive Madisonville</p>
                            <p class="d-flex align-items-center fw-medium fs-14 mb-2"><i
                                    class="isax isax-call-calling5 me-2"></i>+1 45887 77874</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                            <div class="dropdown flag-dropdown mb-2 me-3">
                                <a href="javascript:void(0);" class="dropdown-toggle d-inline-flex align-items-center"
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
                            <div class="dropdown mb-2 me-3">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    USD
                                </a>
                                <ul class="dropdown-menu p-2 mt-2">
                                    <li><a class="dropdown-item rounded" href="javascript:void(0);">USD</a></li>
                                    <li><a class="dropdown-item rounded" href="javascript:void(0);">YEN</a></li>
                                    <li><a class="dropdown-item rounded" href="javascript:void(0);">EURO</a></li>
                                </ul>
                            </div>
                            <ul class="social-icon d-flex align-items-center mb-2">
                                <li class="me-2">
                                    <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li class="me-2">
                                    <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li class="me-2">
                                    <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li class="me-2">
                                    <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
 <!-- /Header Topbar-->

 <header class="header-two">
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
                         <img src="assets/img/logo.svg" class="logo" alt="Logo">
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
                     <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('home') }}">Home</a>
                     </li>

                     <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('about') }}">About</a>
                     </li>

                     <li class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
                     </li>

                     <li class="{{ request()->routeIs('news.*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('news.index') }}">News</a>
                     </li>

                     <li class="{{ request()->is('events*') ? 'active' : '' }}">
                         <a class="nav-link" href="#">Events</a>
                     </li>

                     <li class="{{ request()->routeIs('gallery') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                     </li>

                     <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                     </li>

                     <li class="has-submenu active">
                         <a href="#">More <i class="fas fa-chevron-down"></i></a>
                         <ul class="submenu">
                             <li class="active"><a href="{{ route('testimonials') }}">Testimonials</a></li>
                             <li><a href="#">Sponsors</a></li>
                             <li><a href="#">Donations</a></li>
                             <li><a href="#">Our Team</a></li>
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
                                 <a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
                                     <img src="assets/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
                                 </a>
                             </li>
                             <li>
                                 <a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
                                     <img src="assets/img/flags/arab-flag.svg" class="me-2" alt="flag">ARA
                                 </a>
                             </li>
                             <li>
                                 <a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
                                     <img src="assets/img/flags/france-flag.svg" class="me-2" alt="flag">FRE
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
                     <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown"
                         aria-expanded="false">
                         <img src="assets/img/flags/us-flag.svg" alt="flag">
                     </a>
                     <ul class="dropdown-menu p-2 mt-2">
                         <li>
                             <a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
                                 <img src="assets/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
                             </a>
                         </li>
                         <li>
                             <a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
                                 <img src="assets/img/flags/arab-flag.svg" class="me-2" alt="flag">ARA
                             </a>
                         </li>
                         <li>
                             <a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
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
