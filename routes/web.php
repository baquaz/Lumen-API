<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

//api v1
$app->group(['prefix' => 'api/v1'], function($app)
{
        //users
        $app->group(['prefix' => 'users'], function($app)
        {
            $app->post('add', 'UsersController@add');

            $app->post('login', 'UsersController@authenticate');

            $app->put('edit/{id}', 'UsersController@edit');

            //Authorized
            $app->group(['middleware' => 'auth'], function($app)
                {
                
                    $app->get('view/{id}', 'UsersController@view');

        
                $app->get('index', 'UsersController@index');
            });
        });
    
        //borrows
        $app->group(['prefix' => 'borrows'], function($app)
        {
            //Authorized
            $app->group(['middleware' => 'auth'], function($app)
            {
                $app->post('add', 'BorrowsController@add');
        
                $app->get('all', 'BorrowsController@index');
            });
        });
    
        //items
        $app->group(['prefix' => 'items'], function($app)
        {
            //Authorized
            $app->group(['middleware' => 'auth'], function($app)
            {
                $app->post('add', 'ItemsController@add');
            });
        });
    
 });
