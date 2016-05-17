<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Repositories\UsersRepository;
use App\Role;

use Validator;
use Gate;

class UsersController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UsersRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function getProfile()
	{
	    return view('client.users.user', [
	    	'user' => $this->userRepo->getById( \Auth::user()->id )
	    ]);
	}

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        // if (Gate::denies('update-user', $user->id)) {
        //     abort(403);
        // }

        return view('client.users.user-builder', [
	    	'user' => $this->userRepo->getById( \Auth::user()->id )
	    ]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function updateProfile(Request $request)
	{
		$user = $this->userRepo->getById( \Auth::user()->id );

        // if (Gate::denies('update-user', $user)) {
        //     abort(403);
        // }

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect(action('Client\UsersController@editProfile'))
                        ->withErrors($validator)
                        ->withInput();
        }

		$this->userRepo->update( $request->all(), $user->id );

        return redirect(action('Client\UsersController@getProfile'))->with('message', 'Update Successful');
	}

	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'user_name'     => 'required|max:255|unique:users,user_name,'.\Auth::user()->id,
            'email'         => 'required|max:255|email|unique:users,email,'.\Auth::user()->id
        ]);
    }
}
