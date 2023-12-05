<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <!--hero section start-->

    <section class="bg-light">
        <div class="container">
            <div class="row align-items-center">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb bg-transparent p-0 m-0 ">
                            <li class="breadcrumb-item"><a class="text-dark" href="#">
                                    <i class="las la-home me-1"></i>Cyberkultura</a>
                            </li>
							<li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="Sklep z gadżetami reklamowymi">Produkty</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products.category',['category'=>$product->categories->first(),'name'=>$category->translation_name->first()->name]) }}" title="{{ $category->translation_name->first()->name }}"> {{ $category->translation_name->first()->name }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products.show',['product' => $product]) }}" title="{{ $category->translation_name->first()->name }}">{{ $product->translations->first()->name }}</a></li>
                        </ol>
                    </nav>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>

    <!--hero section end-->
    <!--body content start-->

    <div class="page-content">

        <!--product details start-->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <ul id="imageGallery">
                            <li data-thumb="{{ asset('/assets/images/product/01.jpg') }}"
                                data-src="assets/images/product/01.jpg">
                                <img class="img-fluid w-100" src="{{ asset('/assets/images/product/01.jpg') }}"
                                    alt="" />
                            </li>
                            <li data-thumb="{{ asset('/assets/images/product/02.jpg') }}"
                                data-src="{{ asset('/assets/images/product/02.jpg') }}">
                                <img class="img-fluid w-100" src="{{ asset('/assets/images/product/02.jpg') }}"
                                    alt="" />
                            </li>
                            <li data-thumb="{{ asset('/assets/images/product/03.jpg') }}"
                                data-src="{{ asset('/assets/images/product/03.jpg') }}">
                                <img class="img-fluid w-100" src="{{ asset('/assets/images/product/03.jpg') }}"
                                    alt="" />
                            </li>
                            <li data-thumb="{{ asset('/assets/images/product/04.jpg') }}"
                                data-src="{{ asset('/assets/images/product/04.jpg') }}">
                                <img class="img-fluid w-100" src="{{ asset('/assets/images/product/04.jpg') }}"
                                    alt="" />
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                        <div class="product-details">
                            <h3 class="mb-0">
                                {{ $product->translations->first()->name }}
                            </h3>
                            <div class="star-rating mb-4"><i class="las la-star"></i><i class="las la-star"></i><i
                                    class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i>
                            </div>
                            <span class="product-price h4">{{ $product->pricing->first()->price_per_unit }} pln
                                <del class="text-muted h6">$35.00</del>
                            </span>
                            <ul class="list-unstyled my-4">
                                <li class="mb-2">{{ trans('messages.availability') }} <span class="text-muted"> na stanie - wysłka 1 dzień</span>
                                </li>
                                @foreach ( $category->translation_name as $cat )
                                    <li>{{ trans('messages.category') }} :<span class="text-muted"> {{  $cat->name }}</span></li>
                                @endforeach

                            </ul>
                            <p class="mb-4">{{ $product->translations->first()->short_description }}</p>
                            <div class="d-sm-flex align-items-center mb-5">
                                <div class="d-flex align-items-center me-sm-4">
                                    <button class="btn-product btn-product-up"> <i class="las la-minus"></i>
                                    </button>
                                    <input class="form-product" type="number" name="form-product" value="1">
                                    <button class="btn-product btn-product-down"> <i class="las la-plus"></i>
                                    </button>
                                </div>
                                <select class="form-select w-auto mt-3 mt-sm-0">
                                    <option selected>Size</option>
                                    <option value="1">XS</option>
                                    <option value="2">S</option>
                                    <option value="3">M</option>
                                    <option value="4">L</option>
                                    <option value="5">XL</option>
                                    <option value="6">XXL</option>
                                </select>
                                <div class="d-flex text-center ms-sm-4 mt-3 mt-sm-0 widget-color">
                                    <div class="form-check ps-0 me-3">
                                        <input type="radio" class="form-check-input" id="color-filter1" name="Radios">
                                        <label class="form-check-label" for="color-filter1" data-bg-color="#3cb371"></label>
                                    </div>
                                    <div class="form-check ps-0 me-3">
                                        <input type="radio" class="form-check-input" id="color-filter2" name="Radios"
                                            checked>
                                        <label class="form-check-label" for="color-filter2" data-bg-color="#4876ff"></label>
                                    </div>
                                    <div class="form-check ps-0 me-3">
                                        <input type="radio" class="form-check-input" id="color-filter3" name="Radios">
                                        <label class="form-check-label" for="color-filter3" data-bg-color="#0a1b2b"></label>
                                    </div>
                                    <div class="form-check ps-0">
                                        <input type="radio" class="form-check-input" id="color-filter4" name="Radios">
                                        <label class="form-check-label" for="color-filter4"
                                            data-bg-color="#f94f15"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-sm-flex align-items-center mt-5">
                                <button class="btn btn-primary btn-animated me-sm-4 mb-3 mb-sm-0"><i
                                        class="las la-shopping-cart me-1"></i>{{ trans('messages.add_to_cart') }}</button>
                                <a class="btn btn-animated btn-dark" href="#"><i class="lar icon-binocular icon-white me-1" style="color: #FF7302; fill: #ccc;"></i>{{ trans('messages.observed') }}</a>
                            </div>

                            <div class="d-flex align-items-center border-top border-bottom py-4 mt-5">
                                <h6 class="mb-0 me-4">{{ trans('messages.share') }}:</h6>
                                <ul class="list-inline">

                                    <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2">
                                        <svg viewBox="0 0 32 32" class="icon-pencil icon-binocular">
                                            <use xlink:href="#icon-binocular"></use>
                                        </svg>

                                    </li>
                                    <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2"
                                            href="#"><i class="la la-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a class="bg-white shadow-sm rounded p-2"
                                            href="#"><i class="la la-instagram"></i></a>
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
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active ms-0" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#tab3-1" type="button" role="tab" aria-selected="true">Opis produktu</a>
                                    <a class="nav-item nav-link" id="nav-tab2" data-bs-toggle="tab" data-bs-target="#tab3-2" type="button" role="tab" aria-selected="false">Specyfikacja techniczna</a>
                                    <a class="nav-item nav-link" id="nav-tab2" data-bs-toggle="tab" data-bs-target="#tab3-3" type="button" role="tab" aria-selected="false">Opinie i oceny</a>
                                </div>
                            </nav>
                            <!-- Tab panes -->
                            <div class="tab-content pt-5 p-0">
                                <div role="tabpanel" class="tab-pane fade show active" id="tab3-1">
                                    <div class="row align-items-center">
                                        <div class="col-md-7 mt-5 mt-lg-0">
                                            <h3 class="mb-3">{{ $product->translations->first()->name }}</h3>
                                            {{ $product->translations->first()->description }}

                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab3-2">
                                    <h2>{{ trans('messages.parameters') }}</h2>
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('messages.name') }}</th>
                                                <th>{{ trans('messages.value') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->attributes as $attribute)
                                                <tr>
                                                    <td>{{ $attribute->attribute_name }}</td>
                                                    <td>{{ $attribute->attribute_value }}</td>
                                                </tr>
                                            @endforeach
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
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div><span class="text-muted ms-3">90%</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="text-nowrap me-3">4 Star</div>
                                                    <div class="w-100">
                                                        <div class="progress" style="height: 5px;">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div><span class="text-muted ms-3">60%</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="text-nowrap me-3">3 Star</div>
                                                    <div class="w-100">
                                                        <div class="progress" style="height: 5px;">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 40%;" aria-valuenow="40" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div><span class="text-muted ms-3">40%</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="text-nowrap me-3">2 Star</div>
                                                    <div class="w-100">
                                                        <div class="progress" style="height: 5px;">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 20%;" aria-valuenow="20" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div><span class="text-muted ms-3">20%</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="text-nowrap me-3">1 Star</div>
                                                    <div class="w-100">
                                                        <div class="progress" style="height: 5px;">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 10%;" aria-valuenow="10" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div><span class="text-muted ms-3">10%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-list mt-5">
                                       @foreach ($product->opinions as $opinion  )
                                        <div class="d-sm-flex mt-5">
                                            <div class="flex-shrink-0">
                                                <img class="img-fluid align-self-center rounded me-md-3 mb-3 mb-md-0"
                                                    alt="image" src="assets/images/thumbnail/01.jpg">
                                            </div>
                                            <div class="flex-grow-1 ms-sm-3 mt-4 mt-sm-0">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="mb-0">{{  $opinion->user_name  }}</h6>
                                                    <small class="mx-3 text-muted"> {{  $opinion->date  }}</small>
                                                    <div class="star-rating"><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i><i
                                                            class="las la-star"></i><i class="las la-star"></i>
                                                    </div>
                                                </div>
                                                <p class="mb-0 mt-3">{{  $opinion->desription  }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-8 shadow p-5">
                                        <div class="section-title mb-3">
                                            <h4>{{ trans('messages.add_a_opinion') }}</h4>
                                        </div>
                                        <form id="contact-form" class="row" method="post" action="contact.php">
                                            <div class="messages"></div>
                                            <div class="form-group col-sm-6">
                                                <input id="form_name" type="text" name="name" class="form-control"
                                                    placeholder="Your Name" required="required"
                                                    data-error="Name is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <input id="form_email" type="email" name="email"
                                                    class="form-control" placeholder="Your Email Address"
                                                    required="required" data-error="Valid email is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group clearfix col-12">
                                                <select class="form-select form-control">
                                                    <option value="">{{ trans('messages.rating_select') }}</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12">
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Write Your Review" rows="4"
                                                    required="required" data-error="Please,leave us a review."></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-animated mt-3">{{ trans('messages.post_opinion') }}</button>
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
    @endsection
