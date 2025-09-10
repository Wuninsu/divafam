<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5.3.7 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body class="bg-light text-dark d-flex align-items-center justify-content-center min-vh-100">
    <header class="mb-4 container">
        @if (Route::has('login'))
            <nav class="d-flex justify-content-end gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="container bg-white p-4 rounded shadow">
        <h1 class="mb-3">Let's get started</h1>
        <p class="text-muted mb-4">
            Laravel has an incredibly rich ecosystem.<br>We suggest starting with the following:
        </p>
        <ul class="list-group mb-4">
            <li class="list-group-item">
                Read the <a href="https://laravel.com/docs" target="_blank" class="text-decoration-underline text-danger">Documentation</a>
            </li>
            <li class="list-group-item">
                Watch video tutorials at <a href="https://laracasts.com" target="_blank" class="text-decoration-underline text-danger">Laracasts</a>
            </li>
        </ul>
        <a href="https://cloud.laravel.com" target="_blank" class="btn btn-danger">Deploy now</a>
    </main>
</body>
</html>
