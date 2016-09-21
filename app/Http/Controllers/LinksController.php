<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Link;
use App\Entities\Movie;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($movieId)
    {
        $links = Movie::findOrFail($movieId)->links()->orderBy('id', 'DESC')->paginate(10);;
        return view('admin.movies.links.index', compact('links', 'movieId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($movieId)
    {
        return view('admin.movies.links.create', compact('movieId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($movieId, Request $request)
    {
        $this->validate($request, [
            'server' => 'required|min:2',
            'audio' => 'required|in:español,ingles',
            'quality' => 'required|in:normal,hd,full_hd',
            'type' => 'required|in:full,trailer',
            'link' => 'required|url'
        ]);

        $movie = Movie::findOrFail($movieId);
        $movie->links()->create($request->all());

        return redirect()
            ->route('admin.movies.links.index', ['movieId' => $movieId])
            ->with('alert', 'El link ha sido creado con exito');
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
    public function edit($movieId, $linkId)
    {
        $link = Link::findOrFail($linkId);
        return view('admin.movies.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($movieId, $linkId, Request $request)
    {
        $this->validate($request, [
            'server' => 'required|min:2',
            'audio' => 'required|in:español,ingles',
            'quality' => 'required|in:normal,hd,full_hd',
            'type' => 'required|in:full,trailer',
            'link' => 'required|url'
        ]);

        $link = Link::findOrfail($linkId)
            ->fill($request->all())
            ->save();

        return redirect()
            ->route('admin.movies.links.index', ['movieId' => $movieId])
            ->with('alert', 'El link ha sido actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($movieId, $linkId)
    {
        Link::destroy($linkId);

        return redirect()
            ->route('admin.movies.links.index', ['movieId' => $movieId])
            ->with('alert', 'El link ha sido eliminado');
    }
}
