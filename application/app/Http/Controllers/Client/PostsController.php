<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Repositories\PostsRepository;
use App\Repositories\FeaturesRepository;
use App\User;

use Gate;

class PostsController extends Controller
{
    public function __construct(PostsRepository $postRepo, FeaturesRepository $featuresRepo)
    {
        $this->postRepo = $postRepo;
        $this->featuresRepo = $featuresRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.posts', [
            'posts' => $this->postRepo->getAll(),
            'features' => $this->featuresRepo->getAllClean()
        ]);
    }

    /**
     * Display a listing of all posts from a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllByUser($id)
    {
        return view('client.posts', [
            'user'  => User::find($id),
            'posts' => $this->postRepo->getAllByUser($id)
        ]);
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('client.post', [
	    	'post' => $this->postRepo->getBySlug( $slug )->toArray()
	    ]);
    }
}