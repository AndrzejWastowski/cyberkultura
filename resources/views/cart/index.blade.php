@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cart</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($cartItems->isEmpty())
            <div class="alert alert-info">Koszyk jest pusty.</div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem->products->translations_locale->first()->name }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="products_id" value="{{ $cartItem->products_id }}">
                                    <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" max="100" required>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>{{ $cartItem->products->price }}</td>
                            <td>{{ $cartItem->products->price * $cartItem->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                <h4>Total: {{ $cartItems->sum(function ($item) {
                    return $item->products->price * $item->quantity;
                }) }}</h4>
            </div>

            
        @endif
    </div>
@endsection