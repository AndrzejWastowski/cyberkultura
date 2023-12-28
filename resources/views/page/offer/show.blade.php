
@extends('layouts.app')

@section('content')


    <!--hero section start-->

    <section class="bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h2 mb-0">Oferta</h1>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a class="text-dark" href="#"><i
                                        class="las la-home me-1"></i>Start</a>
                            </li>
                            <li class="breadcrumb-item">Strona</li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Oferta</li>
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


  <section class="product-right">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-12 order-lg-1">
          <ul id="imageGallery">
@php
  $path_m  = 'resources/offers/cyberkultura_oferta.webp';
@endphp
            @foreach ($offer->photo as $photo)

                @php
                    $patch_kw = 'resources/offers/'.$offer->id.'/gallery/'.$photo->name.'kw.webp';
                    $patch_m = 'resources/offers/'.$offer->id.'/gallery/'.$photo->name.'m.webp';
                    $patch_d = 'resources/offers/'.$offer->id.'/gallery/'.$photo->name.'d.webp';
                @endphp

                <li data-thumb="{{ asset($patch_kw) }}" data-src="{{ asset($patch_kw) }}">
                    <img class="img-fluid w-100" src="{{ asset($patch_d) }}" alt="" />
                  </li>


        @endforeach


          </ul>
        </div>
        <h3 class="mb-0">
          <h6 class="font-w-6 text-primary animated3 mb-2">{!!  $offer->translations[0]->short_description  !!}</h6>
          <h1 class="mb-3 animated3 font-w-5"><span class="font-w-8">{{  $offer->translations[0]->name }}</span></h1>
    </h3>
        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
          <div class="product-details">
            <div class="star-rating mb-4"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
            </div>
            <ul class="list-unstyled my-4">
              <li class="mb-2">Dostępność: <span class="text-muted">
                @switch($offer->availability)
                    @case(0)
                       <span class="text-success"> Na miejscu</span>
                        @break

                    @case(2)
                        Na drugi dzień
                        @break

                    @case(3)
                        3 dni
                        @break
                    @case(7)
                        około tygodnia
                        @break
                    @case(100)
                        niedostępne
                    @break
                    @default
                        na miejscu
                @endswitch

                </span>
              </li>

              <li>Kategoria :<span class="text-muted"> {{ $offer->categories->name }}</span> </li>
            </ul>
            <p class="mb-4">{!! $offer->translations[0]->lead !!}</p>
            <div class="d-sm-flex align-items-center mb-5">

            </div>
            <div class="d-sm-flex align-items-center mt-5">
              <button class="btn btn-primary btn-animated me-sm-4 mb-3 mb-sm-0"><i class="las la-shopping-cart me-1"></i>Zapytaj o produkt</button>
            </div>
            <div class="d-flex align-items-center border-top border-bottom py-4 mt-5">
              <ul class="list-inline">
                  <li class="list-inline-item">
                    <div id="fb-root"></div>
                    <div class="fb-share-button" data-href="{{ route('page.offer.show',[$offer->id,'name'=>$offer->translations[0]->name]) }}" data-layout="button_count"></div>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--product details end-->

  <!--tab start-->

  <section class="p-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="tab">
            <!-- Nav tabs -->
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link active ms-0" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#tab3-1" type="button" role="tab" aria-selected="true">Opis</a>
                <a class="nav-item nav-link" id="nav-tab2" data-bs-toggle="tab" data-bs-target="#tab3-2" type="button" role="tab" aria-selected="false">Specyfikacja</a>
                <a class="nav-item nav-link" id="nav-tab3" data-bs-toggle="tab" data-bs-target="#tab3-3" type="button" role="tab" aria-selected="false">Opinie klientów</a>
              </div>
            </nav>
            <!-- Tab panes -->
            <div class="tab-content pt-5 p-0">
              <div role="tabpanel" class="tab-pane fade show active" id="tab3-1">
                <div class="row align-items-center">
                  <div class="col-md-5">
                    @foreach ($offer->photo as $photo)
                    @php
                        $patch = 'resources/offers/'.$offer->id.'/gallery/'.$photo->name.'kw.webp';
                    @endphp
                    @if ($photo->top) <img class="img-fluid  w-100"" src="{{ asset($patch) }}" alt="{{ $offer->translations[0]->name  }}"> @endif
                  @endforeach
                  </div>
                  <div class="col-md-7 mt-5 mt-lg-0">
                    <h3 class="mb-3">{{  $offer->translations[0]->name }}</h3>
                    {!!  $offer->translations[0]->lead !!}
                    <p class="mb-5">{!!  $offer->translations[0]->description !!}</a>
                  </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab3-2">
                <p class="mb-5">{!!  $offer->translations[0]->specyfication !!}</a>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab3-3">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <div class="shadow-sm text-center p-5">
                      <h4>Opinie klientów</h4>
                      <h5>Średnia</h5>
                      <h4>{{ round($averageRating,1) }}</h4>
                      <h6>ocen: {{ $commentsCount }}</h6>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3 mt-lg-0">
                    <div class="rating-list">
                      @php $style='bg-success' @endphp
                      @foreach ($ratings as $rating => $percentage)
                        @switch  ($rating)
                          @case (1)
                            @php $style='bg-danger' @endphp
                          @break
                          @case (2)
                            @php $style='bg-warning' @endphp
                          @break
                          @case (3)
                            @php $style='bg-info' @endphp
                          @break
                          @case (4)
                            @php $style='bs-teal' @endphp
                          @break
                          @case (5)
                            @php $style='bg-success' @endphp
                          @break
                        @endswitch


                      <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3">{{ $rating }} Star</div>
                        <div class="w-100">
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar {{ $style }}" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div><span class="text-muted ms-3">{{ round($percentage, 2) }}%</span>
                      </div>
                      @endforeach


                    </div>
                  </div>
                </div>
                <div class="review-list mt-5">

                  @foreach ($offer->comments as $comment)
                  <div class="d-sm-flex mt-5">
                    <div class="flex-shrink-0">
                      <img class="img-fluid align-self-center rounded me-md-3 mb-3 mb-md-0" alt="image" src="{{ asset('assets/images/thumbnail/01.jpg') }}">
                    </div>
                    <div class="flex-grow-1 ms-sm-3 mt-4 mt-sm-0">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0">{{ $comment->signature }}</h6>
                        <small class="mx-3 text-muted">{{ $comment->date_add }}</small>
                        <div class="star-rating">
                          @php $pom=0; @endphp
                          @for ($pom;$pom<$comment->rating;$pom++)
                            <i class="las la-star"></i>
                          @endfor
                        </div>
                      </div>
                      <p class="mb-0 mt-3">{{ $comment->content }}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="mt-8 shadow p-5">
                  <div class="section-title mb-3">
                    <h4>Dodaj ocenę i komentarz</h4>
                  </div>
                  <form id="contact-form" class="row" method="post" action="{{ route('page.offer.comment_send') }}">
                    <div class="messages"></div>
                    <div class="form-group col-sm-6">
                      <input id="form_name" type="text" name="name" class="form-control" placeholder="Twoje Imię / Podpis" required="required" data-error="imię lub podpis są wymagane.">
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-sm-6">
                      <input id="form_email" type="email" name="email" class="form-control" placeholder="E-mail" required="required" data-error="Poprawny adres e-mail jest wymagany.">
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group clearfix col-12">
                      <select class="form-select form-control">
                        <option value="">Ocena -- Wybierz</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                    <div class="form-group col-12">
                      <textarea id="form_message" name="message" class="form-control" placeholder="Napisz swój komentarz" rows="4" required="required" data-error="Prosze napisać komentarz"></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary btn-animated mt-3">Wyśli komentarz</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--tab end-->


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
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13823.304759166716!2d19.349101252247262!3d52.231791932898055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471b9bc2b7c00af1%3A0x73a188da3efc8f83!2sCyberkultura!5e0!3m2!1spl!2spl!4v1684497188909!5m2!1spl!2spl"
                                class="w-100 h-100 border-0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<title>Cyberkultura - {{ $offer->translations[0]->name }} - {{ $offer->translations[0]->short_description }} </title>

<meta property="og:title" content="Cyberkultura oferta - {{ $offer->translations[0]->name.' - '.strip_tags($offer->translations[0]->short_description) }}">
<meta property="og:description" content="{{ strip_tags($offer->translations[0]->lead) }}">
<meta property="og:image" content="https://cyberkultura.pl/{{ $path_m }}">
<meta property="og:url" content="http://cyberkultura.pl/oferta/{{ $offer->id }}/{{ $offer->translations[0]->link }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:site_name" content="Cyberkultura - pieczątki, druk/ksero A3/A4 wizytówki zaproszenia ślubne i okolicznościowe, winietki Kutno">
<meta property="fb:app_id" content="1234567890">
@endsection


