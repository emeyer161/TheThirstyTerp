<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;
use App\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->before(function ($user, $ability) {
            if (!$user->cmsEntry() && ($ability != 'delete-comment')){
                return false;
            } else if ($user->is('SuperAdmin') && ($ability != 'change-user')) {
                return true;
            }
        });

        $gate->define('change-user', function ($user, $user2) {
            if (($user->is('SuperAdmin') || $user->is('Admin')) && ($user->rank() < $user2->rank())){
                return true;
            }
            return false;
        });

        $gate->define('features', function($user){
            return $user->is('Admin');
        });

        $gate->define('create-post', function($user){
            return $user->is('Admin') || $user->is('Writer');
        });

        $gate->define('change-post', function ($user, $id) {
            if ($user->is('Writer')) {
                return $user->id == Post::find($id)->user_id;
            }
            return $user->is('Admin');
        });

        $gate->define('delete-comment', function($user, $comment) {
            return $user->id == $comment->user->id;
        });
    }
}
