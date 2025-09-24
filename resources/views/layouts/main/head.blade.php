<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <x-seo::meta />

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('static/img/favicons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('static/img/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('static/img/favicons/favicon-16x16.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('static/img/favicons/favicon.ico') }}">
  <link rel="manifest" href="{{ asset('static/img/favicons/manifest.json') }}">
  <meta name="msapplication-TileImage" content="{{ asset('static/img/favicons/mstile-150x150.png') }}">
  <meta name="theme-color" content="#ffffff">
  <script src="{{ asset('static/vendors/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('static/js/config.js') }}"></script>

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->

  <link href="{{ asset('static/vendors/choices/choices.min.css') }}" rel="stylesheet">
  <link href="{{ asset('static/vendors/dhtmlx-gantt/dhtmlxgantt.css') }}" rel="stylesheet">
  <link href="{{ asset('static/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet">
  <link href="{{ asset('static/vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('static/unicons.iconscout.com/release/v4.0.8/css/line.css') }}">
  <link href="{{ asset('static/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">

  <script>
    var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
  </script>

  @livewireStyles
  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link href="{{ asset('static/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
</head>