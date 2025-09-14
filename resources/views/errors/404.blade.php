@extends('layouts.error', ['title' => '404 Not Found'])
@section('content')
    <div class="error-box-img">
        <img src="assets/img/error/error-01.svg" alt="Img" class="img-fluid">
    </div>
    <h3 class="h2 mb-3"> Page Not Found <span class="text-secondary ms-1">404</span></h3>
    <p class="h4 font-weight-normal"> The page you’re looking for doesn’t exist or has been moved.</p>
@endsection
