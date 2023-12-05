@extends('panel.app')
@section('content')
<div class="pagetitle">
    <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}} podstrony - <strong>{{ $page->title }}</strong></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
        <li class="breadcrumb-item">Podstrony</li>
        <li class="breadcrumb-item active">{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <div class="container">
        <form id="myForm" action="{{ $action == 'create' ? route('panel.pages.store') : route('panel.pages.update', $page)}}" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
             @endif

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Tytuł</h5>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" required>
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-title">Link (<i>SEO</i>)</h5>
                            <input type="text" class="form-control" id="link" name="link" value="{{ $page->link }}" required>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Lead</h5>
                    <label for="news_category_id" class="form-label"><i>Lead - krótki opis, jedno zdanie pojawiające się na początku strony w nagłówku</i></label>
                    <p>najlepiej od 50 do 250 znaków</p>
                    <!-- Quill Editor Default -->
                    <div id="lead-editor" style="height: 100px;">{!! $page->lead !!} </div>
                    <input type="hidden" name="lead" id="hidden-lead">
                    <!-- End Quill Editor Default -->
                </div>

                <div class="card-body">
                    <h5 class="card-title">Treść strony</h5>

                    <!-- Quill Editor Full -->
                    <p>Pełna treść strony</p>
                    <div id="description-editor" style="height: 550px;">
                        <p>{!! $page->description !!}</p>
                    </div>
                    <input type="hidden" name="description" id="hidden-description">

                    <!-- End Quill Editor Full -->

                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Dodaj Nową' : 'Zapisz zmiany' }} </button>
            </div>
        </form>
    </div>
@endsection



