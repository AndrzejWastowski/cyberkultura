@extends('panel.app')


@section('content')
<div class="pagetitle">
    <h1>Lista zdjęć </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{  route('panel.dashboard') }}">Panel</a></li>
        <li class="breadcrumb-item"><a href="{{ route('panel.gallery.list')  }}">Galerie</a></li>
        <li class="breadcrumb-item active">Lista zdjęć - {{ $category->id == null ? " wszystkie kategorie " : $category->name }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lista zdjęć - {{ $category->id == null ? 'wszystkie kategorie' : $category->name }}</h5>
            <div class="row">
            <!-- Table with stripped rows -->
                    @foreach($galleries as $photo)
                     <div class="col-4">
                      {{  $photo->categories->name }}
                        <img src="{{ asset('/storage/gallery/'.$photo->name.'kw.webp') }}" width="100%">
                        <form action="{{ route('panel.gallery.destroy', $photo) }}" method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <div class="row  m-2 p-1 ext-center center">
                            <button class="btn btn-sm btn-danger  " type="submit">Delete</button>
                            <hr>
                          </div>
                      </form>
                     </div>
                    @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection

