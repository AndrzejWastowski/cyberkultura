@extends('panel.app')

@section('content')
    <div class="pagetitle">
        <h1>Lista plików</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
                <li class="breadcrumb-item">Pliki</li>
                <li class="breadcrumb-item active">Lista plików</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-3">
                            <a href="{{ route('panel.files.add') }}"><button class="btn btn-success mb-3">Dodaj nowy
                                    plik</button></a>
                        </div>
                        <div style="width:100%;">

                            <table id="myTable">
                                <thead>
                                    <tr>
                                        <th style="width: 5% !important;">ID</th>
                                        <th style="width: 50% !important;">Tytuł</th>
                                        <th style="width: 15% !important;">Data publikacji</th>
                                        <th style="width: 10% !important;">Edytuj</th>
                                        <th style="width: 10% !important;">Kasuj</th>
                                        <th style="width: 10% !important;">Podgląd</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><a href="{{ route('panel.files.edit', $item->id) }}">{{ $item->name }}</a>
                                            </td>
                                            <td>{{ $item->date_publication }}</td>
                                            <td><a href="{{ route('panel.files.edit', $item->id) }}"
                                                    class="btn btn-primary">Edytuj</a></td>
                                            <td>
                                                <form action="{{ route('panel.files.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Kasuj</button>
                                                </form>
                                            </td>
                                            <td><a href="{{ asset('storage/downloads/' . $item->filename) }} ">Podgląd</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
      $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Polish.json'
            },
        });
    });
    </script>
@endsection