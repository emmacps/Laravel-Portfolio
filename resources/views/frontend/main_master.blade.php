<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rasalina - Personal Portfolio HTML Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png')}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css')}}">
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
      @include('frontend.body.header')
        <!-- header-area-end -->

       <main>

        @yield('frontend.index')
       </main>



        <!-- Footer-area -->
       @include('frontend.body.footer')
