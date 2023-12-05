@extends('panel.app')
@section('content')
<div class="pagetitle">
    <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}} wydarzenia</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('panel.panel') }}">Panel</a></li>
        <li class="breadcrumb-item"><a href="{{ route('panel.calendary.list') }}">Kalendarium</a></li>
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
        <form id="myForm" action="{{ $action == 'create' ? route('panel.calendary.create') : route('panel.calendary.update', $calendary)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
             @endif

            <div class="card" id="calendary">
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Tytuł</h5>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $calendary->name }}" required>
                    </div>

                



                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Kategoria</h5>
                            <select class="form-select" id="category_id" name="category_id" required>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id === $calendary->category_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-title">Data</h5>
                            <div class="col-sm-10">
                                <input id="date" type="datetime-local" name="date" value="{{ $calendary->date }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Lokalizacja</h5>
                            <select class="form-select" id="localizations_id" name="localizations_id" required>
                                @foreach ($localizations as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id === $calendary->localizations_id ? 'selected' : '' }}>
                                        {{ $item->name  }} - {{ $item->city }} / {{ $item->street }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Organizacja</h5>
                            <select class="form-select" id="organizations_id" name="organizations_id" required>
                                @foreach ($organizations as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id === $calendary->organizations_id ? 'selected' : '' }}>
                                        {{ $item->name  }} - {{ $item->city }} / {{ $item->street }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Opis wydarzenia</h5>
                    <div id="description-editor" style="block-size: 250px;">
                        <p>{!! $calendary->description !!} </p>
                    </div>
                    <input type="hidden" id="hidden-description" name="description">
                </div>
            </div>

            <hr>
 <!-- Podwydarzenia -->
 <div id="subevents_container">
    <!-- Tymczasowo puste - pola dla podwydarzeń zostaną tutaj dodane -->
</div>

<button type="button" id="add_subevent" class="btn btn-primary mt-3">Dodaj podwydarzenie</button>
<hr>

            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Zdjęcie / Plakat</h5>
                    </div>
                    <div id="progressBar" style="inline-size: 0%;"></div>
                    <div class="col-sm-10">
                        <input type="file" id ="images" name="images[]" multiple accept="image/*" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Dodaj' : 'Edytuj' }} </button>
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title" id="photos">Już dodane</h5>
                </div>

                @foreach ($calendary->photo as $photo)
                    <div class="row mb-3" id="photo_{{ $photo->id }}">
                        <div class="col-3">
                            <img src="{{ asset('/calendary/'.$calendary->id.'/gallery/'.$photo->name.'m.webp') }}" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <form action="{{ route('panel.calendary.edit_photos') }}" method="POST" >
                                <div class="form-group">
                                    <label for="description" class="form-label">Podpis zdjęcia: </label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ $photo->description }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                            @csrf
                                            @method('PUT')
                                                <div class="form-check">
                                                    <input type="hidden" name="news_id" value="{{ $news->id  }}">
                                                    <input type="hidden" name="photo_id" value="{{ $photo->id  }}">
                                                    <label for="top" class="Czy główne:">Czy główne:</label>
                                                    <input type="checkbox" class="form-check-input" name="top" id="top" value="1" {{  $photo->top  == "1" ? "checked" : "" }}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="localization" class="form-label">Lokalizacja</label>
                                                    <select class="form-select" id="localization" name="localization" required>
                                                        @foreach ($localizationOptions as $item)
                                                            <option value="{{ $item }}" {{ $item === $photo->localization ? 'selected' : '' }}>
                                                                {{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                </div>
                                <div class="col-3 mt-4">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary" type="submit">Zapisz zmianę</button>
                                    </div>
                                </div>
                                    </form>
                                <div class="col-3 mt-4">
                                    <form action="{{ route('panel.news.destroy_photos', $photo->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Skasuj zdjęcie</button>
                                    </form>
                                </div>
                                <form method="POST" action="{{ route('panel.news.changeOrderPhoto', ['photo' => $photo->id]) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-primary" type="submit" name="action" value="up">Góra ^</button>
                                    <button class="btn btn-sm btn-primary" type="submit" name="action" value="down">Dół v</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection


@section ('script')
<script>

const categoriesFromDB = @json($category);
const subCategoriesFromDB = @json($subcategory);

document.getElementById('add_subevent').addEventListener('click', function() {
    const container = document.getElementById('subevents_container');
    const index = container.children.length;

    // Tworzymy nowy rząd dla podwydarzenia
    const rowDiv = document.createElement('div');
    rowDiv.classList.add('row', 'mt-3');
    container.appendChild(rowDiv);

    // Dodajemy nazwę podwydarzenia w jednej kolumnie
    const nameCol = document.createElement('div');
    nameCol.classList.add('col-md-4');
    const subeventName = document.createElement('input');
    subeventName.setAttribute('type', 'text');
    subeventName.setAttribute('name', `subevents[${index}][name]`);
    subeventName.setAttribute('placeholder', 'Nazwa podwydarzenia');
    subeventName.classList.add('form-control');
    nameCol.appendChild(subeventName);
    rowDiv.appendChild(nameCol);


    //<input id="date" type="datetime-local" name="date" value="{{ $calendary->date }}" class="form-control">
    // Dodajemy datę podwydarzenia w kolejnej kolumnie

    const subeventDate = document.createElement('input');
    subeventDate.setAttribute('type', 'datetime-local');
    subeventDate.setAttribute('name', `subevents[${index}][date]`);
    subeventDate.setAttribute('placeholder', 'Data podwydarzenia');
    subeventDate.classList.add('form-control');
    dateCol.appendChild(subeventDate);
    rowDiv.appendChild(dateCol);

    // Dodajemy kategorię podwydarzenia w kolejnej kolumnie
    const subCategoryCol = document.createElement('div');
    subCategoryCol.classList.add('col-md-4');
    const subeventSubCategory = document.createElement('select');
    subeventSubCategory.setAttribute('name', `subevents[${index}][subcategory]`);
    subeventSubCategory.classList.add('form-control');
    subCategoriesFromDB.forEach(subcategory => {
        const option = document.createElement('option');
        option.value = subcategory.id;
        option.textContent = subcategory.name;
        subeventSubCategory.appendChild(option);
    });
    subCategoryCol.appendChild(subeventSubCategory);
    rowDiv.appendChild(subCategoryCol);
});

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


// Utworzenie pola select dla kategorii
const categorySelect = document.createElement('select');
categorySelect.setAttribute('name', `subevents[${index}][category]`);
categorySelect.classList.add('form-control');

categoriesFromDB.forEach(category => {
    const option = document.createElement('option');
    option.value = category.id;
    option.textContent = category.name;
    categorySelect.appendChild(option);
});

// Utworzenie pola select dla podkategorii (początkowo puste)
const subcategorySelect = document.createElement('select');
subcategorySelect.setAttribute('name', `subevents[${index}][subcategory]`);
subcategorySelect.classList.add('form-control');

categorySelect.addEventListener('change', function() {
    // Kiedy wartość w kategorii się zmienia, używamy AJAX do pobrania odpowiednich podkategorii
    fetch(`/get-subcategories/${this.value}`)
        .then(response => response.json())
        .then(data => {
            // Czyszczenie poprzednich opcji
            subcategorySelect.innerHTML = '';

            // Dodawanie nowych opcji do podkategorii
            data.forEach(subcategory => {
                const option = document.createElement('option');
                option.value = subcategory.id;
                option.textContent = subcategory.name;
                subcategorySelect.appendChild(option);
            });
        });
});


</script>
@endsection
