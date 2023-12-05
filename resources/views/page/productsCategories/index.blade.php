@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->translations->first()->name }}
            </li>
        @endforeach
    </ul>
    @endsection
