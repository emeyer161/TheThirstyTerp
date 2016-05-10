<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Repositories\UsersRepository;
use App\Role;

use Gate;

class UsersController extends Controller
{
    public function __construct(UsersRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cms.users', [
	    	'users' => $this->userRepo->getAll(),
	    	'blurb' => 'Show All'
	    ]);
	}

	/**
	 * Display a listing of the users with a specific role.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function indexOfRole($id)
	{
		return view('cms.users', [
	    	'users' => $this->userRepo->getAllByRole($id),
	    	'blurb' => 'By Role: '.Role::find($id)['name']
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
		$request['role_id'] = max(Role::all()->toArray())['id'];
		$request['password'] = bcrypt($request['password']);
	    return $this->userRepo->create( $request->all() );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
	    return view('cms.user', [
	    	'user' => $this->userRepo->getByIdWithPosts( $id )
	    ]);
	}

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepo->getById( $id );

        if (Gate::denies('update-user', $user->id)) {
            abort(403);
        }

        return view('cms.user-builder', [
	    	'user' => $user
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
		$user = $this->userRepo->getById( $id );

        if (Gate::denies('update-user', $user)) {
            abort(403);
        }

		$this->userRepo->update( $request->all(), $id );

		return Redirect::back()->with('message','Operation Successful!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete($id)
	{
		$user = $this->userRepo->getById($id);
		if (Gate::denies('destroy-user', $user)) {
            abort(403);
        }

	    $this->userRepo->delete( $user );
        return redirect(action('Cms\UsersController@index'))->with('message', 'Delete Successful');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$user2 = $this->userRepo->getById($id);
		if (Gate::denies('destroy-user', $user2)) {
            abort(403);
        }

	    $this->userRepo->destroy( $id );
        return redirect(action('Cms\UsersController@index'))->with('message', 'Delete Successful');
	}

}
