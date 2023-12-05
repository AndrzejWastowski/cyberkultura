@extends('layouts.app')

@section('content')
    @include('page.start.categories_baner')

    <!--body content start-->

    <div class="page-content">
        @include('page.start.promotion')
        @include('page.start.popular_products')
        @include('page.start.two_baners')
        @include('page.start.information')
        @include('page.start.bestseller_slider')
       <!-- _@include('page.start.hot_deal') -->
       <!-- _@include('page.start.sale') -->
        @include('layouts.instgram')
    </div>

    <!--body content end-->

    <!-- page wrapper end -->

@endsection
