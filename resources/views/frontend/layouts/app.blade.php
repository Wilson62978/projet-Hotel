<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Guest house CICA</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/favicon.html" rel="icon">
    @livewireStyles

    <link href="{{asset('assets/css/css2a520.css?family=Heebo:wght@400;500;600;700&amp;family=Montserrat:wght@400;500;600;700&amp;display=swap')}}" rel="stylesheet">  

    <link href="{{asset('assets/fonts/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fonts/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/simplebar/dist/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/tiny-slider/dist/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/lightgallery/css/lightgallery-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head> --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Guest house CICA</title>
    
    <link rel="icon" href="" type="image/x-icon" />
    @livewireStyles


    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/stroke-icon/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/flat-icon/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/vendors/revolution/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/revolution/css/layers.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/revolution/css/navigation.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/animate-css/animate.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/vendors/magnify-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/bootstrap-selector/bootstrap-select.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/lightbox/simpleLightbox.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
</head>

<body>
    {{-- <div class="container-xxl bg-white p-0">

        @include('frontend.inc.nav')

        @yield('content')
       
        @include('frontend.inc.footer')

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div> --}}

    @include('frontend.inc.nav')

    @yield('content')
    
    @include('frontend.inc.footer')



    @livewireScripts
    {{-- <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/vendor/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script> --}}


            <!--================End Footer Area =================-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{asset('assets/js/jquery-2.2.4.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Rev slider js -->
        <script src="{{asset('assets/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script src="{{asset('assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        
        <script src="{{asset('assets/vendors/magnify-popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/vendors/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/vendors/counterup/waypoints.min.js')}}"></script>
        <script src="{{asset('assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap-selector/bootstrap-select.js')}}"></script>
<!--        <script src="vendors/lightbox/js/lightbox.min.js')}}"></script>-->
        <script src="{{asset('assets/vendors/lightbox/simpleLightbox.min.js')}}"></script>
        
        <!-- instafeed-->
        <script type="{{asset('assets/text/javascript" src="vendors/instafeed/instafeed.min.js')}}"></script>
        <script type="{{asset('assets/text/javascript" src="vendors/instafeed/script.js')}}"></script>
        
        <script src="{{asset('assets/js/theme.js')}}"></script>
</body>
</html>