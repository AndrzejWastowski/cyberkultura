
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

        <section>
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-4 mt-6 mt-lg-0">
                        <div class="shadow-sm rounded p-5">
                            <div class="mb-5">
                                <h6 class="text-primary mb-1">Nasza oferta</h6>
                                <h4 class="mb-0">W czym możemy Ci pomóc?</h4>
                            </div>
                            @foreach ($offers as $item)

                                <div class="d-flex mb-3">
                                    <div class="me-2"> <i class="las la-map ic-2x text-primary"></i></div>
                                    <div>
                                        <h6 class="mb-1 text-dark"><a href="{{ route('page.offer.show',[ $item->id, $item->link]) }}">{{  $item->name }}</a></h6>
                                        <p class="mb-0 text-muted">{!!  $item->short_description !!}</p>
                                    </div>
                                </div>
                            @endforeach

                            <ul class="list-inline">
                                <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#">
                                    <i class="la la-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#">
                                    <i class="la la-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#">
                                    <i class="la la-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row">
                            <h6 class="font-w-6 text-primary animated3 mb-2">{!!  $offer->translations[0]->short_description  !!}</h6>
                            <h1 class="mb-3 animated3 font-w-5"><span class="font-w-8">{{  $offer->translations[0]->name }}</span></h1>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-lg-5 col-md-12 order-lg-1">
                            @if(isset($offer->photo[0]->name) && !empty($offer->photo[0]->name))
                                <img class="img-fluid" src="{{ '/offer/'.$offer->id.'/gallery/'.$offer->photo[0]->name.'kw.webp' }}"  alt="{{ $offer->photo[0]->signature ? $offer->photo[0]->signature : $offer->name }}">
                            @else
                                <img class="img-fluid" src="{{ '/offer/cyberkultura_m.webp' }}"  alt="">
                            @endif

                          </div>
                          <div class="col-lg-7 col-md-12 mt-5 mt-lg-0">
                            <p class="mb-4 animated3">{!!  $offer->translations[0]->lead !!}</p>
                            <div class="mb-5">
                                {!! $offer->translations[0]->description !!}
                            </div>

                          </div>
                        </div>
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
