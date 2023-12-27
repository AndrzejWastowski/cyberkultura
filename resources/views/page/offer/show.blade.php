
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
        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
          <div class="product-details">
            <h3 class="mb-0">
                <h6 class="font-w-6 text-primary animated3 mb-2">{!!  $offer->translations[0]->short_description  !!}</h6>
                <h1 class="mb-3 animated3 font-w-5"><span class="font-w-8">{{  $offer->translations[0]->name }}</span></h1>
          </h3>
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
              <li>Kategoria :<span class="text-muted"> {{ $offer->categories->name }}</span>
              </li>
            </ul>
            <p class="mb-4">{!! $offer->translations[0]->lead !!}</p>
            <div class="d-sm-flex align-items-center mb-5">

            </div>
            <div class="d-sm-flex align-items-center mt-5">
              <button class="btn btn-primary btn-animated me-sm-4 mb-3 mb-sm-0"><i class="las la-shopping-cart me-1"></i>Zapytaj o produkt</button>
              <a class="btn btn-animated btn-dark" href="#"> <i class="lar la-heart me-1"></i>Dodaj do ulubionych
              </a>
            </div>
            <div class="d-flex align-items-center border-top border-bottom py-4 mt-5">
              <h6 class="mb-0 me-4">Udostępnij:</h6>
              <ul class="list-inline">
            <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#"><i class="la la-facebook"></i></a>
            </li>
            <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2" href="#"><i class="la la-instagram"></i></a>
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
                <table class="table table-bordered mb-0">
                  <tbody>
                    <tr>
                      <td>Size</td>
                      <td>Small, Medium, Large &amp; Extra Large</td>
                    </tr>
                    <tr>
                      <td>Color</td>
                      <td>Yellow, Red, Blue, Green &amp; Black</td>
                    </tr>
                    <tr>
                      <td>Chest</td>
                      <td>38 inches</td>
                    </tr>
                    <tr>
                      <td>Waist</td>
                      <td>20 cm</td>
                    </tr>
                    <tr>
                      <td>Length</td>
                      <td>35 cm</td>
                    </tr>
                    <tr>
                      <td>Fabric</td>
                      <td>Cotton, Silk &amp; Synthetic</td>
                    </tr>
                    <tr>
                      <td>Warranty</td>
                      <td>6 Months</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab3-3">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <div class="shadow-sm text-center p-5">
                      <h4>Based on 3 Reviews</h4>
                      <h5>Average</h5>
                      <h4>4.0</h4>
                      <h6>(03 Reviews)</h6>
                    </div>
                  </div>
                  <div class="col-md-6 mt-3 mt-lg-0">
                    <div class="rating-list">
                      <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3">5 Star</div>
                        <div class="w-100">
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div><span class="text-muted ms-3">90%</span>
                      </div>
                      <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3">4 Star</div>
                        <div class="w-100">
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div><span class="text-muted ms-3">60%</span>
                      </div>
                      <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3">3 Star</div>
                        <div class="w-100">
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div><span class="text-muted ms-3">40%</span>
                      </div>
                      <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3">2 Star</div>
                        <div class="w-100">
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div><span class="text-muted ms-3">20%</span>
                      </div>
                      <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3">1 Star</div>
                        <div class="w-100">
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div><span class="text-muted ms-3">10%</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="review-list mt-5">
                  <div class="d-sm-flex mt-5">
                    <div class="flex-shrink-0">
                      <img class="img-fluid align-self-center rounded me-md-3 mb-3 mb-md-0" alt="image" src="assets/images/thumbnail/01.jpg">
                    </div>
                    <div class="flex-grow-1 ms-sm-3 mt-4 mt-sm-0">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0">Ember Lana</h6>
                        <small class="mx-3 text-muted">April 09, 2020</small>
                        <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
                        </div>
                      </div>
                      <p class="mb-0 mt-3">Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi.</p>
                    </div>
                  </div>
                  <div class="d-sm-flex mt-5">
                    <div class="flex-shrink-0">
                      <img class="img-fluid align-self-center rounded me-md-3 mb-3 mb-md-0" alt="image" src="assets/images/thumbnail/02.jpg">
                    </div>
                    <div class="flex-grow-1 ms-sm-3 mt-4 mt-sm-0">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0">Scott Jones</h6>
                        <small class="mx-3 text-muted">March 15, 2020</small>
                        <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
                        </div>
                      </div>
                      <p class="mb-0 mt-3">Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi.</p>
                    </div>
                  </div>
                  <div class="d-sm-flex mt-5">
                    <div class="flex-shrink-0">
                      <img class="img-fluid align-self-center rounded me-md-3 mb-3 mb-md-0" alt="image" src="assets/images/thumbnail/03.jpg">
                    </div>
                    <div class="flex-grow-1 ms-sm-3 mt-4 mt-sm-0">
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0">Amber Holmes</h6>
                        <small class="mx-3 text-muted">February 26, 2020</small>
                        <div class="star-rating"><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
                        </div>
                      </div>
                      <p class="mb-0 mt-3">Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi.</p>
                    </div>
                  </div>
                </div>
                <div class="mt-8 shadow p-5">
                  <div class="section-title mb-3">
                    <h4>Add a review</h4>
                  </div>
                  <form id="contact-form" class="row" method="post" action="contact.php">
                    <div class="messages"></div>
                    <div class="form-group col-sm-6">
                      <input id="form_name" type="text" name="name" class="form-control" placeholder="Your Name" required="required" data-error="Name is required.">
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-sm-6">
                      <input id="form_email" type="email" name="email" class="form-control" placeholder="Your Email Address" required="required" data-error="Valid email is required.">
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group clearfix col-12">
                      <select class="form-select form-control">
                        <option value="">Rating -- Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                    <div class="form-group col-12">
                      <textarea id="form_message" name="message" class="form-control" placeholder="Write Your Review" rows="4" required="required" data-error="Please,leave us a review."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary btn-animated mt-3">Post Review</button>
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

