@extends('panel.app')
@section('content')
<div class="pagetitle">
    <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}} organizacji</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/panel">Panel</a></li>
        <li class="breadcrumb-item"><a href="{{ route('panel.organization.list') }}">Organizacje</a></li>
        <li class="breadcrumb-item active">{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  @if ($errors->any())
  <div class="alert alert-danger mt-2">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

    <div class="container" >
        <form id="myForm" action="{{ $action == 'create' ? route('panel.organization.create') : route('panel.organization.update', $organization)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
            @endif

            <div class="card" id="news">
                <div class="card-body">
                    <div class="col-md-8">
                        <h5 class="card-title">Nazwa</h5>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $organization->name }}" required>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="card-city">Miasto</h5>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $organization->city }}" required>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-postcode">Kod pocztowy</h5>
                            <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $organization->postcode == null ? '99-300' : $organization->postcode }}" required>
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-country">Kraj</h5>
                            <input type="text" class="form-control" id="country" name="country" value="{{ $organization->country == null ? 'Polska' : $organization->country }}"  required>
                        </div>
                        <div class="col-md-12">
                            <h5 class="card-street">Ulica</h5>
                            <input type="text" class="form-control" id="street" name="street" value="{{ $organization->street }}" required>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Krótki opis organizacji</h5>

                    <!-- Quill Editor Full -->

                    <div id="description-editor" style="block-size: 250px;">
                        <p>{!! $organization->description !!} </p>
                    </div>
                    <input type="hidden" id="hidden-description" name="description">
                    <!-- End Quill Editor Full -->

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="card-title">Długość geo. lng</h5>
                            <input type="text" class="form-control" id="lng" name="lng" value="{{ $organization->lng }}" >
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-title">Szerokość geo. lat</h5>
                            <input type="text" class="form-control" id="lat" name="lat" value="{{ $organization->lat }}" >
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <h5 class="card-title">www</h5>
                        <input type="text" class="form-control" id="www" name="www" value="{{ $organization->www }}" >
                    </div>
                </div>
            </div>

            <hr>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Dodaj' : 'Edytuj' }} </button>
            </div>
        </form>

    </div>


@endsection

@section ('script')
<script>
document.addEventListener('DOMContentLoaded', function () {


    // Konfiguracja edytora dla pola "Description"
    var descriptionEditorOptions = {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{'align': 'left'}, {'align': 'center'}, {'align': 'right'}, {'align': 'justify'}],
                ['blockquote', 'code-block'],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                ['clean']
            ]
        },

        theme: 'snow'
    };

        // Inicjalizacja edytora dla pola "Description"
        var descriptionEditor = new Quill('#description-editor', descriptionEditorOptions);

        // Pobierz formularz
        var form = document.getElementById('myForm');

        // Dodaj obsługę zdarzenia submit formularza
        form.onsubmit = function() {

        // Pobierz zawartość edytorów Quill

        var descriptionContent = descriptionEditor.root.innerHTML;
        document.getElementById('hidden-description').value = descriptionContent;
    }
});
</script>
@endsection