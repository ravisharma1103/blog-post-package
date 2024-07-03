@extends('blogpost::layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Blog Post</h1>
        <form action="{{ route('blog-posts.update', $blogPost->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $blogPost->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required>{{ $blogPost->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
