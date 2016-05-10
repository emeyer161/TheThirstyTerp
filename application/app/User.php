<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{

    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'first_name','last_name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function postsPaginated()
    {
        return $this->posts()->paginate(20);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function cmsEntry()
    {
        if ($this->role['name'] && ($this->role['name'] != 'Reader'))
        {
            return true;
        }

        return false;
    }

    public function is($roleName)
    {
        if ($this->role['name'] == $roleName)
        {
            return true;
        }
        return false;
    }

    public function isAtLeast($roleName)
    {
        if ($this->role['id'] <= Role::where('name',$roleName)->get()->first()->toArray()['id'] )
        {
            return true;
        }
        return false;
    }
}
