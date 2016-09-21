<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Movie;
use App\Entities\Category;
use Illuminate\Support\Facades\File;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('id', 'DESC')->paginate(10);
        $movies->each(function($movies) {
            $movies->category;
        });
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.movies.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'resume' => 'required|min:2|max:500',
            'category_id' => 'required|integer',
            'visibility' => 'required|in:member,premium',
            'image_path' => 'required|mimes:jpeg,bmp,png',
            ]);

        $movie = new Movie($request->all());
        $movie->save();

        return redirect()
            ->route('admin.movies.index')
            ->with('alert', 'La película ha sido creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.movies.edit', compact('movie', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'resume' => 'required|min:2|max:500',
            'category_id' => 'required|integer',
            'visibility' => 'required|in:member,premium',
            'image_path' => 'mimes:jpeg,bmp,png',
            ]);


        $movie = Movie::findOrFail($id);

        $filesName = $movie->image_path;

        $movie->fill($request->all());
        $movie->save();

        if ($request->file('image_path'))
        {
            File::delete(public_path() . '/resources/images/original_size_' . $filesName);
            File::delete(public_path() . '/resources/images/medium_size_' . $filesName);
            File::delete(public_path() . '/resources/images/little_size_' . $filesName);
        }

        return redirect()
            ->route('admin.movies.index')
            ->with('alert', 'La película ha sido actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::destroy($id);

        return redirect()
            ->route('admin.movies.index')
            ->with('alert', 'La película ha sido eliminada');
    }
}
