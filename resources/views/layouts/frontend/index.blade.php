<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aureum Clone</title>
    <link rel="icon" href="{{ asset('frontend/images/icon.webp') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="AIvent" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('frontend/css/vendors.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/auth-animated.css') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{ asset('frontend/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

    <!-- auth modal begin -->
    @include('frontend.modals.auth')
    <!-- auth modal end -->

    <!-- season closed modal begin -->
    @include('frontend.modals.season_closed')
    <!-- season closed modal end -->
    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('frontend/js/vendors.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jarallax@2/dist/jarallax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jarallax@2/dist/jarallax-video.min.js"></script>
    <script src="{{ asset('frontend/js/designesia.js') }}"></script>
    <script src="{{ asset('frontend/js/countdown-custom.js') }}"></script>
    <script src="{{ asset('frontend/js/custom-marquee.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    text: "{{ session('success') }}"
                });
            @endif

            @if (session('error'))
                Toast.fire({
                    icon: 'error',
                    text: "{{ session('error') }}"
                });
            @endif

            @if ($errors->any())
                Toast.fire({
                    icon: 'error',
                    text: "{{ $errors->first() }}"
                });
            @endif

            // Check for login parameter to open modal
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('login')) {
                const authModal = new bootstrap.Modal(document.getElementById('authModal'));
                authModal.show();
                // Clean up URL without reload
                const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                window.history.pushState({
                    path: newUrl
                }, '', newUrl);
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
