@extends('panel.app')

@section('content')
    <div class="container">
        <h2>Edit pages</h2>
        <form method="POST" action="{{ route('panel.pages.update', $page->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" required>
            </div>
            <div class="form-group">
                <label for="lead">Lead:</label>
                <textarea class="form-control" id="lead" name="lead" required>{{ $page->lead }}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $page->description }}</textarea>
            </div>
           
            <div class="form-group">
                <label for="pages_photo">Photo:</label>
                <input type="file" class="form-control" id="pages_photo" name="pages_photo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="current_photo">Current Photo:</label>
                <img src="{{ $page->photo }}" alt="{{ $page->photo }}" class="img-fluid">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
