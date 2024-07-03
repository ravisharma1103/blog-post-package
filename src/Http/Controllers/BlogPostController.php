<?php

namespace MyVendor\BlogPost\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MyVendor\BlogPost\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all();
        return view('blogpost::index', compact('posts'));
    }

    public function create()
    {
        return view('blogpost::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        BlogPost::create($request->all());

        return redirect()->route('blog-posts.index');
    }

    public function show(BlogPost $blogPost)
    {
        return view('blogpost::show', compact('blogPost'));
    }

    public function edit(BlogPost $blogPost)
    {
        return view('blogpost::edit', compact('blogPost'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blogPost->update($request->all());

        return redirect()->route('blog-posts.index');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect()->route('blog-posts.index');
    }
}
