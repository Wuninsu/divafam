@extends('layouts.error', ['title' => '503 Service Unavailable'])
@section('content')
    <div class="error-box-img">
        <img src="assets/img/error/error-03.svg" alt="Img" class="img-fluid">
    </div>
    <h3 class="h2 mb-3">Service Unavailable<span class="text-secondary ms-1">503</span></h3>
    <p class="h4 font-weight-normal">We're currently undergoing maintenance or experiencing high traffic. Please try again
        later.</p>
@endsection
