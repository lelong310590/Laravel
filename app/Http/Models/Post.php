<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table   = 'lar_posts';
	
	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('App\Http\Models\User', 'post_author', 'id');
	}

	public function categories()
	{
		return $this->belongsToMany('App\Http\Models\Categories');
	}
}
