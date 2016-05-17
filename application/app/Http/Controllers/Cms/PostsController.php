<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;

use Image;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use App\Repositories\PostsRepository;
use App\User;
use App\Tag;
use File;
use Gate;

class PostsController extends Controller
{
    public function __construct(PostsRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.posts', [
	    	'posts'  => $this->postRepo->getAll(),
            'blurb'  => 'Show All'
	    ]);
    }

    /**
     * Display a listing of the posts with a specific tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllWithTag($id)
    {
        return view('cms.posts', [
            'posts'  => $this->postRepo->getAllWithTag($id),
            'blurb'  => 'With Tag: '.Tag::find($id)['name']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Gate::denies('create-post')) { abort(403); }

        return view('cms.post-builder', ['post' => false] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('create-post')) { abort(403); }

        $request['slug']  = Str::slug($request->title);
        $validator = \Validator::make($request->all(), [
            'title'    => 'required|unique:posts,title|min:1|max:255',
            'body'     => 'required|min:1',
            'slug'     => 'required|unique:posts,slug',
            'image'    => 'mimes:jpeg,png,gif'
        ]);
        if ($validator->fails()) {
            return redirect(action('Cms\PostsController@create'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $post = $this->postRepo->create( $request->all() ); //aka req.body
        $this->makeImage($request, $post);

        return redirect(action('Cms\PostsController@show', ['slug' => $post['slug']]))
            ->with('message', 'Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('cms.post', ['post' => $this->postRepo->getBySlug( $slug ) ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = $this->postRepo->getBySlug( $slug );
        if (Gate::denies('change-post', $post->id)) { abort(403); }

        return view('cms.post-builder', [ 'post' => $post ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = $this->postRepo->getBySlug( $slug );
        if (Gate::denies('change-post', $post->id)) { abort(403); }

        $validator = \Validator::make($request->all(), [
            'title'    => 'required|min:1|max:255|unique:posts,title,'.$post['id'],
            'body'     => 'required|min:1',
            'image'    => 'mimes:jpeg,png,gif'
        ]);
        if ($validator->fails()) {
            return redirect(action('Cms\PostsController@edit', [
                'slug' => $post['slug'],
            ]))
            ->withErrors($validator)
            ->withInput();
        }

        $post = $this->postRepo->update( $request->all(), $slug );
        $this->makeImage($request, $post);

    	return redirect(action('Cms\PostsController@show', ['slug' => $post['slug']]))
            ->with('message', 'Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = $this->postRepo->getById( $id );
        if (Gate::denies('change-post', $post)) { abort(403); }

        $this->postRepo->delete( $post );
        return redirect(action('Cms\PostsController@index'))->with('message', 'Delete Successful');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->postRepo->getById( $id );
        if (Gate::denies('change-post', $post)) { abort(403); }

        $this->postRepo->destroy( $id );
        return redirect(action('Cms\PostsController@index'))->with('message', 'Delete Successful');
    } 

    private function makeImage($request, $post)
    {
        $path   = public_path( 'img/posts/'.$post['slug'].'.png' );
        if($request->file('image')){
            $image  = $request->file('image');
            Image::make($image->getRealPath())->encode('png')->save($path);
        } else if($post->video_id && !File::exists(public_path('img/posts/'.$post['slug'].'.png'))){
            try{
                Image::make('http://img.youtube.com/vi/'.$post['video_id'].'/0.jpg')->encode('png')->save($path);
            } catch (\Exception $e) {
                return redirect(action('Cms\PostsController@edit', [
                    'slug' => $post['slug'],
                ]))
                ->withErrors(array('video_id' => 'Invalid Video ID'))
                ->withInput();
            }
        }
    }
}
