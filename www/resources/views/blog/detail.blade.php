@extends('blog.template')

@section('title', $blog->title)

@section('content')
    <div class="blog-header">
        <img src="{{ asset('blog/images/'.$blog->id.'.jpg') }}" class="blog-image">
        <h3 class="blog-title">{{ $blog->title }}</h3>
        <p class="blog-post-meta">{{ $blog->public_date }} by {{ $blog->author }}</p>
        <p class="lead blog-description">{{ $blog->description }}</p>
    </div>
@stop