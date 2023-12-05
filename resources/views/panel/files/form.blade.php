@extends('panel.app')

@section('content')
    <div class="pagetitle">
        <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie' }} pliku</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
                <li class="breadcrumb-item">Pliki</li>
                <li class="breadcrumb-item active">{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie' }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dodawanie nowego pliku</h5>
                        <!-- Table with stripped rows -->

                        <div class="container">
                            @if ($errors->has('file_document'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('file_document') }}
                                </div>
                            @endif

                            <form id="myForm" action="{{ $action == 'create' ? route('panel.files.create') : route('panel.files.update', $file) }}" method="POST"   enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nazwa</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $file->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Krótki opis</label>
                                        <textarea id="description" name="description" class="form-control" value="{{ $file->description }}"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="date_publication">Data publikacji</label>
                                        <input type="date" id="date_publication" name="date_publication"
                                            class="form-control" value="{{ $date_publication }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="date_end">Data końca dostepu</label> <i>(domyślnie + 3 lata)</i>
                                        <input type="date" id="date_end" name="date_end" class="form-control"
                                            value="{{ $date_end }}">
                                    </div>
                                    @if ($action == 'edit')
                                        <div class="form-group mt-2 mb-2">
                                            <label for="file_document">Plik na serwerze:  </label>
                                            <a href="{{ Storage::url('downloads/'.$file->filename)  }} ">  {{ $file->filename }}</a>
                                        </div>
                                    @endif


                                    <div class="form-group">
                                        <label for="file_document">Plik</label>
                                        <input type="file" id="file_document" name="file_document" class="form-control">
                                    </div>



                                    <button type="submit" class="btn btn-primary">Wyślij</button>
                                </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
