<?php

namespace TheThirstyTerp;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('title', 'body', 'user_id', 'img_filename', 'slug');
    
    protected $casts = [ 
        'id' => 'integer',
        'view_count' => 'integer',

    ];

    public function user(){
    	return $this->hasOne(User::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }
}
