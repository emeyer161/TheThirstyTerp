@extends('layouts.client')

@section('title', $user->user_name)

@section('style')
@stop

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
            	<h1 class="text-center">Profile</h1>
				<hr>
				<h3>Username</h3>
				{{$user->user_name}}
				<h3>Name</h3>
				{{$user->first_name.' '.$user->last_name}}
				<h3>Email Address</h3>
				{{$user->email}}
			</div>
		</div>
	</div>
@stop