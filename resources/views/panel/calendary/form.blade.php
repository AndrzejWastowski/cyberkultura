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
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Tytuł</h5>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $calendary->title }}" required>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-title">Ukryj</h5>

                            <input class="form-check-input" type="checkbox" value=true id="hidden" name="hidden">
                            <label class="form-check-label " for="hidden" > Ukryj na stronie</label>

                        </div>
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
                            <h5 class="card-title">Data startu</h5>
                            <div class="col-sm-10">
                                <input id="date" type="datetime-local" name="date" value="{{ $calendary->date }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Strona wydarzenia lub link do organizatora</h5>
                            <input id="link" type="text" name="link" value="{{ $calendary->link }}" class="form-control">
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
                    <div class="row">
                        <div class="col-md-2">
                            <h5 class="card-title">Wiek </h5>(0 = BO)
                            <input type="text" class="form-control" id="age" name="age" value="{{ isset($calendary->age) ? $calendary->age : '0' }}" required>
                        </div>
                        <div class="col-md-2">
                            <h5 class="card-title">Cena</h5>(0 = nie)
                            <input type="text" class="form-control" id="price" name="price" value="{{ isset($calendary->price) ? $calendary->price : '0' }}" required>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Lead wydarzenia</h5>
                    <div id="lead-editor" style="block-size: 250px;">
                        <p>{!! $calendary->lead !!} </p>
                    </div>
                    <input type="hidden" id="hidden-lead" name="lead">
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

            <div class="text-center mb-4">
                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Dodaj' : 'Edytuj' }} wydarzenie</button>
            </div>
        </form>

        @foreach ($calendary->subevents as $event)
        <form action="{{ route('panel.calendary.update_subevent', $event->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('POST')
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Nazwa wydarzenia</h5>
                        <input type="text" class="form-control" id="subevent_name" name="subevent_name" value="{{ $event->name }}" required>
                    </div>
                    <div class="col-md-2">
                        <h5 class="card-title">Cena</h5>
                        <input type="text" class="form-control" id="subevent_price" name="subevent_price" value="{{ $event->price }}" required>
                    </div>


                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Lokalizacja</h5>
                                <select class="form-select" id="subevent_localizations_id" name="subevent_localizations_id" required>
                                    @foreach ($localizations as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id === $calendary->subevent->localizations_id ? 'selected' : '' }}>
                                            {{ $item->name  }} - {{ $item->city }} / {{ $item->street }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Organizacja</h5>
                                <select class="form-select" id="subevent_organizations_id" name="subevent_organizations_id" required>
                                    @foreach ($organizations as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id === $calendary->subevent->organizations_id ? 'selected' : '' }}>
                                            {{ $item->name  }} - {{ $item->city }} / {{ $item->street }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mt-4">

                                <button class="btn btn-sm btn-success" type="submit">Zmien</button>
                            </form>

                            <h3>&nbsp;</h3>
                            <form action="{{ route('panel.calendary.destroy_subevent', $event->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Usuń</button>
                            </form>

                        </div>

                </div>
            </div>
        </div>
        @endforeach
        

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
//ustawiamy datę
function getCurrentDatetime() {
    const now = new Date();
    let month = (now.getMonth() + 1).toString().padStart(2, '0');
    let day = now.getDate().toString().padStart(2, '0');
    let hours = now.getHours().toString().padStart(2, '0');
    let minutes = now.getMinutes().toString().padStart(2, '0');
    return `${now.getFullYear()}-${month}-${day}T${hours}:${minutes}`;
}

//pobieramy kategorie i podkategorie
const categoriesFromDB = @json($category);

//dodajemy elementy po kliknięciu na przycisk [dodaj wydarzenie]
document.getElementById('add_subevent').addEventListener('click', function() {

    const container = document.getElementById('subevents_container');
    const index = container.children.length;

    // Tworzymy nowy rząd dla podwydarzenia
    const rowDiv = document.createElement('div');
    rowDiv.classList.add('row', 'mt-4');
    container.appendChild(rowDiv);

    // Dodajemy nazwę podwydarzenia w jednej kolumnie
    const titleCol = document.createElement('div');
    titleCol.classList.add('col-md-6','mb-3');

    const subeventTitleLabel = document.createElement('label');
    subeventTitleLabel.setAttribute('for', `subevents[${index}][title]`);
    subeventTitleLabel.textContent = 'tytuł wydarzenia';
    subeventTitleLabel.classList.add('form-label');


    const subeventTitle = document.createElement('input');
    subeventTitle.setAttribute('type', 'text');
    subeventTitle.setAttribute('id', `subevents[${index}][title]`);
    subeventTitle.setAttribute('name', `subevents[${index}][title]`);
    subeventTitle.setAttribute('placeholder', 'Nazwa wydarzenia');
    subeventTitle.classList.add('form-control'); 

    titleCol.appendChild(subeventTitleLabel);
    titleCol.appendChild(subeventTitle);
    rowDiv.appendChild(titleCol);

    // Dodaj pole z ceną
    const priceCol = document.createElement('div');
    priceCol.classList.add('col-md-2','mb-3');

    const subeventPriceLabel = document.createElement('label');
    subeventPriceLabel.setAttribute('for', `subevents[${index}][price]`);
    subeventPriceLabel.textContent = 'Cena';
    subeventPriceLabel.classList.add('form-label');

    const subeventPrice = document.createElement('input');
    subeventPrice.setAttribute('type', 'text');
    subeventPrice.setAttribute('id', `subevents[${index}][price]`);
    subeventPrice.setAttribute('name', `subevents[${index}][price]`);
    subeventPrice.setAttribute('value', 0);
    subeventPrice.classList.add('form-control');

    priceCol.appendChild(subeventPriceLabel);
    priceCol.appendChild(subeventPrice);
    rowDiv.appendChild(priceCol);

    // Dodajemy delete btn koło nazwy podwydarzenia
    const dateColDeleteBtn = document.createElement('div');
    dateColDeleteBtn.classList.add('col-md-4');

    // Dodaj przycisk usuwania
    const deleteButton = document.createElement('button');
    deleteButton.innerText = 'Usuń';
    deleteButton.classList.add('btn', 'btn-danger', 'ml-2', 'mt-3');
    deleteButton.addEventListener('click', function() {
        rowDiv.remove();
    });

      // Dodaj pole z datą do kontenera
     dateColDeleteBtn.appendChild(deleteButton);
    rowDiv.appendChild(dateColDeleteBtn);

    const dateCol = document.createElement('div');
    dateCol.classList.add('col-md-4');

    // Utwórz i dodaj pole z datą
    const dateInput = document.createElement('input');
    dateInput.setAttribute('type', 'datetime-local');
    dateInput.setAttribute('name', `subevents[${index}][date]`);
    dateInput.classList.add('form-control');

    // Jeśli jest to pierwsze podwydarzenie, ustaw bieżącą datę. 
    // W przeciwnym razie ustaw datę na podstawie poprzedniego pola z datą.
    if (index === 0) {
        dateInput.value = getCurrentDatetime();
    } else {
        dateInput.value = container.lastChild.previousSibling.querySelector('input[type="datetime-local"]').value;
    }

    // Dodaj pole z datą do kontenera
    dateCol.appendChild(dateInput);
    rowDiv.appendChild(dateCol);

    // Kolumna dla kategorii
    const categoryCol = document.createElement('div');
    categoryCol.classList.add('col-md-4');
    categoryCol.classList.add('mb-3');
    const categorySelect = document.createElement('select');
    categorySelect.setAttribute('name', `subevents[${index}][category]`);
    categorySelect.classList.add('form-control');
    categoriesFromDB.forEach(category => {
        const option = document.createElement('option');
        option.value = category.id;
        option.textContent = category.name;
        categorySelect.appendChild(option);
    });
    categoryCol.appendChild(categorySelect);
    rowDiv.appendChild(categoryCol);

    // Kolumna dla podkategorii

    // Dodaj checkbox czy dla dzieci
    const checkBoxChildren = document.createElement('label');
    checkBoxChildren.classList.add('ml-2');
    checkBoxChildren.innerHTML = '<input type="checkbox" value="1"> Czy dla dzieci';
    checkBoxChildren.setAttribute('name', `subevents[${index}][children]`);

    rowDiv.appendChild(checkBoxChildren);

    // Dodaj hr znacznik
    const line_hr = document.createElement('hr');
    line_hr.classList.add('mb-2');

    rowDiv.appendChild(line_hr);

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

    var leadEditorOptions = {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{'align': 'left'}, {'align': 'center'}, {'align': 'right'}, {'align': 'justify'}],
                ['blockquote', 'code-block'],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                ['clean']
            ]
        },

        theme: 'snow'
    }

        // Inicjalizacja edytora dla pola "Description"
        var descriptionEditor = new Quill('#description-editor', descriptionEditorOptions);
         // Inicjalizacja edytora dla pola "lead"
         var leadEditor = new Quill('#lead-editor', leadEditorOptions);

        // Pobierz formularz
        var form = document.getElementById('myForm');

        // Dodaj obsługę zdarzenia submit formularza
        form.onsubmit = function() {

        // Pobierz zawartość edytorów Quill

        var descriptionContent = descriptionEditor.root.innerHTML;
        document.getElementById('hidden-description').value = descriptionContent;

        var leadContent = leadEditor.root.innerHTML;
        document.getElementById('hidden-lead').value = leadContent;
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


</script>
@endsection
