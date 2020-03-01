<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Category;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = Post::latest()->paginate(10);
        $categories = Category::all();

        return view('blog.index', compact('posts','categories'));
    }

    public function showCat($id)
    {

        $category = Category::findOrFail($id);
        $posts = $category->posts()->latest()->paginate(10);
        $categories = Category::all();
        // $cat = $category->name;
        return view('blog.index', compact('posts','categories'));
    }

    public function show(Post $post)
    {
        // $comments = Comment::latest()->all();
        $categories = Category::all();
        return view('blog.show', compact('post','categories'));
    }

    public function showDate($date)
    {
        $posts = Post::whereDay('created_at', Carbon::parse($date))->latest()->paginate(10);
        $categories = Category::all();
        return view('blog.index', compact('posts','categories'));
    }

    public function about()
    {
        $categories = Category::all();

        return view('blog.about', compact('categories'));
    }
}
