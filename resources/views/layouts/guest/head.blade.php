<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-seo::meta />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset(setup_data('favicon'))}}">
    <link rel="apple-touch-icon" href="{{asset(setup_data('favicon'))}}">

    <!-- Theme Settings Js -->
    <script src="{{ asset('assets/js/theme-script.js') }}"></script>

    <!-- LightGallery CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- iconsax css -->
    <link rel="stylesheet" href="{{ asset('assets/css/iconsax.css') }}">

    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick-theme.css') }}">

    <!-- tabler icon css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.css') }}">

    <!-- aos css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/aos/aos.css') }}">

    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- owl carousel css file -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">

    <!-- style.css file -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>