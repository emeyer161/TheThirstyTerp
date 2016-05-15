<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;

use Image;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Repositories\FeaturesRepository;
use App\Repositories\PostsRepository;
use App\Feature;

use File;
use Gate;

class FeaturesController extends Controller
{
    public function __construct(FeaturesRepository $featureRepo, PostsRepository $postRepo)
    {
        $this->featureRepo  = $featureRepo;
        $this->postRepo     = $postRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.features', [
	    	'features' => $this->featureRepo->getAllClean(),
	    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function featurePost($slug)
    {
        if (Gate::denies('features')) { abort(403); }

        return view('cms.feature-builder', [
            'feature' => false,
            'post'    => $this->postRepo->getBySlug($slug)
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
        if (Gate::denies('features')) { abort(403); }

        return view('cms.feature-builder', [
            'feature' => false,
            'post'    => false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('features')) { abort(403); }

        $validator = \Validator::make($request->all(), [
            'title'    => 'required|min:1|max:255|unique:features,title',
            'image'    => 'mimes:jpeg,png,gif'
        ]);
        if ($validator->fails()) {
            return redirect(action('Cms\FeaturesController@create'))
                ->withErrors($validator)
                ->withInput();
        }

        $feature = $this->featureRepo->create( $request->all() );
        $this->makeImage($request, $feature);

        return redirect(action('Cms\FeaturesController@index'))
            ->with('message', 'Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = $this->featureRepo->getById( $id );
        if (Gate::denies('features', $feature->id)) { abort(403); }

        return view('cms.feature-builder', [
	    	'feature' => $this->featureRepo->getByIdClean( $id ),
            'post'    => false
	    ]);
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
        $feature = $this->featureRepo->getByid( $id );

        $validator = \Validator::make($request->all(), [
            'title'    => 'required|min:1|max:255|unique:features,title,'.$feature->id,
            'image'    => 'mimes:jpeg,png,gif'
        ]);
        if ($validator->fails()) {
            return redirect(action('Cms\FeaturesController@edit', [
                    'id' => $id
                ]))
                ->withErrors($validator)
                ->withInput();
        }

        if (Gate::denies('features', $feature->id)) { abort(403); }

        $this->featureRepo->update( $request->all(), $id );
        $this->makeImage($request, $feature);

    	return redirect(action('Cms\FeaturesController@index'))
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
        $feature = $this->featureRepo->getById( $id );
        if (Gate::denies('features', $feature)) {
            abort(403);
        }

        $this->featureRepo->delete( $feature );
        return redirect(action('Cms\FeaturesController@index'))->with('message', 'Delete Successful');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = $this->featureRepo->getById( $id );
        if (Gate::denies('features', $feature)) {
            abort(403);
        }

        $this->featureRepo->destroy( $id );
        return redirect(action('Cms\FeaturesController@index'))->with('message', 'Delete Successful');
    }

    private function makeImage($request, $feature)
    {
        $featurePath    = public_path( 'img/features/'.$feature->id.'.png' );

        if($request->file('image')){
            Image::make( $request->file('image')->getRealPath() )
                ->encode('png')->save($featurePath);
        } elseif ($feature->post_id && !File::exists($featurePath)){
            if (File::exists(public_path('img/posts/'.$feature->post->slug.'.png'))){
                Image::make( public_path('img/posts/'.$feature->post->slug.'.png') )
                    ->encode('png')->save($featurePath);
            }
        }
    }
}
