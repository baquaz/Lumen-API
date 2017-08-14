<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    //create new user
    public function add(Request $request)
    {   
        $request['api_token'] = str_random(60);
        $request['password'] = app('hash')->make($request['password']);
        
        $user = User::create($request->all());

        return response()->json($user);
    }

    //update user
    public function edit(Request $request, $id) 
    {
        $user = User::find($id);
        $edit->update($request->all());

        return response()->json($edit);
    }

    //show user
    public function view(Request $request, $id)
    {
        $user = User::find($id);
        
        return response()->json($user);
    }

    public function index(Request $request)
    {
        $users = User::all();

        return response()->json($users);
    }

}
