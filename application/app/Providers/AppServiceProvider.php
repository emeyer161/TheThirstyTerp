<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Role;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('roles', Role::all()->toArray());
        view()->share('tags', Tag::all()->toArray());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
          return base_path().'/../public_html';
        });
    }
}
