<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::find(request()->post_id);
        // dd($post);
        return view('fotos.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd(request()->file);
        $data = request()->validate([
            'post_id' => 'required|integer|max:100',
            'name' => 'required|string|unique:posts|min:3|max:255',
            'file' => 'required|file|image|max:10000',
            'confirmed' => 'sometimes|required|boolean',
          ]);

        //   dd($data);

        $foto = Foto::create([
            'post_id' => $data['post_id'],
            'url' => $data['file']->store('uploads', 'public'),
            'name' => $data['name'],
            'confirmed' => $data['confirmed'] ?? 1,
        ]);

        // $image = Image::make(public_path('storage/' . $foto->url))->fit(1000,1000);
        // $image->save();

        return redirect()->route('posts.show',[$data['post_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        dd($post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        $foto->delete();

        return redirect()->route('fotos.index');
    }
}
