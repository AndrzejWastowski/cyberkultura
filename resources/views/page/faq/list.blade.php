
@extends('layouts.app')

@section('content')


<!--hero section start-->

<section class="bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1 class="h2 mb-0">FAQ - Najczęściej zadawane pytania</h1>
        </div>
        <div class="col-md-4 mt-3 mt-md-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
              <li class="breadcrumb-item"><a class="text-dark" href="#"><i class="las la-home me-1"></i>Home</a>
              </li>
              <li class="breadcrumb-item">Podstrony</li>
              <li class="breadcrumb-item active text-primary" aria-current="page">Faq</li>
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
  <section>
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-lg-10">
          <div id="accordion" class="accordion">
        
              @foreach ($faqs as $key => $faq)
              <div class="card border-0 mb-4">
                  <div class="card-header">
                      <h6 class="mb-0">
                          <a class="text-dark {{ $key === 0 ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse_{{ $faq->id }}">{{ $faq->question }}</a>
                      </h6>
                  </div>
                  <div id="collapse_{{ $faq->id }}" class="collapse {{ $key === 0 ? 'show' : '' }}" data-bs-parent="#accordion">
                      <div class="card-body text-muted">{{ $faq->answer }}</div>
                  </div>
              </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
  <!--body content end-->
@endsection

@section('meta_tag')
<title>Cyberkultura - Nasza oferta wizytówki pieczątki oprawa prac druk A3/A4 skan ksero zaproszenia bindowanie laminowanie i inne..</title>

<meta property="og:title" content="Cyberkultura - FAQ - najcześcjej zadawane pytania ">
<meta property="og:description" content="ssdfsdf">
<meta property="og:image" content="https://cyberkultura.pl/resources/faq.webp">
<meta property="og:url" content="http://cyberkultura.pl/faq/">
<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:site_name" content="Cyberkultura - pieczątki, druk/ksero A3/A4 wizytówki zaproszenia ślubne i okolicznościowe, winietki Kutno">
<meta property="fb:app_id" content="1234567890">
@endsection

