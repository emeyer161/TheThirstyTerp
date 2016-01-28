<?php

use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('main');
});

// Route::get('posts/{id}', function($id){
//     // return DB::select('select * from posts where id = ?', [$id]);
//     return Post::find($id);
// });

// // Route::get('posts/{id}', ['middleware' => 'cors', function($id){
// //     $headers = [ 'Access-Control-Allow-Origin'      => 'http://domain.dev', ];
// //     return DB::select('select * from posts where id = ?', [$id]);
// // }]);

// Route::get('posts', function(){
//     return DB::select('select * from posts');
// });

// // Route::get('posts', ['middleware' => 'cors', function(){
// //     $headers = [ 'Access-Control-Allow-Origin'      => 'http://domain.dev', ];
// //     return DB::select('select * from posts');
// // });

// Route::post('posts', function(Request $request){
//     $data = $request->all(); //aka req.body
//     DB::insert('insert into posts (title, body, user_id, img_filename) values (?, ?, ?, ?)', [ $data["title"], $data["body"], $data["user_id"], $data["img_filename"] ]);
//     return DB::select('SELECT * from posts ORDER BY id DESC LIMIT 1');
// });

// Route::put('posts/{id}', function(Request $request, $id){
//     $data = $request->all(); //aka req.body
//     DB::update(
//         'update posts 
//         set title = ?, body = ?, img_filename = ? where id = ?', 
//         [ $data['title'], $data['body'], $data['img_filename'], $id ]
//     );
//     return DB::select('select * from posts where id = ?',[$id]);
// });

// Route::delete('posts/{id}', function($id){
//     return DB::delete('DELETE from posts WHERE id = ?',[$id]);
// });

Route::resource('posts', 'PostsController');

// Route::get('posts', 'PostsController@index'); //run index in posts controller
// Route::get('posts/:id', 'PostsController@show');
// Route::post('posts', 'PostsController@create');
// Route::put('posts/:id', 'PostsController@update');
// Route::delete('posts/:id', 'PostsController@destroy');

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

Route::group(['middleware' => ['web']], function () {
    //
});
