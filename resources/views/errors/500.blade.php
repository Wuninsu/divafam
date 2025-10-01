@extends('layouts.error', ['title' => '500 Internal Server Error'])
@section('content')
<div class="error-box-img">
    <img src="assets/img/error/error-02.svg" alt="Img" class="img-fluid">
</div>
<h3 class="h2 mb-3">Internal Server Error<span class="text-secondary ms-1">500</span></h3>
<p class="h4 font-weight-normal">Something went wrong on our end. We’re working to fix it. Please try again at a later
    stage.
</p>
@endsection