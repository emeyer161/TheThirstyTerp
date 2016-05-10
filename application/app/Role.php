<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    // public function permissions(){
    //     return $this->belongsToMany(Permission::class);
    // }
}
