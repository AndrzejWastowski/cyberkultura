@if (count($cartItems) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nazwa produktu</th>
                <th>Ilość</th>
                <th>Cena</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->product->name }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>{{ $cartItem->product->price }}</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="products_id" value="{{ $cartItem->products->id }}">
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('cart.update') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Nazwa produktu</th>
                    <th>Ilość</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->product->name }}</td>
                        <td>
                            <input type="hidden" name="cart_items[{{ $cartItem->product->id }}][product_id]"
                                value="{{ $cartItem->product->id }}">
                            <input type="number" name="cart_items[{{ $cartItem->product->id }}][quantity]"
                                value="{{ $cartItem->quantity }}" class="form-control">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Aktualizuj koszyk</button>
    </form>
@else
    <p>Koszyk jest pusty.</p>
@endif
