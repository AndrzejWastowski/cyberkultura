@extends('layouts.app')

@section('content')
<!--hero section start-->
<section class="bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="h2 mb-0">Kontakt</h1>
        </div>
        <div class="col-md-6 mt-3 mt-md-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
              <li class="breadcrumb-item"><a class="text-dark" href="/"><i class="las la-home me-1"></i>Start</a>
              </li>
              <li class="breadcrumb-item">Strona</li>
              <li class="breadcrumb-item active text-primary" aria-current="page">Kontakt</li>
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
      <div class="row mb-5">
        <div class="col-lg-8">
          <div class="mb-5">
            <h6 class="text-primary mb-1">— Kontakt</h6>
            <h3 class="mb-0">Zanim napiszesz, sprawdź: <a href="/faq">"FAQ - pytania i odpowiedzi"</a>.</h3>
          </div>
          <form id="contact-form" class="row" method="post" action="php/contact.php">
              <div class="messages"></div>
              <div class="form-group col-md-6">
                <label class="mb-1">Imię <span class="text-danger">*</span></label>
                <input id="form_name" type="text" name="name" class="form-control" placeholder="Imię" required="required" data-error="Pole imię jest wymagane.">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-6">
                <label class="mb-1">Nazwisko <span class="text-danger">*</span></label>
                <input id="form_name1" type="text" name="surname" class="form-control" placeholder="Nazwisko" required="required" data-error="Pole nazwisko jest wymagane.">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-6">
                <label class="mb-1">Email Address <span class="text-danger">*</span></label>
                <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required="required" data-error="Wpisz poprawny email.">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-6">
                <label class="mb-1">Numer telefonu <span class="text-danger">*</span></label>
                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Telefon"  data-error="">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-12">
                <label class="mb-1">Treść: <span class="text-danger">*</span></label>
                <textarea id="form_message" name="message" class="form-control h-auto" placeholder="Treść" rows="4" required="required" data-error="Proszę wpisać wiadomość przed wysłaniem formularza."></textarea>
                <div class="help-block with-errors"></div>
              </div>
              <div class="col-md-12 mt-4">
                <button class="btn btn-primary btn-animated"><span>Wyślij</span>
                </button>
              </div>
            </form>
        </div>
        <div class="col-lg-4 mt-6 mt-lg-0">
          <div class="shadow-sm rounded p-5">
            <div class="mb-5"> 
            <h6 class="text-primary mb-1">— Dane kontaktowe</h6>
            <h4 class="mb-0">W czym możemy Ci pomóc?</h4>
          </div>
          <div class="d-flex mb-3">
            <div class="me-2"> <i class="las la-map ic-2x text-primary"></i>
            </div>
            <div>
              <h6 class="mb-1 text-dark">Sklep stacjonarny</h6>
              <p class="mb-0 text-muted">Kutno ul. Barlickiego 14<br>Polska woj. Łódzkie</p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-2"> <i class="las la-envelope ic-2x text-primary"></i>
            </div>
            <div>
              <h6 class="mb-1 text-dark">Adres e-mail</h6>
              <a class="text-muted" href="mailto:cyberkultura@op.pl">cyberkultura@op.pl</a>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-2"> <i class="las la-mobile ic-2x text-primary"></i>
            </div>
            <div>
              <h6 class="mb-1 text-dark">Telefon</h6>
              <a class="text-muted" href="tel:+48690313800">+48 690 313 800</a>
            </div>
          </div>
          <div class="d-flex mb-5">
            <div class="me-2"> <i class="las la-clock ic-2x text-primary"></i>
            </div>
            <div>
              <h6 class="mb-1 text-dark">Otwarte w goodzinach</h6>
              <span class="text-muted">Pon - Pią: <span class="">9:00 - 17:00</span><br>
              <span class="text-muted">Sobota: 9:00 - 14:00</span><br>
              <span class="text-muted">Niedziele i Święta: <span class="text-danger">zamknięte</span><br>
            </div>
          </div>
          <ul class="list-inline">
            <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="https://www.facebook.com/cyberkultura/"><i class="la la-facebook"></i></a></li>
            <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#"><i class="la la-instagram"></i></a></li>
            <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#"><i class="la la-linkedin"></i></a></li>
          </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="pt-0">
    <div class="container">
      <hr class="mt-0 mb-10">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
          <div>
            <h6 class="text-primary mb-1">— Sprawdź trasę dojazdu</h6>
            <h2 class="mb-0">Lokalizacja sklepu stacjonarnego</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="map" style="height: 500px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13823.304759166716!2d19.349101252247262!3d52.231791932898055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471b9bc2b7c00af1%3A0x73a188da3efc8f83!2sCyberkultura!5e0!3m2!1spl!2spl!4v1684497188909!5m2!1spl!2spl" class="w-100 h-100 border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('layouts.instgram')

  </div>

  <!--body content end-->

@endsection



@section('meta_tag')
<title>Cyberkultura - Skontaktuj się z nami, telefon, e-mail, formularz kontaktowy</title>

<meta property="og:title" content="Cyberkultura - Skontaktuj się z nami, telefon, e-mail, formularz kontaktowy">
<meta property="og:description" content="Skontaktuj się znami, złoż zamówienie, przeslij zlecenie e-mailem. Spytaj o wycenę">
<meta property="og:image" content="https://cyberkultura.pl/resources/cyberkultura_reklama.webp">
<meta property="og:url" content="http://cyberkultura.pl/oferta/">
<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:site_name" content="Cyberkultura - pieczątki, druk/ksero A3/A4 wizytówki zaproszenia ślubne i okolicznościowe, winietki Kutno">
<meta property="fb:app_id" content="1234567890">
@endsection