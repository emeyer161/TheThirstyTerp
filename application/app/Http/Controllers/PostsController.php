<?php namespace EricMeyer\Http\Controllers;

use EricMeyer\Http\Requests;
use EricMeyer\Http\Controllers\Controller;
use EricMeyer\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::paginate(5); //Post::all()->paginate() or something NOPE
        //Post::orderBy('created_at', 'desc')->paginate('');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); //aka req.body
        
        $newPost = Post::create($data);
        
        return $newPost;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Post::update($id, $request->all()) ????
        $post = Post::find($id);
        
        $post->fill( $request->all() );
        $post->save();
        $post->push();
        
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        
        return '';
    }
    
}
