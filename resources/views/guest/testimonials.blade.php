@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title mb-2">Testimonials</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{route('guest.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<div class="testimonials-sec-two mb-0 position-relative">
    <div class="container">
        <div class="row">
            @forelse ($testimonies as $testimony)
            <div class="col-xl-4 col-md-6 d-flex">
                <div class="testimonial-item flex-fill">
                    <div class="d-flex justify-content-between mb-1">
                        {{-- <h6>Flexible Learning</h6> --}}
                        <i class="isax isax-quote-up5 fs-24 text-primary text-opacity-50"></i>
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
            @empty

            @endforelse

        </div>
    </div>
</div>
@endsection