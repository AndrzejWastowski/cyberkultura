<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <!--hero section start-->
    <section class="bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="h3 mb-0">{{ $product->translations->first()->name }}</h3>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="#">
                                    <i class="las la-home me-1"></i>{{ env('APP_NAME') }} </i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ trans('messages.products') }}</a></li>
                            <li class="breadcrumb-item " aria-current="page"><a href="{{   route('products.category',[$category->translation_name->first()->id ,$category->translation_name->first()->name]) }}">{{  $category->translation_name->first()->name }} </a></li>
                            <li class="breadcrumb-item active text-primary "><a href="{{ route('products.show',['product' => $product]) }}" title="{{ $category->translation_name->first()->name }}"><strong>{{ $product->translations->first()->name }}</strong></a></li>
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
                            <span class="product-price h4">{{ $product->pricing->first()->price_per_unit }} pln</span>
                            <ul class="list-unstyled my-4">
                                <li class="mb-2">{{ trans('messages.availability') }} <span class="text-muted"> na stanie - wysłka 1 dzień</span>
                                </li>
                                @foreach ( $category->translation_name as $cat )
                                    <li>{{ trans('messages.category') }} :<span class="text-muted"> {{  $cat->name }}</span></li>
                                @endforeach

                            </ul>
                            <p class="mb-4">{{ $product->translations->first()->short_description }}</p>
                            <form action="{{ route('cart.add') }}" method="POST">
                                <div class="d-sm-flex align-items-center mb-5">
                                    <div class="d-flex align-items-center me-sm-4">
                                        <button class="btn-product btn-product-up"> <i class="las la-minus"></i>
                                        </button>
                                        <input class="form-product" type="number" name="quantity" value="1">
                                        <button class="btn-product btn-product-down"> <i class="las la-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-5">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button class="btn btn-primary btn-animated me-sm-4 mb-3 mb-sm-0" type="submit">
                                            <i class="las la-shopping-cart  me-1"></i>{{ trans('messages.add_to_cart') }}
                                        </button>
                                </div>
                            </form>
                            <div class="d-flex align-items-center border-top border-bottom py-4 mt-5">
                                <h6 class="mb-0 me-4">{{ trans('messages.share') }}:</h6>
                                <ul class="list-inline">
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
                                    <a class="nav-item nav-link active ms-0" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#tab3-1" type="button" role="tab" aria-selected="true">{{ trans('messages.products_description') }}</a>
                                    <a class="nav-item nav-link" id="nav-tab2" data-bs-toggle="tab" data-bs-target="#tab3-2" type="button" role="tab" aria-selected="false">{{ trans('messages.technical_specification') }}</a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="row">&nbsp;</div>
    </div>
<!--tab end-->
@endsection
