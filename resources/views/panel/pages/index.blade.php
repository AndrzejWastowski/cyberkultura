@extends('panel.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Pages</h2>
                <a href="{{ route('panel.pages.create') }}" class="btn btn-primary mb-2">Create Page</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tytuł strony</th>
                            <th>Krótki opis</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->short_description }}</td>
                                <td>
                                    <a href="{{ route('panel.pages.show', $page->id) }}" class="btn btn-primary">Podglad</a>
                                    <a href="{{ route('panel.pages.edit', $page->id) }}" class="btn btn-success">Edycja</a>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
