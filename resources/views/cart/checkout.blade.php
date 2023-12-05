<form action="{{ route('cart.checkout') }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" name="stripe_email" placeholder="Adres e-mail" required class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="stripe_token" placeholder="Token płatności" required class="form-control">
    </div>
    <!-- Dodaj inne pola do płatności, takie jak numer karty, data ważności itp. -->
    <button type
