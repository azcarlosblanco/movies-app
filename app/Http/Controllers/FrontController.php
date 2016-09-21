<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\User;
use App\Entities\Movie;
use App\Entities\Category;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstMoviesCollection = Movie::take(18)->orderBy('id', 'DESC')->get();
        $secondMoviesCollection = $firstMoviesCollection->splice(6);
        $thirdMoviesCollection = $secondMoviesCollection->splice(6);

        $categories = Category::take(8)->orderBy('id', 'DESC')->get();

        return view('front.home', compact(
            'firstMoviesCollection',
            'secondMoviesCollection',
            'thirdMoviesCollection',
            'categories'
        ));
    }

    /**
     * lorem.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMovies(Request $request)
    {
        $movies = Movie::search($request->title)->orderBy('id', 'DESC')->paginate(24);
        $firstMoviesCollection = $movies;
        $secondMoviesCollection = $firstMoviesCollection->splice(8);
        $thirdMoviesCollection = $secondMoviesCollection->splice(8);
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('front.movies', compact(
            'movies',
            'firstMoviesCollection',
            'secondMoviesCollection',
            'thirdMoviesCollection',
            'categories'
        ));
    }

    /**
     * lorem.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMoviesCategory($category)
    {
        $category = Category::where('name', $category)->first();
        if (! $category) {
            \App::abort(404, 'La Categoria no fue encontrada');
        }
        $movies = Movie::where('category_id', $category->id)->orderBy('id', 'DESC')->paginate(24);
        $firstMoviesCollection = $movies;
        $secondMoviesCollection = $firstMoviesCollection->splice(8);
        $thirdMoviesCollection = $secondMoviesCollection->splice(8);
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('front.movies', compact(
            'movies',
            'firstMoviesCollection',
            'secondMoviesCollection',
            'thirdMoviesCollection',
            'category',
            'categories'
        ));
    }

    /**
     * lorem.
     *
     * @return \Illuminate\Http\Response
     */

    public function showMovie($slug, $link = null)
    {
        $link = (int) $link;
        $movie = Movie::findBySlugOrFail($slug);
        $relatedMovies = Movie::where('category_id', $movie->category_id)->take(6)->orderBy('id', 'DESC')->get();

        if (! $user = \Auth::user()) {
            $user = new user([
                'type' => 'member',
            ]);
        }

        return view('front.movie', compact('movie', 'user', 'relatedMovies', 'link'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getContact()
    {
        return view('front.contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|min:2|max:50',
            'email' => 'required|min:2|max:50|email',
            'phone' => 'required|min:2|max:50',
            'message' => 'required|min:2|max:250',
        ]);

        return redirect()->route('front.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
