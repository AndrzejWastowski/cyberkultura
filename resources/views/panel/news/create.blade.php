@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create News</h1>
        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="lead">Lead</label>
                <input type="text" class="form-control" id="lead" name="lead" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="date_publication">Date Publication</label>
                <input type="datetime-local" class="form-control" id="date_publication" name="date_publication" required>
            </div>
            <div class="form-group">
                <label for="news_category_id">Category</label>
                <select class="form-control" id="news_category_id" name="news_category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    
@endsection
