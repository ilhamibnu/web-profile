<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('landing/img/favicon.png') }}" type="image/png">
    <title>MeetMe Personal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/popup/magnific-popup.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}">
</head>

<body>

    <!--================Header Menu Area =================-->
    @include('landing.partials.header')
    <!--================Header Menu Area =================-->

    <!--================Contet =================-->

    @yield('content')

    <!--================End Contet =================-->


    <!--================Footer Area =================-->
    @include('landing.partials.footer')
    <!--================End Footer Area =================-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('landing/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('landing/js/popper.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/stellar.js') }}"></script>
    <script src="{{ asset('landing/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landing/js/mail-script.js') }}"></script>
    <script src="{{ asset('landing/js/theme.js') }}"></script>
</body>

</html>
