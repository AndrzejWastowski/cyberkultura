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


@section('meta_tag')
<title>Cyberkultura - druk A4/A3 pieczątki, skanowanie, bindowanie, oprawa prac, grawerowanie laserowe, zaproszenia, ulotki/winietki w Kutnie</title>

<meta property="og:title" content="Cyberkultura - druk A4/A3 pieczątki, skanowanie, bindowanie, oprawa prac, grawerowanie laserowe, zaproszenia, ulotki/winietki w Kutnie">
<meta property="og:description" content="Mała poligrafia druk A4/A3. Wykonujemy pieczątki, skanujemy dokumenty, drukujemy cz-b i w kolorze. Wykonujemy bindowanie, oprawiamy prace dyplomowe. Oferujemy grawerowanie laserowe, wycinamy laserem w sklejce. Projektujemy i drukujemy zaproszenia ślubne, zaproszenia okolicznościowe, wykonujemy ulotki/winietki w Kutnie">
<meta property="og:image" content="https://cyberkultura.pl/{{ $path_m }}">
<meta property="og:url" content="http://cyberkultura.pl">
<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:site_name" content="Cyberkultura - pieczątki, druk/ksero A3/A4 wizytówki zaproszenia ślubne i okolicznościowe, winietki Kutno">
<meta property="fb:app_id" content="1234567890">
@endsection
