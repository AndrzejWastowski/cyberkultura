@extends('layouts.app')

@section('content')
    <h1>Dodaj kategorię</h1>

    <form action="{{ route('productsCategories.store') }}" method="POST">
        @csrf
        <div>
            @foreach (config('app.languages') as $locale => $language)
                <label for="{{ $locale }}">{{ $language }}</label>
                <input type="text" name="languages[{{ $locale }}]" id="{{ $locale }}" required>
            @endforeach
        </div>
        <button type="submit">Dodaj</button>
    </form>
 @endsection
