<!DOCTYPE html>
<html>

<head>
    <title>How to Install and Use Trix Editor in Laravel 11 - DevScriptSchool.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

</head>

<body>

    <div class="container mt-5">
        <!-- Post Details -->
        <div class="card">
            <div class="card-header">
                <h3>{{ $post->title }}</h3>
            </div>
            <div class="card-body">
                <!-- Post Body -->
                <div class="content">
                    {!! $post->body !!}
                    <!-- Make sure your content has HTML tags and you trust it -->
                </div>
            </div>
            <div class="card-footer text-muted">
                <p>Posted on: {{ $post->created_at->format('F j, Y') }}</p>
                <!-- You can add more info like the author, etc. -->
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('trix.index') }}" class="btn btn-secondary">Back to Posts</a>
            <!-- You can add edit or delete options if needed -->
        </div>

</body>

</html>