<!-- resources/views/products/edit.blade.php -->
@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $product->translations->first()->name }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ $product->translations->first()->description }}</textarea>

        <button type="submit">Update</button>
    </form>

    <!--to-top Start-->
    <div id="section-to-top">
        <div class="sigma_top">
            <i class="far fa-arrow-up"></i>
        </div>
        <!--to-top End-->
    </div>
@endsection
