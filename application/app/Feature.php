<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Feature extends Model
{
	protected $primaryKey = 'id';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('post_id', 'title', 'description', 'img_filename', 'link_url');
    
    protected $casts = [ 
        'id' => 'integer',
    ];

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($feature) {
            $filename = public_path($feature->img_filename);
            if ($feature->img_filename && File::exists($filename)){
                unlink($filename);
            }
        });
    }
}
