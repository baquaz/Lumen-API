<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//import models for relations
use App\Person;
use App\Item;
use App\Borrow;
use App\User;

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
        $person = Person::create($request->only('person_name','email','phone'));
        $person_id = $person['id'];

        $item_request_array = $request->only(
            'item_name',
            'description',
            'category'
        );

        $item_request_array['person_id'] = $person_id;
        $item = Item::create($item_request_array);

        $item_id = $item['id'];
        
        $borrow_request_array = $request->only(
            'borrow_type',
            'borrow_date',
            'return_date'
        );

        $token = $request->header('api_token');
        $user = User::where('api_token', $token)->first();
        $user_id = $user['user_id'];

        $borrow_request_array['person_id'] = $person_id;
        $borrow_request_array['user_id'] = $user_id;
        $borrow_request_array['item_id'] = $item_id;

        $borrow = Borrow::create($borrow_request_array);

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
