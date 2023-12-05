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
                        <h3 class="h3 mb-0">{{ trans('messages.products_list') }}</h3>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-md-end bg-transparent p-0 m-0">
                                <li class="breadcrumb-item">
                                    <a class="text-dark" href="#">
                                        <i class="las la-home me-1"></i>{{ env('APP_NAME') }} </i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('products.index') }}">{{ trans('messages.products') }}</a></li>
                                <li class="breadcrumb-item active text-primary active" aria-current="page"><a
                                        href="{{ route('products.category', [$category[0]['translation_name'][0]['id'], $category[0]['translation_name'][0]['name']]) }}"><strong>{{ $category[0]['translation_name'][0]['name'] }}
                                        </strong></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
        </section>
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="input-group">
                <input type="number" name="quantity" value="1" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Dodaj do koszyka</button>
                </div>
            </div>
        </form>
    </div>
@endsection
