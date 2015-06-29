<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use DB;
use App\Blog;
use App\Category;
use App\BlogTag;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', ['blogs' => $blogs]);
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        return view('blog.index', ['blogs' => $category->blogs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $blog = new Blog;
        $blog->title = Request::input('title');
        $blog->description = Request::input('description');
        $blog->category_id = Request::input('category_id');
        $blog->author = Request::input('author');
        $blog->public_date = Request::input('public_date');
        $blog->save();

        if (Request::hasFile('image')) {
            Request::file('image')->move(public_path('blog/images'), $blog->id.'.jpg');
        }

        foreach(Request::input('tags') as $tagId) {
            $blogTag = new BlogTag;
            $blogTag->blog_id = $blog->id;
            $blogTag->tag_id = $tagId;
            $blogTag->save();
        }
        return redirect()->route('blog_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.detail', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $tagIds = [];
        foreach($blog->tags as $tag) {
            array_push($tagIds, $tag->id);
        }

        return view('blog.form', ['blog' => $blog, 'tagIds' => $tagIds]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = Request::input('title');
        $blog->description = Request::input('description');
        $blog->category_id = Request::input('category_id');
        $blog->author = Request::input('author');
        $blog->public_date = Request::input('public_date');
        $blog->save();

        if (Request::hasFile('image')) {
            Request::file('image')->move(public_path('blog/images'), $blog->id.'.jpg');
        }

        // Delete old blog_tags
        BlogTag::where('blog_id', $blog->id)->delete();

        foreach(Request::input('tags') as $tagId) {
            $blogTag = new BlogTag;
            $blogTag->blog_id = $blog->id;
            $blogTag->tag_id = $tagId;
            $blogTag->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        BlogTag::where('blog_id', $blog->id)->delete();
        $blog->delete();
        return redirect()->route('blog_index');
    }
}
