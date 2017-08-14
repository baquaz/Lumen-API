<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowsController extends Controller
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

    //create new borrow
    public function add(Request $request) {
        $borrow = Borrow::create($request->all());

        return response()->json($borrow);
    }

    //update borrow
    public function edit(Request $request, $id) {
        // $borrow = Borrow::find($id);
        $post->update($request->all());

        return response()->json($post);
    }

    //show borrow
    public function view(Request $request, $id) {
        $user = User::find($id);

        return response()->json($user);
    }

    //index all borrows
    public function index(Request $request) {
        $users = Borrow::with('borrowType', 'item')->first();

        return response()->json($users);
    }
}
