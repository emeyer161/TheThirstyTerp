@extends('layouts.client')

@section('title', $post->title)

@section('style')
@stop

@section('content')
	@include('resource.posts.single', $post)
	
	<hr>
	
	<div id="comments">
		<h3 style="text-align:center; margin-bottom:30px">Comments</h3>

		<div id="comment-list">
			@foreach($post->comments as $comment)
		        @include('resource.comments.row', $comment)
		    @endforeach
		</div>
		
		@if(!Auth::guest())
			@include('resource.comments.create', $post)
		@endif
	</div>
@stop