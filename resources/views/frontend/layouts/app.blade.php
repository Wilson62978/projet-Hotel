<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/hotelier/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Oct 2022 16:50:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.html" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="../../fonts.googleapis.com/index.html">
    <link rel="preconnect" href="../../fonts.gstatic.com/index.html" crossorigin>
    <link href="{{asset('assets/css/css2a520.css?family=Heebo:wght@400;500;600;700&amp;family=Montserrat:wght@400;500;600;700&amp;display=swap')}}" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="{{asset('assets/fonts/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fonts/bootstrap-icons.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/simplebar/dist/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/tiny-slider/dist/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/lightgallery/css/lightgallery-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div class="container-xxl bg-white p-0">

        @include('frontend.inc.nav')

        @yield('content')
       
        @include('frontend.inc.footer')

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @livewireScripts
    <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>