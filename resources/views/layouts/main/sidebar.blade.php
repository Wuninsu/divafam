<nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="home"></span></span>
                                <span class="nav-link-text">Dashboard</span>
                            </div>
                        </a>
                    </div>
                </li>

                {{-- Content Management --}}
                <li class="nav-item">
                    {{-- Categories --}}
                    <div class="nav-item-wrapper">
                        <a class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }}"
                            href="{{ route('category.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="layers"></span></span>
                                <!-- Updated icon -->
                                <span class="nav-link-text">Categories</span>
                            </div>
                        </a>
                    </div>

                    {{-- Tags --}}
                    <div class="nav-item-wrapper">
                        <a class="nav-link {{ request()->routeIs('tags.*') ? 'active' : '' }}"
                            href="{{ route('tags.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="tag"></span></span>
                                <!-- Updated icon -->
                                <span class="nav-link-text">Tags</span>
                            </div>
                        </a>
                    </div>
                    {{-- Posts --}}
                    <div class="nav-item-wrapper">
                        <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                            href="{{ route('posts.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="file-text"></span></span>
                                <span class="nav-link-text">Posts</span>
                            </div>
                        </a>
                    </div>

                    {{-- Media --}}
                    <div class="nav-item-wrapper">
                        <a class="nav-link {{ request()->routeIs('media.*') ? 'active' : '' }}"
                            href="{{ route('media.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="image"></span></span>
                                <span class="nav-link-text">Media</span>
                            </div>
                        </a>
                    </div>

                    {{-- Pages --}}
                    @php
                    $isPagesActive = request()->routeIs(['pages.*']);
                    @endphp
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1 {{ $isPagesActive ? '' : 'collapsed'}}"
                            href="#nv-pages" data-bs-toggle="collapse"
                            aria-expanded="{{$isPagesActive ? 'true' : 'false'}}" aria-controls="nv-pages">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"><span
                                        class="fas fa-caret-{{$isPagesActive ? 'down' : 'right'}}"></span>
                                </div>
                                <span class="nav-link-icon"><span data-feather="book-open"></span></span>
                                <span class="nav-link-text">Manage Pages</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent {{$isPagesActive ? 'show' : ''}}" id="nv-pages"
                                data-bs-parent="#navbarVerticalNav">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('pages.index', 'pages.create', 'pages.edit') ? 'active' : '' }}"
                                        href="{{ route('pages.index') }}">
                                        Pages
                                    </a>
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('pages.home') ? 'active' : '' }}"
                                        href="{{ route('pages.home') }}">Home</a>
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('pages.faq') ? 'active' : '' }}"
                                        href="{{ route('pages.faq') }}">FAQ's</a>
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('pages.inquiry') ? 'active' : '' }}"
                                        href="{{ route('pages.inquiry') }}">Inquiries</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                {{-- Projects & Trainings --}}
                <li class="nav-item">
                    {{-- Projects --}}
                    {{-- <div class="nav-item-wrapper">
                        <a class="nav-link {{ request()->routeIs('programs.*') ? 'active' : '' }}"
                            href="{{ route('programs.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="briefcase"></span></span>
                                <span class="nav-link-text">Projects</span>
                            </div>
                        </a>
                    </div> --}}

                    @php
                    $isProgramActive = request()->routeIs(['programs.*', 'beneficiaries.*', 'communities.*']);
                    @endphp
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1 {{ $isProgramActive ? '' : 'collapsed'}}"
                            href="#nv-programs" data-bs-toggle="collapse"
                            aria-expanded="{{$isProgramActive ? 'true' : 'false'}}" aria-controls="nv-programs">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"><span
                                        class="fas fa-caret-{{$isProgramActive ? 'down' : 'right'}}"></span>
                                </div>
                                <span class="nav-link-icon"><span data-feather="briefcase"></span></span>
                                <span class="nav-link-text">Projects</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent {{$isProgramActive ? 'show' : ''}}" id="nv-programs"
                                data-bs-parent="#navbarVerticalNav">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('programs.index','programs.create','programs.edit') ? 'active' : '' }}"
                                        href="{{ route('programs.index') }}">
                                        All Projects
                                    </a>
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('communities.index') ? 'active' : '' }}"
                                        href="{{ route('communities.index') }}">Communities</a>
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('beneficiaries.index*') ? 'active' : '' }}"
                                        href="{{ route('beneficiaries.index') }}">Beneficiaries</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Trainings --}}
                    {{-- <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#nv-trainings" data-bs-toggle="collapse"
                            aria-expanded="false" aria-controls="nv-trainings">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"><span class="fas fa-caret-right"></span>
                                </div>
                                <span class="nav-link-icon"><span data-feather="layers"></span></span>
                                <span class="nav-link-text">Trainings</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" id="nv-trainings" data-bs-parent="#navbarVerticalNav">
                                <li class="nav-item"><a class="nav-link" href="{{ route('trainings.index') }}">All
                                        Trainings</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('participants.index') }}">Participants</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('communities.index') }}">Communities</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </li>

                {{-- Events --}}
                {{-- <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link" href="{{ route('events.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="calendar"></span></span>
                                <span class="nav-link-text">Events</span>
                            </div>
                        </a>
                    </div>
                </li> --}}


                {{-- Funding --}}
                @php
                $isFundingActive = request()->routeIs(['donors.*', 'donations.*', 'sponsorships.*']);
                @endphp
                <div class="nav-item-wrapper">
                    <a class="nav-link dropdown-indicator label-1 {{ $isFundingActive ? '' : 'collapsed'}}"
                        href="#nv-funding" data-bs-toggle="collapse"
                        aria-expanded="{{ $isFundingActive ? 'true' : 'false' }}" aria-controls="nv-funding">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon-wrapper">
                                <span class="fas fa-caret-{{ $isFundingActive ? 'down' : 'right' }}"></span>
                            </div>
                            <span class="nav-link-icon"><i class="fa fa-hand-holding-usd"></i></span>
                            <span class="nav-link-text">Funding</span>
                        </div>
                    </a>
                    <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent {{ $isFundingActive ? 'show' : '' }}" id="nv-funding"
                            data-bs-parent="#navbarVerticalNav">

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('donors.*') ? 'active' : '' }}"
                                    href="{{ route('donors.index') }}">
                                    <i class="fa fa-hand-holding-heart me-2"></i> Donors
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('donations.*') ? 'active' : '' }}"
                                    href="{{ route('donations.index') }}">
                                    <i class="fa fa-donate me-2"></i> Donations
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('sponsorships.*') ? 'active' : '' }}"
                                    href="{{ route('sponsorships.index') }}">
                                    <i class="fa fa-handshake me-2"></i> Sponsorships
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                {{-- Users, Roles & Permissions --}}
                @php
                $isRolesActive = request()->routeIs(['users.*','permissions.*', 'roles.*']);
                @endphp
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1 {{ $isRolesActive ? '' : 'collapsed'}}"
                            href="#nv-users" data-bs-toggle="collapse"
                            aria-expanded="{{$isRolesActive ? 'true' : 'false'}}" aria-controls="nv-users">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"><span
                                        class="fas fa-caret-{{$isRolesActive ? 'down' : 'right'}}"></span>
                                </div>
                                <span class="nav-link-icon"><span data-feather="users"></span></span>
                                <span class="nav-link-text">Users</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent {{$isRolesActive ? 'show' : ''}}" id="nv-users"
                                data-bs-parent="#navbarVerticalNav">
                                @canany(['manage roles', 'manage permissions'], )
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}"
                                        href="{{ route('roles.index') }}">Roles</a>
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}"
                                        href="{{ route('permissions.index') }}">Permissions</a>
                                </li>
                                @endcanany

                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                                        href="{{ route('users.index') }}">All Users</a>
                                </li>

                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('users.team') ? 'active' : '' }}"
                                        href="{{ route('users.team') }}">Team Members</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>

                {{-- Settings --}}
                <li class="nav-item">
                    <p class="navbar-vertical-label">System</p>
                    <hr class="navbar-vertical-line" />

                    <div class="nav-item-wrapper">
                        <a class="nav-link {{ request()->routeIs('settings.index') ? 'active' : '' }}"
                            href="{{ route('settings.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="settings"></span></span>
                                <span class="nav-link-text">Settings</span>
                            </div>
                        </a>
                    </div>

                    <div class="nav-item-wrapper">
                        <a class="nav-link {{ request()->routeIs('restore.index') ? 'active' : '' }}"
                            href="{{ route('restore.index') }}">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="refresh-ccw"></span></span>
                                <!-- 'refresh-ccw' is the feather icon for restore -->
                                <span class="nav-link-text">Restore</span>
                            </div>
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer"><button
            class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span
                class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span
                class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
