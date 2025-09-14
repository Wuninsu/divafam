<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/template/error-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Sep 2025 07:36:15 GMT -->

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="assets/css/iconsax.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">


    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="error-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="error-box">
            @yield('content')
            <div>
                <a href="/" class="btn back-to-home-btn me-2"><i class="isax isax-arrow-left-2 me-1"></i>
                    Back to Home
                </a>
                <button onclick="location.reload()" class="btn btn-outline-secondary">Retry</button>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Slick Slider -->
    <script src="assets/plugins/slick/slick.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>
