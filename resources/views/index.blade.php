<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('img/fav-icon.png') }}" type="image/x-icon"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ART-SAM</title>

    <!-- Icon css link -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="{{ asset('vendors/revolution/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/revolution/css/layers.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/revolution/css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/animate-css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="antialiased">
<!--================Header Area =================-->
@include('layouts.header')
<!--================Header Area =================-->

@yield('content')

<!--================Footer Area =================-->
@include('layouts.footer')
<!--================End Footer Area =================-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery-2.2.4.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Rev slider js -->
<script src="{{ asset('vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('vendors/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>

<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendors/counterup/waypoints.min.js') }}"></script>
<script src="{{ asset('vendors/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('vendors/flex-slider/jquery.flexslider-min.js') }}"></script>

<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('js/gmaps.min.js') }}"></script>

<script src="{{ asset('js/theme.js') }}"></script>
</body>
<style>
    .preview {
        max-width: 90%;
        width: auto;
    }
</style>
</html>
