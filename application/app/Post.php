<?php

namespace EricMeyer;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('title', 'body', 'user_id', 'img_filename');
    
    protected $casts = [ 
        'ID' => 'integer',
        'page_views' => 'integer',
        ];
}
