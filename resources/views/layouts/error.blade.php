<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset(setup_data('favicon'))}}">
    <link rel="apple-touch-icon" href="{{asset(setup_data('favicon'))}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/iconsax.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/feather/feather.css')}}">


    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body class="error-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="error-box">
            @yield('content')
            <div>
                <a href="/" class="btn btn-success me-2"><i class="isax isax-arrow-left-2 me-1"></i>
                    Back to Home
                </a>
                <button onclick="location.reload()" class="btn btn-outline-secondary">Retry</button>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Slick Slider -->
    <script src="{{asset('assets/plugins/slick/slick.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('assets/js/script.js')}}"></script>

</body>

</html>