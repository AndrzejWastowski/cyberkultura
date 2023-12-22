@extends('panel.app')

@section('content')
<div class="pagetitle">
    <h1>Lista newsów</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('panel.start') }}">Panel</a></li>
        <li class="breadcrumb-item">Uzytkownicy</li>
        <li class="breadcrumb-item active">Lista</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lista użytkowników</h5>
            <a href="{{ route('panel.user.add') }}"><button name="send" type="sender" class="btn btn-sm btn-success">Dodaj nowego</button></a>
            <!-- Table with stripped rows -->
            <table id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>Kategoria</th>
                        <th>Data publikacji</th>
                        <th>Utworzono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><a href="{{ route('panel.user.edit',['user'=>$item]) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->date_add }}</td>                            <td>
                            <a class="btn btn-sm btn-info" href="{{ route('panel.user.show', ['user'=>$item]) }}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('panel.user.edit', ['user'=>$item]) }}">Edit</a>
                            <form action="{{ route('panel.user.destroy', $item) }}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger" type="submit">Usuń</button>
                          </form>
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