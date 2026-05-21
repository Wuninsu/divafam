<header class="header-two">
    <div class="container">
        <div class="header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <i class="isax isax-menu"></i>
                    </span>
                </a>
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <img src="{{asset(setup_data('logo') ?? NO_IMAGE)}}" alt="DivaFam Logo" class="brand-logo">
                    <div class="d-flex flex-column align-items-start">
                        <div class="brand-name me-2">Diva Fam</div>
                        <div class="brand-tagline">Hope for the marginalized</div>
                    </div>
                </a>
            </div>

            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <div class="brand-name">Diva Fam</div>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="{{ request()->routeIs('guest.home','guest.home.redirect') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('guest.home') }}">Home</a>
                    </li>

                    <li class="has-submenu {{ request()->routeIs('guest.about','guest.about.team','guest.about.impact','guest.governance') ? 'active' : '' }}">

                        <a href="#">
                            About <i class="fas fa-chevron-down"></i>
                        </a>

                        <ul class="submenu">

                            <li class="{{ request()->routeIs('guest.about') ? 'active' : '' }}">
                                <a href="{{ route('guest.about') }}">
                                    About Divafam
                                </a>
                            </li>

                            <li class="{{ request()->routeIs('guest.about.team') ? 'active' : '' }}">
                                <a href="{{ route('guest.about.team') }}">
                                    Leadership
                                </a>
                            </li>

                            <li class="{{ request()->routeIs('guest.about.impact') ? 'active' : '' }}">
                                <a href="{{ route('guest.about.impact') }}">
                                    Impact & Reports
                                </a>
                            </li>

                            <li class="{{ request()->routeIs('guest.governance') ? 'active' : '' }}">
                                <a href="{{ route('guest.governance') }}">
                                    Governance & Compliance
                                </a>
                            </li>

                        </ul>

                    </li>
                    {{-- Programs --}}
                    <li class="{{ request()->routeIs('guest.programs*') ? 'active' : '' }}">
                        <a href="{{ route('guest.programs.index') }}">Programs</a>
                    </li>

                    {{-- Projects --}}
                    <li class="{{ request()->routeIs('guest.projects*') ? 'active' : '' }}">
                        <a href="{{ route('guest.projects.index') }}">Projects</a>
                    </li>

                    {{-- Blog / News --}}
                    <li class="{{ request()->routeIs('guest.news*') ? 'active' : '' }}">
                        <a href="{{ route('guest.news.index') }}">Blog</a>
                    </li>

                    {{-- Get Involved --}}
                    <li
                        class="has-submenu {{ request()->routeIs('guest.donate','guest.donors','guest.parters','guest.testimonials') ? 'active' : '' }}">
                        <a href="#">Get Involved <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li class="{{ request()->routeIs('guest.donate') ? 'active' : '' }}">
                                <a href="{{ route('guest.donate') }}">Sponsor A Project</a>
                            </li>
                            <li class="{{ request()->routeIs('guest.parters') ? 'active' : '' }}">
                                <a href="{{route('guest.parters')}}">Our Partners</a>
                            </li>
                            <li class="{{ request()->routeIs('guest.testimonials') ? 'active' : '' }}">
                                <a href="{{ route('guest.testimonials') }}">Impact Stories</a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ request()->routeIs('guest.gallery') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('guest.gallery') }}">Gallery</a>
                    </li>
                    <li class="{{ request()->routeIs('guest.contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('guest.contact') }}">Contact</a>
                    </li>

                </ul>

                <div class="menu-login mt-4">
                    <button class="theme-toggle w-100 mb-2" aria-label="Toggle theme">
                        <i class="isax isax-sun-15"></i>
                    </button>

                    <a href="{{ route('guest.donate') }}" class="btn-primary donate-btn w-100">
                        <i class="fas fa-donate me-1"></i> Sponsor A Project
                    </a>
                </div>
            </div>
            <div class="header-btn d-flex align-items-center">
                <button class="theme-toggle" aria-label="Toggle theme">
                    <i class="isax isax-sun-15"></i>
                </button>

                <a href="{{ route('guest.donate') }}" class="btn-primary donate-btn">
                    <i class="fas fa-donate me-1"></i> Sponsor A Project
                </a>
            </div>
        </div>
    </div>
</header>