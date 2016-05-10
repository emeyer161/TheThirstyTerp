<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Post extends Model
{
    protected $fillable = array('title', 'description', 'body', 'video_id');
    
    protected $casts = [ 
        'id' => 'integer',
        'view_count' => 'integer',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function features(){
        return $this->hasMany(Feature::class);
    }

    public function prettyTags(){
        return $this->tags()->get(array('name'));
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($post) {
            $post->comments()->delete();
            $post->features()->delete();

            $filename = public_path('img/posts/'.$post->slug.'.png');
            if (File::exists($filename)){
                unlink($filename);
            }
        });
    }
}