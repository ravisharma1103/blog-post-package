@extends('blogpost::layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $blogPost->title }}</h1>
        <p>{{ $blogPost->content }}</p>
        <a href="{{ route('blog-posts.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
