<?php

namespace MyVendor\BlogPost\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MyVendor\BlogPost\Models\BlogPost;
use Illuminate\Support\Str;

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

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Get logged-in user's ID
        $data['slug'] = Str::slug($request->title); // Generate slug from title

        BlogPost::create($data);

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

        $data = $request->all();
        $data['slug'] = Str::slug($request->title); // Update slug from title

        // Only update user_id if it's allowed and properly validated
        // if (Auth::user()->isAdmin()) { // Example condition where user_id can be updated
        //     $data['user_id'] = $request->user_id;
        // }

        $blogPost->update($data);

        return redirect()->route('blog-posts.index');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect()->route('blog-posts.index');
    }
}
