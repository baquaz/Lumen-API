<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

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

    public function authenticate(Request $request)
    {
        $login = $request->input('login');
        // $password = $request['password'];
        $user = User::where('login', $login)->firstOrFail();

        if(app('hash')->check($request['password'], $user['password'])) {

            return response()->json([
                'token' => $user->api_token
            ]);
        }        
        else {
            // return $this->error("The user with {$login} doesn't exist", 404);
            return response()->json("The user with doesn't exist");
        }
    }

    //update user
    public function edit(Request $request, $id) 
    {
        // $user = User::find($id);

        // if(!$user){
			// return $this->error("The user with {$id} doesn't exist", 404);
		// }
        // return response()->json($request['password']);
        $user = User::where('user_id', $id)->firstOrFail();
        // return response()->json($user);
        $user->login = $request->get('login');
        // $user->password = $request['password'];
        // $edit->update($request->all());

        $user->save();

        return response()->json($user);
    }

    //show user
    public function view(Request $request, $id)
    {
        $user = User::where('user_id',$id)->firstOrFail();
        
        return response()->json($user);
    }

    public function index(Request $request)
    {
        $users = User::all();

        return response()->json($users);
    }

}
