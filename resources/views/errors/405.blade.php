@extends('layouts.error', ['title' => '405 Method Not Allowed'])
@section('content')
    <div class="error-code">405</div>
    <div class="error-message">Method Not Allowed</div>
    <p class="text-muted mb-4">
        The method used in the request is not supported for this resource.
    </p>
@endsection
