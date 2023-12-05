@extends('panel.app')

@section('content')
    <div class="container">
        <h1>{{ $action == 'create' ? 'Dodaj' :  'Edytuj' }} Galerię</h1>
        <form id="myForm" action="{{ $action == 'create' ? route('panel.gallery.category_create') : route('panel.gallery.category_update',$category)}}" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
             @endif


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $action == 'create' ? 'Dodaj' : 'Edytuj' }} galerię</h5>
                    <div class="col-md-6">
                        <h5 class="card-title">Nazwa galerii</h5>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Filtr</h5> (krótka nazwa, może być z myślnikiem! (koniecznie bez spacji!) <b>przykład: kwiatki-bratki)</b>
                        <input type="text" class="form-control" id="filtr" name="filtr" value="{{ $category->filtr }}" required>
                    </div>
                </div>

            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Dodaj' : 'Edytuj' }} </button>
            </div>
        </form>
    </div>

@endsection
