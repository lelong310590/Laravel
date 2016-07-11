<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Taxonomies extends Model
{
    protected $table = 'lar_taxonomy';

    protected $guarded = [];

    public function post()
    {
        return $this->belongsToMany('App\Http\Models\Post');
    }

}
