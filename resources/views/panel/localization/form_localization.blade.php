@extends('panel.app')
@section('content')
<div class="pagetitle">
    <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}} lokalizacji (miejsca)</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/panel">Panel</a></li>
        <li class="breadcrumb-item"><a href="{{ route('panel.localization.list') }}">Lokalizacje</a></li>
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
        <form id="myForm" action="{{ $action == 'create' ? route('panel.localization.create') : route('panel.localization.update', $localization)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
            @endif

            <div class="card" id="news">
                <div class="card-body">
                    <div class="col-md-8">
                        <h5 class="card-title">Nazwa</h5>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $localization->name }}" required>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <h5 class="card-title">Organizacja do którer należy dana lokalizacja</h5>
                        <select class="form-select" id="organizations_id" name="organizations_id" >
                            @foreach ($organizations as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id === $localization->organizations_id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="card-city">Miasto</h5>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $localization->city }}" required>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-postcode">Kod pocztowy</h5>
                            <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $localization->postcode == null ? '99-300' : $localization->postcode }}" required>
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-country">Kraj</h5>
                            <input type="text" class="form-control" id="country" name="country" value="{{ $localization->country == null ? 'Polska' : $localization->country }}"  required>
                        </div>
                        <div class="col-md-12">
                            <h5 class="card-street">Ulica</h5>
                            <input type="text" class="form-control" id="street" name="street" value="{{ $localization->street }}" required>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Krótki opis lokalizacji</h5>

                    <!-- Quill Editor Full -->

                    <div id="description-editor" style="block-size: 250px;">
                        <p>{!! $localization->description !!} </p>
                    </div>
                    <input type="hidden" id="hidden-description" name="description">
                    <!-- End Quill Editor Full -->

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="card-title">Długość geo. lng</h5>
                            <input type="text" class="form-control" id="lng" name="lng" value="{{ $localization->lng }}" >
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-title">Szerokość geo. lat</h5>
                            <input type="text" class="form-control" id="lat" name="lat" value="{{ $localization->lat }}" >
                        </div>
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