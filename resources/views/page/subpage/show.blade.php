@extends('layouts.app')

@section('content')


<!--hero section start-->

<section class="bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="h2 mb-0">{{ $page->title }}</h1>
      </div>
      <div class="col-md-6 mt-3 mt-md-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
            <li class="breadcrumb-item"><a class="text-dark" href="#"><i class="las la-home me-1"></i>Start</a>
            </li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active text-primary" aria-current="page">{{ $page->title }}</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- / .row -->
  </div>
  <!-- / .container -->
</section>

<!--hero section end--> 


<!--body content start-->

<div class="page-content">

<!--privacy start-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <div class="section-title bg-light pt-3" >{!! $page->lead !!}</div>
        <div class="section-content">
          <p>{!! $page->description !!}</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        @include('page.subpage.sidebar')
      </div>

    </div>
  </div>
</section>

<!--privacy end-->

</div>

<!--body content end--> 



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
