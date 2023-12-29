@extends('layouts.app')

@section('content')

<div class="container pt-5"></div>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            {{ dd($page) }}
            <h2>{{ $page->title }}</h2>
            <p>{!! $page->lead !!}</p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="/">Cyberkultura</a></li>
          <li>{!! $page->title !!}</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Work Process Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            <div class="entry">
              <div class="section-title" >
                <h2>{{ $page->title }}</h2>
              </div>
              <div class="section-title bg-light pt-3" >{!! $page->lead !!}</div>
              <div class="section-content">
                <p>{!! $page->description !!}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            @include('page.subpages.sidebar')
          </div><!-- End blog sidebar -->
        </div>
      </div>
    </section>
@endsection

@section('meta_tag')
<title>Cyberkultura - Skontaktuj się z nami, telefon, e-mail, formularz kontaktowy</title>

<meta property="og:title" content="Cyberkultura - {{ $page->title }}">
<meta property="og:description" content="{{ $page->lead }}">
<meta property="og:image" content="https://cyberkultura.pl/resources/subpage/{{ $page->image }}">
<meta property="og:url" content="http://cyberkultura.pl/{{ route('page.subpage',['pages'=>$page->link]) }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:site_name" content="Cyberkultura - pieczątki, druk/ksero A3/A4 wizytówki zaproszenia ślubne i okolicznościowe, winietki Kutno">
<meta property="fb:app_id" content="1234567890">
@endsection
