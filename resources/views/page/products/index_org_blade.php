@extends('layouts.app')
@section('content')
    <div class="banner_top"></div>

    <div class="container">

        <div class="banner_top"></div>
        <!--hero section start-->

        <section class="bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 class="h3 mb-0">Lista produktów</h3>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
                                <li class="breadcrumb-item">
                                    <a class="text-dark" href="#">
                                        <i class="las la-home me-1"></i>Cyberkultura
                                    </a>
                                </li>
                                <li class="breadcrumb-item">Produkty</li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Wszystkie produkty</li>
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
                    <div class="row">
                        <div class="col-lg-9 col-md-12 order-lg-1">
                            <div class="row mb-4 align-items-center">
                                <div class="col-md-5 mb-3 mb-md-0">
                                    <span class="text-muted">Wyświetlam {{ $currentPage }} stronę z {{ $allPages}}  </span><br>
                                    <h7>Wszystkich produktów: {{ $totalProducts }}</h7>
                                </div>
                                <div class="col-md-7 d-flex align-items-center justify-content-md-end">
                                    <div class="view-filter"> <a href="shop-grid-left-sidebar.html">
                                            <i class="lab la-buromobelexperte"></i></a>
                                        <a class="active" href="shop-list-left-sidebar.html">
                                            <i class="las la-list"></i>
                                        </a>
                                    </div>
                                    <div class="sort-filter ms-2 d-flex align-items-center">
                                        <select class="form-select">
                                            <option selected>Wyświetl po</option>
                                            <option value="1">Nazwie produktu A-Z</option>
                                            <option value="2">Nazwie produktu Z-A</option>
                                            <option value="3">Od najwyższej ceny</option>
                                            <option value="3">Od najniższej ceny</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @foreach ($products as $product)

                                <div class="card product-card product-list mb-5">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-5">
                                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                                data-bs-placement="left" title="Add to wishlist"><i class="lar la-heart"></i>
                                            </button>
                                            <a class="card-img-hover d-block" href="#">
                                                <img class="card-img-top card-img-back" src="assets/images/product/01.jpg" alt="...">
                                                <img class="card-img-top card-img-front" src="assets/images/product/02.jpg" alt="...">
                                            </a>
                                        </div>
                                        <div class="col-lg-8 col-md-7">
                                            <div class="card-info">
                                                <div class="card-body">
                                                    <div class="product-title"><a class="link-title"
                                                            href="product-left-image.html"> {{ $product->name }}</a>
                                                    </div>
                                                    <div class="mt-1"> 
                                                        <span class="product-price">
                                                            <del class="text-muted">$35.00</del>
                                                            {{ $product->price }}
                                                        </span>
                                                        <div class="star-rating"><i class="las la-star"></i>
                                                            <i class="las la-star"></i>
                                                            <i class="las la-star"></i>
                                                            <i class="las la-star"></i>
                                                            <i class="las la-star"></i>
                                                        </div>
                                                    </div>
                                                    <p class="mb-3 mt-2">{{ $product->description }}</p>
                                                </div>
                                                <div class="card-footer bg-transparent border-0">
                                                    <div class="product-link d-flex align-items-center">
                                                        <button class="btn btn-compare" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Compare" type="button"><i
                                                                class="las la-random"></i>
                                                        </button>
                                                        <button class="btn-cart btn btn-primary btn-animated mx-3"
                                                            type="button"><i class="las la-shopping-cart me-1"></i>
                                                        </button>
                                                        <button class="btn btn-view" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Quick View"><span
                                                                data-bs-target="#quick-view" data-bs-toggle="modal"><i
                                                                    class="las la-eye"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            {{ $products->links() }}
                        </div>

                        @include('products.sidebar')
                    </div>
                </div>
            </section>

        @endsection