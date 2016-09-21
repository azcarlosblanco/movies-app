<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => 'required|min:2|max:25',
            'email' => 'required|min:2|max:50|email|unique:users',
            'password' => 'required|min:2|max:25',
            'type' => 'required|in:member,premium,admin',
            ]);

        $user = new User($request->all());
        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('alert', 'El usuario ha sido creado satisfactoriamente');
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
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
            'name' => 'required|min:2|max:25',
            'email' => 'required|min:2|max:50|email|unique:users,email,' . $id,
            'password' => 'min:2|max:25',
            'type' => 'required|in:member,premium,admin',
            ]);

        $user = User::findOrFail($id);
        $user->fill($request->all());

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('alert', 'El usuario ha sido actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! User::destroy($id)) {
            throw new \Exception("Error Processing Request", 1);
        }

        return redirect()
            ->route('admin.users.index')
            ->with('alert', 'El usuario ha sido eliminado');;
    }
}
