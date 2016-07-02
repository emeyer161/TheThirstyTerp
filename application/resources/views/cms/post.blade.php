@extends('layouts.cms')

@section('title', 'Posts')
@section('blurb', '<b>View:</b> '.$post['title'].'<br> <b>Page Views:</b> '.$post->page_views ) 
@section('link')
    @can('features')
        <a class="btn btn-warning btn-large" href={{ action('Cms\FeaturesController@featurePost', ['slug' => $post['slug']]) }} role="button"><span class="glyphicon glyphicon-star"></a>
    @endcan
    @can('change-post', $post['id'])
        <a class="btn btn-default btn-large" href={{ action('Cms\PostsController@edit', ['slug' => $post['slug']]) }} role="button">Edit Post &raquo;</a>
       @include('resource.delete-button', array('url' => action('Cms\PostsController@delete', ['id' => $post['id']]) ))
    @endcan
@stop

@section('style')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                @include('resource.posts.single', $post)
				
				<hr>

				<h3>Comments</h3>
				@foreach($post['comments'] as $comment)
	                @include('resource.comments.row', $comment)
	            @endforeach
	    	</div>
    	</div>
    </div>
@stop