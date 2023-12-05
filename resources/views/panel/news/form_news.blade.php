@extends('panel.app')
@section('content')
<div class="pagetitle">
    <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytpowanie'}} wiadomości</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
        <li class="breadcrumb-item">Wiadomości</li>
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
        <form id="myForm" action="{{ $action == 'create' ? route('panel.news.create') : route('panel.news.update', $news)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
             @endif

            <div class="card" id="news">
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Tytuł</h5>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Kategoria</h5>
                            <select class="form-select" id="news_category_id" name="news_category_id" required>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id === $news->news_category_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-title">Data publikacji</h5>
                            <div class="col-sm-10">
                                <input id="date_publication" type="datetime-local" name="date_publication" value="{{ $news->date_publication }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Lead</h5>
                    <label for="news_category_id" class="form-label"><i>Lead - krótki opis, streszczenie lub wstęp do newsa. Wyświetla się na liście newsów</i></label>
                    <p>najlepiej od 50 do 250 znaków</p>
                    <!-- Quill Editor Default -->
                    <div id="lead-editor" style="block-size: 150px;">{!! $news->lead !!}  </div>
                    <input type="hidden" name="lead" id="hidden-lead">
                    <!-- End Quill Editor Default -->
                </div>

                <div class="card-body">
                    <h5 class="card-title">Treść wiadomości</h5>

                    <!-- Quill Editor Full -->
                    <p>pełna treść wiadomośc, wyświetla się po klikniciu w newsa</p>
                    <div id="description-editor" style="block-size: 250px;">
                        <p>{!! $news->description !!} </p>
                    </div>
                    <input type="hidden" name="description" id="hidden-description">

                    <!-- End Quill Editor Full -->

                </div>
            </div>

            <hr>

            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Zdjęcia</h5>
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
               
                @foreach ($news->photo as $photo)
                    <div class="row mb-3" id="photo_{{ $photo->id }}">
                        <div class="col-3">
                            <img src="{{ asset('/news/'.$news->id.'/gallery/'.$photo->name.'m.webp') }}" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <form action="{{ route('panel.news.edit_photos') }}" method="POST" >
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
