<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->categoryNameValidation($request);

        $category = new Category($request->all());
        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('alert', $request->name . ' fue guardado con exito');
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
        $category = Category::findOrfail($id);
        return view('admin.categories.edit', compact('category'));
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
        $this->categoryNameValidation($request);

        $category = Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('alert', $request->name . ' fue actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Category::destroy($id)) {
            throw new \Exception("Error Processing Request", 1);
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('alert', 'La categoría fue eliminada con exito');
    }

    /**
     * This validates category inputs
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Http\Exception\HttpResponseException
     */
    public function categoryNameValidation($request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|min:4|max:25',
        ]);
    }
}
