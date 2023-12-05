@extends('layouts.app')

@section('content')

<div class="container pt-5"></div>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
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
