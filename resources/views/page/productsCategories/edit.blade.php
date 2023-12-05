@extends('layouts.app')

@section('content')
    <h1>Edytuj kategorię</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nazwa kategorii:</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        </div>

        <button type="submit">Zapisz</button>
    </form>
@endsection
