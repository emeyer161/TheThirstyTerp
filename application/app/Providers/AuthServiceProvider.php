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
            if (!$user->cmsEntry()){
                return false;
            } else if ($user->is('SuperAdmin') && ($ability != 'update-user-role')) {
                return true;
            }
        });

        $gate->define('update-user-role', function ($user, $user2) {
            if ($user->is('SuperAdmin')) {
                return !$user2->is('SuperAdmin');
            } else if ($user->is('Admin')) {
                return !($user2->is('Admin') || $user2->is('SuperAdmin'));
            }
        });

        $gate->define('features', function($user){
            return $user->is('Admin');
        });

        $gate->define('create-post', function($user){
            return $user->is('Admin') || $user->is('Writer');
        });

        $gate->define('update-post', function ($user, $id) {
            if ($user->is('Writer')) {
                return $user->id === Post::where('id', $id)->get()->first()['user_id'];
            }
            return $user->is('Admin');
        });

        $gate->define('destroy-post', function ($user, $id) {
            if ($user->is('Writer')) {
                return $user->id === Post::where('id', $id)->get()->first()['user_id'];
            }
            return $user->is('Admin');
        });

        $gate->define('destroy-user', function ($user, $user2) {
            return ($user->is('Admin') && $user2->is('Reader'));
        });
    }
}
