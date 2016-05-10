<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PostsRepository;

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
        return response()->json( $this->postRepo->getAll() );
    }

    /**
     * Display a listing of all posts from a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllByUser($id)
    {
        return response()->json( $this->postRepo->getAllByUser($id) );
    } 

    /**
     * Display a listing of the posts with a specific tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllWithTag($id)
    {
        return response()->json( $this->postRepo->getAllWithTag($id) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return response()->json( $this->postRepo->getBySlug( $slug ) );
    }
}
