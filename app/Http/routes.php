<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('iniciar-sesion', [
  'uses' => 'Auth\AuthController@getLogin',
  'as'   => 'login',
]);
Route::post('iniciar-sesion', 'Auth\AuthController@postLogin');
Route::get('salir', [
  'uses' => 'Auth\AuthController@getLogout',
  'as'   => 'logout',
]);

// Registration routes...
Route::get('registro', [
  'uses' => 'Auth\AuthController@getRegister',
  'as'   => 'register',
]);
Route::post('registro', 'Auth\AuthController@postRegister');


//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function ()
{
  // Admin index
  Route::get('/', ['as' => 'admin.index', function()
  {
    return view('admin.index');
  }]);


  // Users CRUD
  Route::resource('users','UsersController');
  Route::get('users/{id}/destroy', [
      'uses' => 'UsersController@destroy',
      'as'   => 'admin.users.destroy'
  ]);

  // Categories CRUD
  Route::resource('categories', 'CategoriesController');
  Route::get('categories/{id}/destroy', [
      'uses' => 'CategoriesController@destroy',
      'as'   => 'admin.categories.destroy'
  ]);

  // Movies CRUD
  Route::resource('movies', 'MoviesController');
  Route::get('movies/{id}/destroy', [
      'uses' => 'MoviesController@destroy',
      'as'   => 'admin.movies.destroy'
  ]);

  // Links CRUD
  // Index
  Route::get('movies/{movieId}/links', [
      'uses' => 'LinksController@index',
      'as'   => 'admin.movies.links.index'
  ]);
  // Create
  Route::get('movies/{movieId}/links/create', [
      'uses' => 'LinksController@create',
      'as'   => 'admin.movies.links.create'
  ]);
  // Store
  Route::post('movies/{movieId}/links', [
      'uses' => 'LinksController@store',
      'as'   => 'admin.movies.links.store'
  ]);
  // Edit
  Route::get('movies/{movieId}/links/{linkId}/edit', [
      'uses' => 'LinksController@edit',
      'as'   => 'admin.movies.links.edit'
  ]);
  // Update
  Route::put('movies/{movieId}/links/{linkId}', [
      'uses' => 'LinksController@update',
      'as'   => 'admin.movies.links.update'
  ]);
  // Destroy
  Route::get('movies/{movieId}/links/{linkId}/destroy', [
      'uses' => 'LinksController@destroy',
      'as'   => 'admin.movies.links.destroy'
  ]);
});

// Front
Route::get('/', [
    'uses' => 'FrontController@index',
    'as' => 'front.index'
]);

Route::get('/peliculas', [
    'uses' => 'FrontController@showMovies',
    'as' => 'front.movies'
]);

Route::get('/peliculas/{slug}/{link?}', [
    'uses' => 'FrontController@showMovie',
    'as' => 'front.movie'
])->where('link', '[0-9]+');

Route::get('/categoria/{category}', [
    'uses' => 'FrontController@showMoviesCategory',
    'as' => 'front.category'
])->where('category', '[A-Za-z]+');

Route::get('/contacto', [
    'uses' => 'FrontController@getContact',
    'as' => 'front.contact'
]);

Route::post('/contacto', [
    'uses' => 'FrontController@postContact',
    'as' => 'front.contact'
]);
