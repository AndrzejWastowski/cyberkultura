@extends('panel.app')

@section('content')
<div class="pagetitle">
  <h1>Dodawanie zdjęć</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
      <li class="breadcrumb-item">Galerie</li>
      <li class="breadcrumb-item active">Dodawanie zdjęć</li>
    </ol>
  </nav>
</div><!-- End Page Title -->-

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">

          <div class="card-header">Dodaj zdjęcia</div>
          <div class="card-body">
            <form action="{{ route('panel.gallery.store') }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row pt-3 mb-3">
                  <label for="category" class="col-sm-2 col-form-label">Kategoria</label>
                  <div class="col-sm-6">
                    <select class="form-select" aria-label="Galerie Kategorie" name="gallery_category_id" id="gallery_category_id">
                      @foreach ($categories as $category)
                      {
                        <option value="{{ $category->id }}">{{  $category->name }}</option>
                      }
                      @endforeach

                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="file" id ="images" name="images[]" multiple accept="image/*" class="form-control" >
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Wyślij pliki na serwer</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection