<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $data = request()->validate([
            'name' => 'required|unique:categories|min:3|max:255',
            'comment' => 'nullable|string|min:3|max:255',
            'file' => 'required|file|image|max:10000',
          ]);

          $category = Category::create([
            'url' => $data['file']->store('uploads', 'public'),
            'name' => $data['name'],
            'slug' =>  Str::slug($data['name'], '-'),
            'comment' => $data['comment'],
        ]);

        return redirect()->route('categories.show',[$category->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // dd($category);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
            'comment' => 'nullable|string|min:3|max:255',
            'file' => 'required|file|image|max:10000',
          ]);

          $category->update([
            'url' => $data['file']->store('uploads', 'public'),
            'name' => $data['name'],
            'slug' =>  Str::slug($data['name'], '-'),
            'comment' => $data['comment'],
        ]);

        return redirect()->route('categories.show',[$category->id]);


        // return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
