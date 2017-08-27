<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Person;

class PersonsController extends Controller
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

    public function add(Request $request) {
                
        $user = Person::create($request->all());

        return response()->json([
            'msg' => 'User has been added to database.'            
        ]);
    }

}
