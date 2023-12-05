@extends('panel.app')


@section('content')
    <div class="pagetitle">
        <h1>Lista zdjęć</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('panel.gallery.list')  }}">Galerie</a></li>
                <li class="breadcrumb-item active">Lista kategorii</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lista kateogrii</h5>
                <div class="row">
                    <!-- Table with stripped rows -->

                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategoria</th>
                                <th>Edytuj</th>
                                <th>Kasuj</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td><a href="{{ route('panel.gallery.list', $category) }}">{{ $category->name }}</td>
                                    <td>
                                        <form action="{{ route('panel.gallery.category_edit', $category) }}"
                                            method="GET" style="display: inline-block;">
                                            @csrf
                                            <button class="btn btn-sm btn-success  " type="submit">Edytuj</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('panel.gallery.category_destroy', $category) }}"
                                            method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger  " type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
