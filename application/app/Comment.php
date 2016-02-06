<?php

namespace EricMeyer;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = array('post_id', 'body', 'user_id');
    
    protected $casts = [ 
        'id' => 'integer'
    ];

    public function post(){
    	return $this->belongsTo(Post::class);
    }
}
