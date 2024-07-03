@extends('blogpost::layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Blog Post</h1>
        <form action="{{ route('blog-posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
