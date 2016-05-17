<?php
	$prefill = old('user_name') ? (object)old() : $user
?>

@extends('layouts.client')

@section('title', $user->user_name)

@section('style')
@stop

@section('content')
	@section('content')
	@foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			{{ $error }}
		</div>
    @endforeach

    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
            	<h1 class="text-center">Profile</h1>
				<hr>
            	{!! Form::open(array('url'=>action('Client\UsersController@updateProfile'),'method'=>'PUT')) !!}
            		<fieldset class="form-group">
					    <label for="user_name">Username</label>
					    <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $prefill->user_name }}">
					    <small class="text-muted">Choose a unique Username.</small>
					</fieldset>

					<fieldset class="form-group">
						<label for="first_name">First</label>
						<input type="text" class="form-control" name="first_name" id="first_name" value="{{ $prefill->first_name }}">
						<label for="last_name">Last</label>
						<input type="text" class="form-control" name="last_name" id="last_name" value="{{ $prefill->last_name }}">
					</fieldset>

					<fieldset class="form-group">
					    <label for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email" value="{{ $prefill->email }}">
					</fieldset>

				    <input type="hidden" name="_method" value="PUT">
    				<input type="hidden" name="_token"  value="{{ csrf_token() }}">

					<button id="submit" type="submit" class="btn btn-success btn-large" style="float:right">Submit</button>
      			{!! Form::close() !!}
      			<a href="{{action('Client\UsersController@getProfile')}}"><button id="cancel" type="cancel" class="btn btn-default btn-large">Cancel</button></a>
            </div><!-- /.blog-post -->
        </div>
    </div>
@stop