@extends('panel.app')
@section('content')
    <div class="pagetitle">
        <h1>Edytowanie danych kontaktowych<strong></strong></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
                <li class="breadcrumb-item">Kontakt</li>
                <li class="breadcrumb-item active">Edycja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">

        <form id="myForm" action="{{ route('panel.contact.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">

                    <div class="m-3 text-center text-danger bold"><strong>ta podstrona jest w przygotowaniu!</strong></div>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Opis</h5>
                            <input type="text" class="form-control" id="title" name="title" value=""
                                required>
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-title">Telefon</h5>
                            <input type="text" class="form-control" id="link" name="link" value=""
                                required>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </div>
        </form>
    </div>
@endsection
