@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title mb-2">Divafam Project</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Project Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
<section class="course-details-two">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card bg-light">
                    <div class="card-body d-lg-flex align-items-center">
                        <div class="position-relative">
                            <a href="https://www.youtube.com/embed/1trvO6dqQUI" id="openVideoBtn" target="_blank">
                                <img class="img-fluid rounded-2" src="{{asset($project->cover_image ?? NO_IMAGE)}}"
                                    alt="DivaFam Project">
                                <div class="play-icon">
                                    <i class="ti ti-player-play-filled fs-28"></i>
                                </div>
                            </a>
                        </div>
                        <div id="videoModal">
                            <div class="modal-content1">
                                <span class="close-btn" id="closeModal">&times;</span>
                                <iframe id="youtubeIframe" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="w-100 ps-lg-4">
                            <h3 class="mb-2">{{$project->title}}</h3>
                            <p class="fs-14 mb-3">
                                {{$project->short_description}}
                            </p>
                            <div class="d-flex align-items-center gap-2 gap-sm-3 gap-xl-4 flex-wrap my-3 my-sm-0">
                                <p class="fw-medium d-flex align-items-center mb-0">
                                    <img class="me-2" src="assets/img/icons/people.svg" alt="Beneficiaries">250+
                                    Beneficiaries
                                </p>
                                @php
                                $badgeClass = match ($project->status) {
                                'ongoing' => 'warning',
                                'completed' => 'success',
                                'draft' => 'secondary',
                                'archived' => 'dark',
                                'postponed' => 'danger',
                                default => 'primary',
                                };
                                @endphp
                                <p class="fw-medium d-flex align-items-center mb-0">
                                <div class="badge text-bg-{{$badgeClass}}">{{$project->status}}</div>
                                </p>
                                <span
                                    class="badge badge-sm rounded-pill bg-success fs-12">{{$project->category->name}}</span>
                            </div>
                            <div class="d-sm-flex align-items-center justify-content-sm-between mt-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <img class="rounded-circle"
                                            src="{{asset($project->user->avatar_url ?? NO_IMAGE)}}" alt="Founder">
                                    </div>
                                    <div class="ms-2">
                                        <h5 class="fs-18 fw-semibold"><a href="#">{{$project->user->name}}</a>
                                        </h5>
                                        <p class="fs-14">Project Lead</p>
                                    </div>
                                </div>
                                {{-- <div class="d-flex mt-sm-0 mt-2 align-items-center">
                                    <i class="fa-solid fa-star text-warning me-1"></i>
                                    <i class="fa-solid fa-star text-warning me-1"></i>
                                    <i class="fa-solid fa-star text-warning me-1"></i>
                                    <i class="fa-solid fa-star text-warning me-1"></i>
                                    <i class="fa-solid fa-star-half-stroke text-warning me-1"></i>
                                    <p class="fs-14"><span class="text-gray-9">4.5</span> (Community Impact Rating)</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Overview -->
        <div class="row mt-4">
            <div class="col-lg-8">
                <div>
                    <img src="{{asset($project->cover_image ?? NO_IMAGE)}}" alt="DivaFam Project Image"
                        class="img-fluid mb-4">
                </div>
                <div class="project-page-content pt-0">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Overview</h5>
                            <p>
                                {{$project->description}}
                            </p>

                            <h6 class="mb-2">Supported By</h6>
                            <p>
                                Special thanks to our sponsors and donors who made this project a success,
                                including community leaders, local businesses, and international partners.
                            </p>
                        </div>
                    </div>

                    <!-- Comment / Feedback -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="subs-title mb-3">Share Your Feedback</h5>
                            @livewire('guest.feedback-form')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="project-sidebar mt-0">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="subs-title mb-4">Project Info</h5>
                            @php
                            $badgeClass = match ($project->status) {
                            'ongoing' => 'warning',
                            'completed' => 'success',
                            'draft' => 'secondary',
                            'archived' => 'dark',
                            'postponed' => 'danger',
                            default => 'primary',
                            };
                            @endphp
                            <ul>
                                <li><strong>Status:</strong> <span
                                        class="badge text-bg-{{$badgeClass}}">{{$project->status}}</span></li>
                                <li><strong>Start Date:</strong>{{$project->start_date->format('jS M, Y')}}</li>
                                <li><strong>Beneficiaries:</strong> {{$project->beneficiaries_count}}</li>
                                <li><strong>Location:</strong>{{$project->location}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="subs-title mb-4">How You Can Help</h5>
                            <p>Support our mission by donating or volunteering with DivaFam. Every contribution creates
                                impact.</p>
                            <a href="{{route('guest.donations.donate')}}" class="btn btn-primary w-100 mt-2">Donate Now</a>
                            <a href="#" class="btn btn-outline-success w-100 mt-2">Become a Volunteer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection