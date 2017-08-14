<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowTypesController extends Controller
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

    //create borrow type
    public function add(Request $request) {
        // $type = Item::create($request->all());
        
        // return response()->json($item);
    }

    //update borrow type
    public function edit(Request $request, $id) {
        // $user = User::find($id);
        // $post->update($request->all());

        // return response()->json($post);
    }

    //show borrow type
    public function view(Request $request, $id) {
        // $user = User::find($id);

        // return response()->json($user);
    }

    //index all types
    public function index(Request $request) {
        $types = BorrowType::all();

        return response()->json($types);
    }
}
