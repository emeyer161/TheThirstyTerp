<?php

namespace EricMeyer;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('title', 'body', 'user_id', 'img_filename', 'slug');
    
    protected $casts = [ 
        'id' => 'integer',
        'page_views' => 'integer',
    ];
}
