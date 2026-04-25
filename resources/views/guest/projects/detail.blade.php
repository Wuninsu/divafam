@extends('layouts.app')
@section('content')
<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">Divafam Project</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/">Projects</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Project Detail
                </li>
            </ol>
        </nav>
    </div>
</div>

<section class="container py-4">
    <div class="project-container">

        <!-- HERO -->
        <div class="project-hero">

            <div class="project-summary">
                <h1 class="project-title">{{$project->title}}</h1>

                <p class="project-desc">
                    {{$project->short_description}}
                </p>

                @php
                $badgeClass = match ($project->status) {
                'ongoing' => 'bg-warning',
                'completed' => 'bg-success',
                'draft' => 'bg-muted',
                'archived' => 'bg-dark',
                'postponed' => 'bg-danger',
                default => 'bg-primary',
                };
                @endphp

                <!-- META ROW -->
                <div class="project-meta">
                    <div class="meta-block">
                        <span class="meta-label">Beneficiaries</span>
                        <strong>{{$project->beneficiaries_count}}</strong>
                    </div>

                    <div class="meta-block">
                        <span class="meta-label">Status</span>
                        <span class="badge {{$badgeClass}}">
                            {{$project->status}}
                        </span>
                    </div>

                    <div class="meta-block">
                        <span class="meta-label">Category</span>
                        <strong>{{$project->category->name}}</strong>
                    </div>

                    {{-- <div class="meta-block meta-action">
                        <button class="btn-primary" id="openVideoBtn">
                            <i class="fa-solid fa-play"></i> Watch Overview
                        </button>
                    </div> --}}
                </div>

                {{--
                <!-- LEAD -->
                <div class="project-lead">
                    <img src="{{asset($project->user->avatar_url ?? NO_IMAGE)}}" alt="">
                    <div>
                        <strong>{{$project->user->name}}</strong>
                        <small>Project Lead</small>
                    </div>
                </div> --}}
            </div>

        </div>
        <!-- CONTENT -->
        <div class="project-body">

            <!-- MAIN -->
            <div class="project-main">
                <img class="project-banner" src="{{asset($project->cover_image ?? NO_IMAGE)}}" alt="">

                <div class="project-card">
                    <h2>Overview</h2>
                    <div class="rich-content">
                        {!! $project->description !!}
                    </div>
                </div>
                <div class="project-card">
                    <h3>Supported By</h3>
                    <p class="partners-desc">
                        Sponsors, donors, community leaders, and partners who contributed
                        to the success of this initiative.
                    </p>

                    {{-- <div class="partners-grid">

                        <div class="partner-card">
                            <img src="https://divafarms.org/storage/donors/ca117411-ccd9-4da0-89ee-b43dd5c2df03.jpg" alt="Partner Name">
                            <span>UNICEF Ghana</span>
                        </div>

                        <div class="partner-card">
                            <img src="/assets/img/partners/partner2.png" alt="Partner Name">
                            <span>Local Health Initiative</span>
                        </div>

                        <div class="partner-card">
                            <img src="/assets/img/partners/partner3.png" alt="Partner Name">
                            <span>Community Leaders</span>
                        </div>

                        <div class="partner-card">
                            <img src="/assets/img/partners/partner4.png" alt="Partner Name">
                            <span>Global Donors</span>
                        </div>

                    </div> --}}
                </div>
                <div class="project-card">
                    <h2>Share Feedback</h2>
                    @livewire('guest.feedback-form')
                </div>
            </div>

            <!-- SIDEBAR -->
            <aside class="project-sidebar">

                <!-- PROJECT INFO -->
                <div class="project-card project-info-card">
                    <h3 class="card-title">Project Info</h3>

                    <div class="info-list">
                        <div class="info-row">
                            <span>Status</span>
                            <strong class="badge {{$badgeClass}}">{{$project->status}}</strong>
                        </div>

                        <div class="info-row">
                            <span>Start Date</span>
                            <strong>{{$project->start_date->format('j M Y')}}</strong>
                        </div>

                        <div class="info-row">
                            <span>Beneficiaries</span>
                            <strong>{{$project->beneficiaries_count}}</strong>
                        </div>

                        <div class="info-row">
                            <span>Location</span>
                            <strong>{{$project->location}}</strong>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="project-card project-cta">
                    <h3 class="card-title">Get Involved</h3>

                    <p class="cta-text">
                        Support this project through donations or volunteering.
                        Every contribution creates measurable impact.
                    </p>

                    <a href="{{route('guest.donate')}}" class="btn-primary btn-block">
                        Donate Now
                    </a>
                </div>

            </aside>
        </div>

    </div>
</section>

@endsection