</nav>
<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="display:none;">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                    class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="#">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="{{asset(setup_data('logo') ?? NO_IMAGE)}}"
                            alt="Divafam" width="27" />
                        {{-- <h5 class="logo-text ms-2 d-none d-sm-block">Divafam</h5> --}}
                    </div>
                </div>
            </a>
        </div>
        <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}'
            style="width:25rem;">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                    class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search"
                    placeholder="Search..." aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
            </form>
            <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
                data-bs-dismiss="search"><button class="btn btn-link p-0" aria-label="Close"></button></div>
            <div class="dropdown-menu border start-0 py-0 overflow-hidden w-100">
                <div class="scrollbar-overlay" style="max-height: 30rem;">
                    <div class="list pb-3">
                        <h6 class="dropdown-header text-body-highlight fs-10 py-2">24 <span
                                class="text-body-quaternary">results</span></h6>
                        <hr class="my-0" />
                        <h6
                            class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                            Recently Searched </h6>
                        <div class="py-2"><a class="dropdown-item"
                                href="static/apps/e-commerce/landing/product-details.html">
                                <div class="d-flex align-items-center">
                                    <div class="fw-normal text-body-highlight title"><span
                                            class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span>
                                        Project 1</div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="static/apps/e-commerce/landing/product-details.html">
                                <div class="d-flex align-items-center">
                                    <div class="fw-normal text-body-highlight title"> <span
                                            class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span>
                                        Project 2″</div>
                                </div>
                            </a>
                        </div>


                    </div>
                    <div class="text-center">
                        <p class="fallback fw-bold fs-7 d-none">No Result Found.</p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2"><input
                        class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                        style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                        style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label></div>
            </li>
            <li class="nav-item d-lg-none"><a class="nav-link" href="#" data-bs-toggle="modal"
                    data-bs-target="#searchBoxModal"><span class="d-block" style="height:20px;width:20px;"><span
                            data-feather="search" style="height:19px;width:19px;margin-bottom: 2px;"></span></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" style="min-width: 2.25rem" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span class="d-block"
                        style="height:20px;width:20px;"><span data-feather="bell"
                            style="height:20px;width:20px;"></span></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-body-emphasis mb-0">Notifications</h5><button
                                    class="btn btn-link p-0 fs-9 fw-normal" type="button">Mark all as
                                    read</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="scrollbar-overlay" style="height: 27rem;">
                                <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                                    <div class="d-flex align-items-center justify-content-between position-relative">
                                        <div class="d-flex">
                                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                                    src="static/assets/img/team/40x40/30.webp" alt="" /></div>
                                            <div class="flex-1 me-sm-3">
                                                <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                                                <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                                        class='me-1 fs-10'>💬</span>Mentioned you in a
                                                    comment.<span
                                                        class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span>
                                                </p>
                                                <p class="text-body-secondary fs-9 mb-0"><span
                                                        class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM
                                                    </span>August 7,2021</p>
                                            </div>
                                        </div>
                                        <div class="dropdown notification-dropdown"><button
                                                class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><span
                                                    class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                            <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as
                                                    unread</a></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer p-0 border-top border-translucent border-0">
                            <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a
                                    class="fw-bolder" href="static/pages/notifications.html">Notification
                                    history</a></div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <img class="rounded-circle " src="{{asset(auth()->user()->avatar_url ?? NO_IMAGE)}}" alt="" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">

                        <div class="overflow-auto scrollbar" style="height: 6rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3 d-block" href="{{route('profile.index')}}">
                                        <span class="me-2 text-body align-bottom" data-feather="user"></span>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3 d-block" href="{{route('dashboard')}}">
                                        <span class="me-2 text-body align-bottom"
                                            data-feather="pie-chart"></span>Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3 d-block" href="#!">
                                        <span class="me-2 text-body align-bottom"
                                            data-feather="settings"></span>Settings
                                        &amp; Privacy
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top border-translucent">
                            <div class="p-3">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-phoenix-secondary d-flex flex-center w-100">
                                        <span class="me-2" data-feather="log-out"> </span>Sign out
                                    </button>
                                </form>
                            </div>
                            <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a
                                    class="text-body-quaternary me-1" href="#!">Privacy policy</a>&bull;<a
                                    class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a
                                    class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    var navbarTopShape = window.config.config.phoenixNavbarTopShape;
        var navbarPosition = window.config.config.phoenixNavbarPosition;
        var body = document.querySelector('body');
        var navbarDefault = document.querySelector('#navbarDefault');
        var navbarTop = document.querySelector('#navbarTop');
        var topNavSlim = document.querySelector('#topNavSlim');
        var navbarTopSlim = document.querySelector('#navbarTopSlim');
        var navbarCombo = document.querySelector('#navbarCombo');
        var navbarComboSlim = document.querySelector('#navbarComboSlim');
        var dualNav = document.querySelector('#dualNav');

        var documentElement = document.documentElement;
        var navbarVertical = document.querySelector('.navbar-vertical');

        if (navbarPosition === 'dual-nav') {
          topNavSlim?.remove();
          navbarTop?.remove();
          navbarTopSlim?.remove();
          navbarCombo?.remove();
          navbarComboSlim?.remove();
          navbarDefault?.remove();
          navbarVertical?.remove();
          dualNav.removeAttribute('style');
          document.documentElement.setAttribute('data-navigation-type', 'dual');

        } else if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
          navbarDefault?.remove();
          navbarTop?.remove();
          navbarTopSlim?.remove();
          navbarCombo?.remove();
          navbarComboSlim?.remove();
          topNavSlim.style.display = 'block';
          navbarVertical.style.display = 'inline-block';
          document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');

        } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
          navbarDefault?.remove();
          navbarVertical?.remove();
          navbarTop?.remove();
          topNavSlim?.remove();
          navbarCombo?.remove();
          navbarComboSlim?.remove();
          dualNav?.remove();
          navbarTopSlim.removeAttribute('style');
          document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
          navbarDefault?.remove();
          navbarTop?.remove();
          topNavSlim?.remove();
          navbarCombo?.remove();
          navbarTopSlim?.remove();
          dualNav?.remove();
          navbarComboSlim.removeAttribute('style');
          navbarVertical.removeAttribute('style');
          document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');
        } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
          navbarDefault?.remove();
          topNavSlim?.remove();
          navbarVertical?.remove();
          navbarTopSlim?.remove();
          navbarCombo?.remove();
          navbarComboSlim?.remove();
          dualNav?.remove();
          navbarTop.removeAttribute('style');
          document.documentElement.setAttribute('data-navigation-type', 'horizontal');
        } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
          topNavSlim?.remove();
          navbarTop?.remove();
          navbarTopSlim?.remove();
          navbarDefault?.remove();
          navbarComboSlim?.remove();
          dualNav?.remove();
          navbarCombo.removeAttribute('style');
          navbarVertical.removeAttribute('style');
          document.documentElement.setAttribute('data-navigation-type', 'combo');
        } else {
          topNavSlim?.remove();
          navbarTop?.remove();
          navbarTopSlim?.remove();
          navbarCombo?.remove();
          navbarComboSlim?.remove();
          dualNav?.remove();
          navbarDefault.removeAttribute('style');
          navbarVertical.removeAttribute('style');
        }

        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
          navbarTop.setAttribute('data-navbar-appearance', 'darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVerticalStyle === 'darker') {
          navbarVertical.setAttribute('data-navbar-appearance', 'darker');
        }
</script>