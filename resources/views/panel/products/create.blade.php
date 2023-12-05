<!-- resources/views/products/create.blade.php -->

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <label for="name">Nazwa:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Opis towaru:</label>
    <textarea name="description" id="description" required></textarea>

    <button type="submit">Dodaj produkt</button>
</form>