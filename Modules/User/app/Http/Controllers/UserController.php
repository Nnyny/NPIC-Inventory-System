<?php

namespace Modules\User\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\app\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user::index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_name' => 'required|max:20',
            'user_pass' => 'required|max:20',
            'user_gender' => 'required|max:5',
            'user_phone' => 'required|max:20',
        ]);
        // Create The Category
        $user = new User;
        $user->user_name = $request->user_name;
        $user->user_pass = $request->user_pass;
        $user->user_gender = $request->user_gender;
        $user->user_phone = $request->user_phone;
        $user->save();
        Session::flash('user_create','User is created.');
        return redirect('/user/create');

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user::show')->with('user',$user);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user::edit')->with('user', $user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|max:20',
            'user_pass' => 'required|max:20',
            'user_gender' => 'required|max:5',
            'user_phone' => 'required|max:20',
        ]);
        if ($validator->fails()) {
            return redirect('user/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
        }
        // Create The Category
        $user = User::find($id);
        $user->user_name = $request->Input('user_name');
        $user->user_pass = $request->Input('user_pass');
        $user->user_gender = $request->Input('user_gender');
        $user->user_phone = $request->Input('user_phone');
        $user->save();
        Session::flash('user_update','User is updated.');
        return redirect('user/' . $id . '/edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('user_delete','User is deleted.');
        return redirect('user');
    }
}
