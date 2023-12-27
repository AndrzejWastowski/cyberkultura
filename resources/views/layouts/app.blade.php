<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="bootstrap 5, premium, multipurpose, sass, scss, saas, eCommerce, Shop, Fashion" />
    <meta name="description" content="Bootstrap 5 Landing Page Template" />
    <meta name="author" content="www.themeht.com" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <link rel="preload" href="{{ asset('assets/images/icon/icon_combo.svg') }}" as="image">

    <!-- inject css start -->

    <link href="{{ asset('assets/css/theme-plugin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/slick-theme.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>

        <div class="page-wrapper">
            <!-- preloader start -->
            @include('layouts.preloader')
            @include('layouts.header')
            <!-- preloader end -->
            @yield('content')

        <!--back-to-top start-->

            <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="las la-angle-up"></i></a></div>

        <!--back-to-top end-->
            @include('layouts.fotter')
            @include('layouts.modal')
            @include('layouts.scripts')

        </div>
    </div>
</body>
</html>


