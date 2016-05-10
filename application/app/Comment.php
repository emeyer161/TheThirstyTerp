<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = array('post_id', 'body', 'user_id');
    
    protected $casts = [ 
        'id' => 'integer',
        'post_id' => 'integer'
    ];

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}