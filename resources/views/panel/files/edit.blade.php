<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Edit File</h1>
    <form method="post" action="{{ route('files.update', $file->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $file->name }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control">{{ $file->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_publication">Publication Date</label>
            <input type="date" id="date_publication" name="date_publication" class="form-control" value="{{ $file->date_publication }}">
        </div>

        <div class="form-group">
            <label for="date_end">End Date</label>
            <input type="date" id="date_end" name="date_end" class="form-control" value="{{ $file->date_end }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
