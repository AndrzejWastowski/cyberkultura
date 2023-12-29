
@extends('layouts.app')

@section('content')


<!--hero section start-->

<section class="bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="h2 mb-0">Frequently Asked Questions</h1>
        </div>
        <div class="col-md-6 mt-3 mt-md-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
              <li class="breadcrumb-item"><a class="text-dark" href="#"><i class="las la-home me-1"></i>Home</a>
              </li>
              <li class="breadcrumb-item">Pages</li>
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
            <div class="card border-0 active mb-4">
              <div class="card-header">
                <h6 class="mb-0">
                <a class="text-dark" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse1" aria-expanded="true">What Are The Delivery Charges ?</a>
                </h6>
              </div>
              <div id="collapse1" class="collapse show" data-bs-parent="#accordion">
                <div class="card-body text-muted">Looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered Many desktop publishing packages and web page editors now use Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</div>
              </div>
            </div>
            <div class="card border-0 mb-4">
              <div class="card-header">
                <h6 class="mb-0">
                <a class="text-dark" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse2">What Is The Estimated Delivery Time ?</a>
                </h6>
              </div>
              <div id="collapse2" class="collapse" data-bs-parent="#accordion">
                <div class="card-body text-muted">Looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered Many desktop publishing packages and web page editors now use Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</div>
              </div>
            </div>
            <div class="card border-0 mb-4">
              <div class="card-header">
                <h6 class="mb-0">
                <a class="text-dark" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse3">What To Track Order Work ?</a>
                </h6>
              </div>
              <div id="collapse3" class="collapse" data-bs-parent="#accordion">
                <div class="card-body text-muted">Looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered Many desktop publishing packages and web page editors now use Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</div>
              </div>
            </div>
            <div class="card border-0 mb-4">
              <div class="card-header">
                <h6 class="mb-0">
                <a class="text-dark" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse4">Will My Parcel Be Charged Customs And Import Charges ?</a>
                </h6>
              </div>
              <div id="collapse4" class="collapse" data-bs-parent="#accordion">
                <div class="card-body text-muted">Looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered Many desktop publishing packages and web page editors now use Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</div>
              </div>
            </div>
            <div class="card border-0 mb-4">
              <div class="card-header">
                <h6 class="mb-0">
                <a class="text-dark" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse5">Do You Ship Internationally ?</a>
                </h6>
              </div>
              <div id="collapse5" class="collapse" data-bs-parent="#accordion">
                <div class="card-body text-muted">Looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered Many desktop publishing packages and web page editors now use Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</div>
              </div>
            </div>
            <div class="card border-0">
              <div class="card-header">
                <h6 class="mb-0">
                <a class="text-dark" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse6">which is the same as saying through ?</a>
                </h6>
              </div>
              <div id="collapse6" class="collapse" data-bs-parent="#accordion">
                <div class="card-body text-muted">Looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered Many desktop publishing packages and web page editors now use Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  </div>
  
  <!--body content end--> 
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <ul>
                       
                    @foreach ($faqs as $faq) 
                        <li>
                            <a href="{{ route('page.faq.show',['question'=>$faq->question]) }}">{{ $faq->answer }}</a>
                        </li>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('meta_tag')
<title>Cyberkultura - Nasza oferta wizytówki pieczątki oprawa prac druk A3/A4 skan ksero zaproszenia bindowanie laminowanie i inne..</title>

<meta property="og:title" content="Cyberkultura - Oferta wizytówki pieczątki oprawa prac druk A3/A4 skan ksero zaproszenia bindowanie laminowanie">
<meta property="og:description" content="Kutno - mała poligrafia, drukowanie, laminowanie, kserowanie i skanowanie. Wykonujemy wizytówki ulotki zaprozenia ślubne i na inne okoliczności. Winietki na stoły. Krótkie terminy realizacji. zajmujemy się również poligrafią reklamową. Wykonujemy banery, plakaty. grawerowanie laserem w drewnie. Kubki koszulki ">
<meta property="og:image" content="https://cyberkultura.pl/{{ $path_m }}">
<meta property="og:url" content="http://cyberkultura.pl/oferta/">
<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:site_name" content="Cyberkultura - pieczątki, druk/ksero A3/A4 wizytówki zaproszenia ślubne i okolicznościowe, winietki Kutno">
<meta property="fb:app_id" content="1234567890">
@endsection

