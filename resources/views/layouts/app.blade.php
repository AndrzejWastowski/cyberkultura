<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="druk A4, druk A3, Kutno, ksero, skanowanie, laminowanie, bindowanie, oprawa, prace dyplomowe, xero, wizytówki, zaptroszenia ślubne, okolicznościowe, chciny, winietki, projektowanie ulotek i plakatów" />
    <meta name="description" content="Cyberkultura - Druk A4/A3, ksero, oprawa prac, laminowanie, bindowanie, zaproszenia ślubne / okolicznościowe  winietki i ulotki, poligrafia" />
    <meta name="author" content="Andrzej Wastowski - www.wastowski.pl" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->

    @yield('meta_tag')

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <link rel="preload" href="{{ asset('assets/images/icon/icon_combo.svg') }}" as="image">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v10.0" nonce="{{ config('app.nonce') }}"></script>

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


