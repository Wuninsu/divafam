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

<style>
    /* DESCRIPTION */
    .partners-desc {
        color: var(--muted);
        margin-bottom: 20px;
        max-width: 600px;
    }

    /* GRID */
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    /* CARD */
    .partner-card {
        background: var(--surface);
        border: 1px solid var(--border-soft);
        border-radius: var(--radius);
        padding: 16px;
        text-align: center;
        transition: var(--transition);
    }

    /* LOGO */
    .partner-card img {
        max-width: 80px;
        height: 40px;
        object-fit: contain;
        margin-bottom: 10px;
        filter: grayscale(100%);
        opacity: 0.8;
        transition: var(--transition);
    }

    /* NAME */
    .partner-card span {
        display: block;
        font-size: 13px;
        color: var(--muted);
    }

    /* HOVER EFFECT */
    .partner-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-sm);
    }

    .partner-card:hover img {
        filter: grayscale(0%);
        opacity: 1;
    }

    /* =========================
   RESPONSIVE
========================= */

    /* Tablet */
    @media (max-width: 992px) {
        .partners-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Mobile */
    @media (max-width: 576px) {
        .partners-grid {
            grid-template-columns: 1fr;
        }

        .partner-card {
            display: flex;
            align-items: center;
            text-align: left;
            gap: 12px;
        }

        .partner-card img {
            margin-bottom: 0;
            width: 50px;
        }
    }
</style>
<section class="project">
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

                    <div class="meta-block meta-action">
                        <button class="btn-primary" id="openVideoBtn">
                            <i class="fa-solid fa-play"></i> Watch Overview
                        </button>
                    </div>
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
                    <p>{{$project->description}}</p>
                </div>
                <div class="project-card">
                    <h3>Supported By</h3>
                    <p class="partners-desc">
                        Sponsors, donors, community leaders, and partners who contributed
                        to the success of this initiative.
                    </p>

                    <div class="partners-grid">

                        <!-- Partner -->
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

                    </div>
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

                    <a href="#" class="btn-outline btn-block">
                        Become a Volunteer
                    </a>
                </div>

            </aside>
        </div>

    </div>
</section>

<style>
    /* SIDEBAR */
    .project-sidebar {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* CARD TITLE */
    .card-title {
        font-size: 16px;
        margin-bottom: 16px;
    }

    /* =========================
   INFO CARD
========================= */
    .project-info-card {
        border: 1px solid var(--border-soft);
    }

    /* INFO LIST */
    .info-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    /* ROW */
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 10px;
        border-bottom: 1px dashed var(--border);
    }

    .info-row:last-child {
        border-bottom: none;
    }

    /* LABEL */
    .info-row span {
        font-size: 13px;
    }

    /* VALUE */
    .info-row strong {
        font-size: 14px;
        color: var(--text);
    }

    /* CTA */
    .project-cta {
        border: 1px solid var(--brand-border);
        background: linear-gradient(180deg,
                var(--surface),
                var(--brand-soft-4));
    }

    /* CTA TEXT */
    .cta-text {
        color: var(--muted);
        font-size: 14px;
        margin-bottom: 18px;
    }

    /* BUTTONS */
    .btn-block {
        display: block;
        width: 100%;
        text-align: center;
        padding: 12px;
        border-radius: var(--radius);
        margin-top: 10px;
        transition: var(--transition);
    }

    /* PRIMARY */
    .btn-primary {
        background: var(--brand);
        color: #fff;
    }

    .btn-primary:hover {
        background: var(--brand-600);
    }

    /* OUTLINE */
    .btn-outline {
        border: 1px solid var(--brand);
        color: var(--brand);
    }

    .btn-outline:hover {
        background: var(--brand-soft);
    }

    /* status */
    .status {
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
    }

    /* status */
    @media (max-width: 768px) {
        .project-sidebar {
            margin-top: 20px;
        }
    }
</style>

<style>
    /* =========================
   PROJECT LAYOUT
========================= */
    .project {
        padding: 10px 0;
        background: var(--bg);
    }

    .project-container {
        width: min(1200px, 92%);
        margin: auto;
    }

    /* =========================
   HERO
========================= */
    .project-hero {
        background: var(--surface);
        padding: 32px;
        border: 1px solid var(--border-soft);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        margin-bottom: 40px;
    }

    .project-hero .project-title {
        font-size: 30px;
        line-height: 1.3;
        margin-bottom: 10px;
    }

    .project-hero .project-desc {
        color: var(--muted);
        max-width: 720px;
        margin-bottom: 24px;
    }

    /* meta wrapper*/
    .project-meta {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-top: 10px;
    }

    /* meta card*/
    .meta-block {
        background: var(--surface);
        border: 1px solid var(--border-soft);
        border-radius: var(--radius);
        padding: 10px 12px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 80px;
        transition: var(--transition);
    }

    /* HOVER EFFECT (subtle NGO style) */
    .meta-block:hover {
        box-shadow: var(--shadow-sm);
        transform: translateY(-2px);
    }

    /* LABEL */
    .meta-label {
        font-size: 12px;
        color: var(--muted-2);
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    /* VALUE */
    .meta-block strong {
        font-size: 18px;
        color: var(--text);
    }

    /* STATUS BADGE (enhanced) */
    .project-status {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    /* action*/
    .meta-action {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .meta-action .btn-primary {
        width: 100%;
        justify-content: center;
        padding: 12px;
        font-weight: 500;
    }

    /*Responsive*/

    /* Tablets */
    @media (max-width: 992px) {
        .project-meta {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Mobile */
    @media (max-width: 576px) {
        .project-meta {
            grid-template-columns: 1fr;
        }

        .meta-block {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .meta-label {
            margin-bottom: 0;
        }

        .meta-action {
            justify-content: stretch;
        }
    }

    /* LEAD */
    .project-lead {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .project-lead img {
        width: 44px;
        height: 44px;
        border-radius: 50%;
    }

    .project-lead small {
        display: block;
        color: var(--muted-2);
    }


    /* project body*/
    .project-body {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 32px;
    }

    /* MAIN */
    .project-banner {
        width: 100%;
        border-radius: var(--radius);
        margin-bottom: 20px;
        border: 1px solid var(--border-soft);
    }

    /* CARD */
    .project-card {
        background: var(--surface);
        padding: 22px;
        border: 1px solid var(--border-soft);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        margin-bottom: 20px;
    }

    .project-card h2,
    .project-card h3 {
        margin-bottom: 12px;
    }

    .project-card p {
        color: var(--muted);
        line-height: 1.7;
    }

    /* SIDEBAR BUTTONS */
    .project-sidebar .btn-primary,
    .project-sidebar .btn-outline {
        display: block;
        text-align: center;
        padding: 12px;
        border-radius: var(--radius);
        margin-top: 10px;
        transition: var(--transition);
    }

    .project-sidebar .btn-primary {
        background: var(--brand);
        color: #fff;
    }

    .project-sidebar .btn-primary:hover {
        background: var(--brand-600);
    }

    .project-sidebar .btn-outline {
        border: 1px solid var(--brand);
        color: var(--brand);
    }

    .project-sidebar .btn-outline:hover {
        background: var(--brand-soft);
    }

    /* INFO LIST */
    .project-info {
        list-style: none;
        padding: 0;
    }

    .project-info li {
        margin-bottom: 10px;
        color: var(--muted);
    }

    .project-info strong {
        color: var(--text);
    }

    /* =========================
   RESPONSIVE
========================= */
    @media (max-width: 768px) {
        .project-body {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection