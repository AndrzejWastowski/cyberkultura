@extends('panel.app')

@section('content')
<div class="pagetitle">
    <h1>Lista wiadomości</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
        <li class="breadcrumb-item">Wiadomości</li>
        <li class="breadcrumb-item active">Lista</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="row pt-3" >
              <a href="{{ route('panel.calendary.add') }}"><button  class="btn btn-success mb-3">Dodaj nowe wydarzenie</button></a>
          </div>
            <!-- Table with stripped rows -->
            <table id="myTable">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th>Tytuł</th>
                        <th>Kategoria</th>
                        <th>Data publikacji</th>
                        <th>Kontrolki</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calendary as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><a href="{{ route('panel.calendary.edit',$item->id) }}#calendary">{{ $item->title }}</a></td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->date }}</td>
                            <td><a class="btn btn-sm btn-info" href="{{ route('page.calendary.show', $item->id) }}">Podgląd</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('panel.calendary.edit', $item->id) }}#calendary">Edycja</a>
                            <form action="{{ route('panel.calendary.destroy', $item) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Usuń</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                  $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Polish.json'
            }
        });
    });
            </script>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection