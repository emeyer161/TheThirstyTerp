<?php namespace TheThirstyTerp\Http\Controllers;

use TheThirstyTerp\Http\Requests;
use TheThirstyTerp\Http\Controllers\Controller;
use TheThirstyTerp\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	    return User::all();
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
	    
	    return User::create($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
	    return User::find($id);
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
	    // User::update($id, $request->all())
	    $user = User::find($id);
	    $user->fill( $request->all() );
	    $user->save();
	    
	    return User::find($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	    User::destroy($id);
	    
	    return '';
	}
}
