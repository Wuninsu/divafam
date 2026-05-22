@extends('layouts.app')

@section('content')

<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">Leadership & Governance</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Our Team
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">

        <h2 class="section-title">Meet Our Leadership Team</h2>

        <p class="text-muted mx-auto" style="max-width: 760px;">
            Our leadership team brings together expertise in climate adaptation,
            agriculture, rural livelihoods, finance, governance, and donor-funded
            program implementation across Ghana and international development ecosystems.
        </p>
    </div>

    <!-- Executive Leadership -->
    <div class="mb-5">

        <h4 class="section-subtitle mb-4">
            Executive Leadership
        </h4>

        <div class="row g-4">

            @forelse ($teamMembers as $team)

            <div class="col-md-6 col-lg-4">

                <div class="team-card p-3 h-100">

                    <img src="{{ asset($team->avatar_url ?? NO_IMAGE) }}" class="team-img mb-3" alt="{{ $team->name }}">

                    <div class="team-name">
                        {{ $team->name }}
                    </div>

                    <div class="team-role">
                        {{ $team->getMeta('designation') ?? 'Unknown' }}
                    </div>

                    <p class="small text-muted mt-3">
                        {{-- {{ Str::limit(strip_tags($team->getMeta('biography')), 220) }} --}}
                        {{ $team->getMeta('biography') }}
                    </p>

                    <div class="social-icons mt-3 d-flex gap-3">

                        @if ($team->getMeta('facebook'))
                        <a href="{{ $team->getMeta('facebook') }}" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                        @endif

                        @if ($team->getMeta('twitter'))
                        <a href="{{ $team->getMeta('twitter') }}" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        @endif

                        @if ($team->getMeta('instagram'))
                        <a href="{{ $team->getMeta('instagram') }}" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        @endif

                        @if ($team->getMeta('tiktok'))
                        <a href="{{ $team->getMeta('tiktok') }}" target="_blank">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        @endif

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">
                <div class="doc-empty text-center py-5">

                    <div class="empty-icon mb-3">
                        <i class="bi bi-person-x"></i>
                    </div>

                    <h5 class="mb-2">No Team Members Available</h5>

                    <p class="text-muted mb-3">
                        There are currently team members available at the moment.
                    </p>

                </div>
            </div>

            @endforelse

        </div>

    </div>

    <!-- Advisory Board -->
    <div class="mt-5 pt-4 border-top">

        <h4 class="section-subtitle mb-4">
            Advisory Board
        </h4>

        <div class="row g-4">

            @forelse ($boardMembers as $team)

            <div class="col-md-6 col-lg-4">

                <div class="advisor-card p-3 h-100">

                    <img src="{{ asset($team->avatar_url ?? NO_IMAGE) }}" class="team-img mb-3" alt="{{ $team->name }}">

                    <div class="team-name">
                        {{ $team->name }}
                    </div>

                    <div class="team-role">
                        {{ $team->getMeta('designation') ?? 'Unknown' }}
                    </div>

                    <p class="small text-muted mt-3">
                        {{ Str::limit(strip_tags($team->getMeta('biography')), 220) }}
                    </p>

                    <div class="social-icons mt-3 d-flex gap-3">

                        @if ($team->getMeta('facebook'))
                        <a href="{{ $team->getMeta('facebook') }}" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                        @endif

                        @if ($team->getMeta('twitter'))
                        <a href="{{ $team->getMeta('twitter') }}" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        @endif

                        @if ($team->getMeta('instagram'))
                        <a href="{{ $team->getMeta('instagram') }}" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        @endif

                        @if ($team->getMeta('tiktok'))
                        <a href="{{ $team->getMeta('tiktok') }}" target="_blank">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        @endif

                    </div>

                </div>

            </div>

            @empty

            <!-- EMPTY STATE -->
            <div class="col-12">
                <div class="doc-empty text-center py-5">

                    <div class="empty-icon mb-3">
                        <i class="bi bi-person-x"></i>
                    </div>

                    <h5 class="mb-2">No Advisory Board Available</h5>

                    <p class="text-muted mb-3">
                        There are currently no advisory board members available at the moment.
                    </p>

                </div>
            </div>
            @endforelse

        </div>

    </div>

    <!-- Governance -->
    <div class="governance-box mt-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h4 class="mb-3">
                    Governance & Accountability
                </h4>

                <p class="text-muted mb-0">
                    Divafam maintains strong governance systems including annual
                    external audits, safeguarding policies, donor compliance
                    procedures, gender and social inclusion frameworks, and
                    transparent financial management practices.
                </p>

            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <a href="{{ route('guest.governance') }}" class="btn btn-success px-4 py-2">
                    Learn More
                </a>

            </div>

        </div>

    </div>

</div>

@endsection