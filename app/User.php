<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use App\Boroow;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                
        'login',
        'api_token',
        'password',
    ];


    protected $primaryKey = 'user_id';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at', 
        'password', 
        'remember_token', 
        'api_token',
    ];

    public function borrows()
    {
        return $this->hasMany('App\Borrow', 'user_id', 'user_id');
    }

    public function items(){
        return $this->hasManyThrough('App\Item','App\Borrow', 'user_id', 'item_id' ,'user_id');
    }
}
