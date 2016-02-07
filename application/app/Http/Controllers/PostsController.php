<?php namespace TheThirstyTerp\Http\Controllers;

use TheThirstyTerp\Http\Requests;
use TheThirstyTerp\Http\Controllers\Controller;
use TheThirstyTerp\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        foreach ($posts as $post){
            $post['comments'] = $post->comments;
            $post['tags'] = $post->tags()->lists('name')->toArray();
        }
        
        return $posts;
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
        $data['slug'] = Str::slug($data['title']);
        
        return Post::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $post['comments'] = $post->comments;
        $post['tags'] = $post->tags()->lists('name')->toArray();

        return $post;
        // return Post::where('slug',$slug)->first();
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
        // Post::update($id, $request->all())
        $post = Post::find($id);
        $post->fill( $request->all() );
        // $post->slug = Str::slug($post->title);  // Update slug (Bad idea)
        $post->save();
        
        return Post::find($id);
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
