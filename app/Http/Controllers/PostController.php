<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $categories = Category::all();
        return view('posts.index', compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // dd(request()->confirmed);

        $data = request()->validate([
            'category_id' => 'required|integer|max:100',
            'name' => 'required|string|unique:posts|min:3|max:255',
            'comment' => 'nullable|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:10000',
            'confirmed' => 'sometimes|required|boolean',
            'file' => 'required|file|image|max:10000',
          ]);
          $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'slug' =>  Str::slug($data['name'], '-'),
            'comment' => $data['comment'],
            'confirmed' => $data['confirmed'] ?? 1,
            'description' => $data['description'],
            'url' => $data['file']->store('uploads', 'public'),
        ]);

        return redirect()->route('posts.show',[$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            'category_id' => 'required|integer|max:100',
            'name' => 'required|string|unique:posts|min:3|max:255',
            'comment' => 'nullable|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:10000',
            'confirmed' => 'sometimes|required|boolean',
            'file' => 'required|file|image|max:10000',
          ]);
          $post->update([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'slug' =>  Str::slug($data['name'], '-'),
            'comment' => $data['comment'],
            'confirmed' => $data['confirmed'] ?? 1,
            'description' => $data['description'],
            'url' => $data['file']->store('uploads', 'public'),
        ]);
        //   $post->update($data);
        return redirect()->route('posts.show',[$post->id]);
        // return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
