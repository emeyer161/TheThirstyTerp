@extends('layouts.client')

@section('title', $post->title)

@section('style')
@stop

@section('content')
	<div class="col-sm-9 blog-main">
		@include('resource.posts.single', $post)
		
		<hr>

		<h3>Comments</h3>
		@foreach($post->comments as $comment)
            @include('resource.comments.row', $comment)
        @endforeach
		
		@if(!Auth::guest())
			@include('resource.comments.create', $post)
		@endif
	</div>
@stop