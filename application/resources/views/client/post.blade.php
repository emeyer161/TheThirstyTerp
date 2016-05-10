@extends('layouts.client')

@section('style')
@stop

@section('content')
	<div class="col-sm-9 blog-main">
		@include('resource.posts.single', $post)
		
		<hr>

		<h2>Comments</h2>
		@foreach($post['comments'] as $comment)
            @include('resource.comments.single', $comment)
        @endforeach
		
		@if(!Auth::guest())
			@include('resource.comments.create', $post)
		@endif
	</div>
@stop
