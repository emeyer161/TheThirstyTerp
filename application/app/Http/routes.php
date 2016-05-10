<?php

use App\Repositories\PostsRepository;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([ 'prefix' => 'api' ], function(){
	Route::resource('posts', 'Api\PostsController', ['only' => ['index', 'show']]);
	// Route::resource('comments', 'Api\CommentsController');
    
	// Route::get('tags/{tag}/posts', 'Api\PostsController@getAllWithTag');
	// Route::get('users/{user}/posts', 'Api\PostsController@getAllByUser');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'Client\PostsController@index');
    Route::get('/', 'Client\PostsController@index');

	Route::resource('posts', 'Client\PostsController', ['only' => ['index', 'show']]);

	Route::resource('comments', 'Client\CommentsController');

	// Route::get('user', 'HomeController@index');

	Route::group([ 'middleware' => 'admin', 'prefix' => 'manage' ], function(){
		Route::get('/', function(){
		    return view('cms.index');
		});
	    
		Route::get('tags/{tag}/posts', 'Cms\PostsController@getAllWithTag');
		Route::delete('posts/{id}', 'Cms\PostsController@delete');
	    Route::resource('posts', 'Cms\PostsController');

	    Route::delete('features/{id}', 'Cms\FeaturesController@delete');
	    Route::get('posts/{slug}/feature', 'Cms\FeaturesController@featurePost');
	    Route::resource('features', 'Cms\FeaturesController', ['except' => ['show']]);

		Route::get('users/roles/{roleId}', 'Cms\UsersController@indexOfRole');
		Route::delete('users/{id}', 'Cms\UsersController@delete');
		Route::resource('users', 'Cms\UsersController');
	});
});
