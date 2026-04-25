@extends('layouts.app')
@section('content')

<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">About Our Team</h1>

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
        <h2 class="section-title">Meet Our Team</h2>
        <p class="text-muted">
            Dedicated professionals committed to making impact and driving change in our communities.
        </p>
    </div>
    <!-- Leadership -->
    <div class="mb-5">
        <h4 class="mb-4">Leadership</h4>

        <div class="row g-4">


            @forelse ($teamMembers as $team)
            <div class="col-md-6 col-lg-4 h-100">
                <div class="team-card leader-card p-3">
                    <img src="{{asset($team->avatar_url ?? NO_IMAGE)}}" class="team-img mb-3" alt="belawu">

                    <div class="team-name">{{$team->name}}</div>
                    <div class="team-role">{{ $team->getMeta('designation') ?? 'Unknown'}}</div>

                    <p class="small text-muted mt-2">
                        {{ $team->getMeta('biography') }}
                    </p>

                    <div class="social-icons">
                        @if ($team->getMeta('facebook'))
                        <a href="{{ $team->getMeta('facebook') }}" target="_blank" class="text-muted"
                            style="font-size: 20px; color: #3b5998; transition: color 0.3s;">
                            <i class="fab fa-facebook"></i>
                        </a>
                        @endif
                        @if ($team->getMeta('twitter'))
                        <a href="{{ $team->getMeta('twitter') }}" target="_blank" class="text-muted"
                            style="font-size: 20px; color: #1da1f2; transition: color 0.3s;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        @endif
                        @if ($team->getMeta('instagram'))
                        <a href="{{ $team->getMeta('instagram') }}" target="_blank" class="text-muted"
                            style="font-size: 20px; color: #e4405f; transition: color 0.3s;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        @endif
                        @if ($team->getMeta('tiktok'))
                        <a href="{{ $team->getMeta('tiktok') }}" target="_blank" class="text-muted"
                            style="font-size: 20px; color: #000000; transition: color 0.3s;">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        @endif
                    </div>

                </div>
            </div>
            @empty

            @endforelse


        </div>
    </div>
</div>
@endsection