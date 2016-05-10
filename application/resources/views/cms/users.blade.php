@extends('layouts.cms')

@section('title', 'Users')
@section('blurb', $blurb)

@section('content')
	<div class="table-responsive">
		<table class="table table-hover table-sm table-striped">
		    <thead>
		      <tr>
		      	<th>User</th>
		        <th>Name</th>
		        <th>Email</th>
		        <th>Role</th>
	        	<th></th>
		      </tr>
		    </thead>
		    <tbody data-link="row" class="rowlink">
		      	@foreach($users as $user)
		            @include('resource.users.row', Array($user, "cms" => true))
		    	@endforeach
		    </tbody>
	  	</table>
	 </div>
	 @include('resource.posts.pagination', ['data' => $users])
@stop