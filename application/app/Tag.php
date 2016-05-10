<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = array('name');

	protected $hidden = array('pivot');

    public function posts(){
    	return $this->belongsToMany(Post::class);
    }
}
