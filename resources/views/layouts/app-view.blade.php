<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="7LibxNrHwvy8OPIUA2_D_ei1L1HM0oEIgUz9CNHJmnQ" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Default Title')</title>
    <meta name="description" content="@yield('description', 'Default Description')">
    <meta name="keywords" content="@yield('keywords', 'Default Keywords')">

    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="icon" type="{{ asset('images/favicon.png') }}" href="">

<!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('plugins/colorbox/colorbox.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>


<div class="body-inner">
    @include('include.header')
    @yield('content')
    @include('include.footer')
</div>

                                                        <!-- Javascript -->


<!-- initialize jQuery Library -->
<script src="{{ asset('plugins/jQuery/jquery.min.js') }}"></script>
<!-- Bootstrap jQuery -->
<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}" defer></script>
<!-- Slick Carousel -->
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/slick/slick-animation.min.js') }}"></script>
<!-- Color box -->
<script src="{{ asset('plugins/colorbox/jquery.colorbox.js') }}"></script>
<!-- shuffle -->
<script src="{{ asset('plugins/shuffle/shuffle.min.js') }}" defer></script>


<!-- Google Map API Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<!-- Google Map Plugin-->
<script src="{{ asset('plugins/google-map/map.js') }}" defer></script>

<!-- Template custom -->
<script src="{{ asset('js/script.js') }}"></script>


</body>
</html>
