<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aureum Clone</title>
    <link rel="icon" href="{{ asset('frontend/images/icon.webp') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="AIvent" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('frontend/css/vendors.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="{{ ('frontend/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css" >

</head>

<body class="dark-scheme">

    <div id="wrapper">

        <div class="float-text show-on-scroll">
            <span><a href="#">Scroll to top</a></span>
        </div>

        <div class="scrollbar-v show-on-scroll"></div>

        @include('layouts.frontend.header')

       @yield('contents')

    </div>

    <!-- footer begin -->
    @include('layouts.frontend.footer')
    <!-- footer end -->
    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('frontend/js/vendors.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jarallax@2/dist/jarallax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jarallax@2/dist/jarallax-video.min.js"></script>
    <script src="{{ asset('frontend/js/designesia.js') }}"></script>
    <script src="{{ asset('frontend/js/countdown-custom.js') }}"></script>
    <script src="{{ asset('frontend/js/custom-marquee.js') }}"></script>

</body>
</html>