@extends('layouts.app')
@section('content')

<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">Testimonials</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Testimonials
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="testimonials-sec-two mb-0 position-relative">
    <div class="container">
        <div class="row">
            @forelse ($testimonies as $testimony)
            <div class="col-xl-4 col-md-6 d-flex">
                <div class="card testimonial-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-1">
                            {{-- <h6>Flexible Learning</h6> --}}
                            <i class="isax isax-quote-up5 text-success fs-3 opacity-50"></i>
                        </div>
                        <p class="mb-3">{{$testimony->message}}</p>
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <a href="#" class="avatar avatar-lg rounded-circle">
                                    <img class="img-fluid rounded-circle" src="{{asset($testimony->image ?? NO_IMAGE)}}"
                                        alt="img">
                                </a>
                                <div class="ms-2">
                                    <a href="#">{{$testimony->name}}</a>
                                    {{-- <p class="fs-12"></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="item flex-fill">
                <div class="review-item text-center py-5 px-3">

                    <!-- ICON -->
                    <div class="mb-3">
                        <i class="isax isax-quote-up5 fs-1 text-primary opacity-50"></i>
                    </div>

                    <!-- TITLE -->
                    <h5 class="fw-semibold mb-2">No Testimonials Yet</h5>

                    <!-- DESCRIPTION -->
                    <p class="text-muted mb-0">
                        Be the first to share your story and inspire others through your experience with us.
                    </p>

                </div>
            </div>
            @endforelse

        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-tile">Share you story</h4>
            </div>
            <div class="card-body">
                @livewire('guest.feedback-form')
            </div>
        </div>
    </div>
</div>
@endsection