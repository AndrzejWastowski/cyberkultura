<!-- resources/views/products/delete.blade.php -->
@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('products.destroy', $product->id) }}">
    @csrf
    @method('DELETE')

    <p>Are you sure you want to delete this product?</p>

    <button type="submit">Delete</button>
</form>
    <!--to-top Start-->
    <div id="section-to-top">  
        <div class="sigma_top">
            <i class="far fa-arrow-up"></i>
        </div>
        <!--to-top End-->
    </div>



@endsection
