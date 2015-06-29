@extends('blog.template')

@section('content')
    <div class="container-fluid">
        <h1>{{ Route::getCurrentRoute()->getName() == 'blog_create' ? 'Create blog' : 'Edit blog' }}</h1>

        <!-- Create and edit -->
        @if(Route::getCurrentRoute()->getName() == 'blog_create')
        <form class="form-horizontal" method="POST" action="{{ route('blog_create') }}" enctype="multipart/form-data">
        @else
                <form class="form-horizontal" method="POST" action="{{ route('blog_update', ['id' => $blog->id]) }}" enctype="multipart/form-data">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="{{ Route::getCurrentRoute()->getName() == 'blog_create' ? 'POST' : 'PUT' }}">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title or '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="5">{{ $blog->description or '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="author" class="col-sm-2 control-label">Author</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" name="author" value="{{ $blog->author or '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="public_date" class="col-sm-2 control-label">Public Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="public_date" name="public_date" value="{{ $blog->public_date or '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name="image" accept="image/jpg">
                </div>
            </div>

            <div class="form-group">
                <label for="category_id" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-control" name="category_id">
                        @foreach(Category::all() as $cat)
                        <option value="{{ $cat->id }}" {{ isset($blog) && $blog->id == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="tags" class="col-sm-2 control-label">Tags</label>
                <div class="col-sm-10">
                    @foreach(Tag::all() as $tag)
                    <label class="checkbox-inline">
                        <input type="checkbox" value="{{ $tag->id }}" name="tags[]" {{ isset($tagIds) && in_array($tag->id, $tagIds) ? 'checked' : '' }}> {{ $tag->title }}
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </div>
        </form>

        <!-- Delete button -->
        @if(isset($blog))
        <form class="form-horizontal" method="POST" action="{{ route('blog_delete', ['id' => $blog->id]) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
        @endif
    </div>
@stop