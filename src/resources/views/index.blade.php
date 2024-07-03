<!-- resources/views/vendor/blogpost/index.blade.php -->
@extends('blogpost::layouts.app')

@section('content')
    <div class="container">
        <h1>Blog Posts</h1>
        <a href="{{ route('blog-posts.create') }}" class="btn btn-primary">Create New Post</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('blog-posts.show', $post->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('blog-posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('blog-posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
