@extends('blog.template')

@section('header')
    <h1 class="blog-title">The Bootstrap Blog</h1>
    <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
@stop

@section('content')
    @foreach($blogs as $blog)
        <div class="blog-post">
            <img src="{{ asset('blog/images/'.$blog->id.'.jpg') }}" class="blog-image">
            <h2 class="blog-post-title"><a href="{{ route('blog_show', ['id' => $blog->id]) }}">{{ $blog->title }}</a></h2>
            <p class="blog-post-meta">{{ $blog->public_date }} by {{ $blog->author }}</p>
        </div><!-- /.blog-post -->
        <hr>
    @endforeach
@stop