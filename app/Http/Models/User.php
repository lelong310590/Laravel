<?php

namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'lar_users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_login', 'user_password', 'user_email', 'user_info', 'created_at', 'user_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function getAuthPassword () {
        return $this->user_password;
    }

    public function post () {
        return $this->hasMany('App\Http\Models\Post');
    }
}
