<?php
	if(old('title')){
		$prefill = old();
		if(!isset($prefill['tagsClean']) && old('tags')){
			$prefill['tagsClean'] = old('tags');
		}
	} else {
		$prefill = $post ? $post : ['title' => null, 'body' => null, 'video_id' => null, 'tagsClean' => []];
	}
?>

@extends('layouts.cms')

@section('title', 'Posts')
@section('blurb', $post ? 'Edit: '.$post['title'] : 'Create New' )
@section('link')
	@if ($post)
		@include('resource.delete-button', array('url' => action('Cms\PostsController@delete', ['id' => $post['id']]) ))
	@endif
@stop

@section('style')
@stop

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
            	{!! Form::open(array('url'=>$post
            			? action('Cms\PostsController@update', ['slug' => $post['slug']])
            			: action('Cms\PostsController@store')
            		,'method'=>'POST', 'files'=>true)) !!}
            		<fieldset class="form-group">
					    <label for="title">Title</label>
					    <input type="text" class="form-control" name="title" id="title" value="{{ $prefill['title'] }}" placeholder="Enter Title">
					    <small class="text-muted">Choose a unique title.</small>
					</fieldset>

				    <fieldset class="form-group">
					    <label for="tags">Tags</label><br>
					    <div class="btn-group" data-toggle="">
						    @foreach($tags as $tag)
								<label class="btn btn-default">
									<input type="checkbox" name="tags[]" id="{{$tag['name']}}" value="{{$tag['name']}}" 
									{{in_array($tag['name'], $prefill['tagsClean']) ?'checked' :''}}
									{{$tag['name']=="Video" ? "onclick=toggleVideo()" : '' }}> {{$tag['name']}}
								</label>
							@endforeach
						</div>
					</fieldset>

					<fieldset class="form-group" id="video-input" style="{{in_array('Video', $prefill['tagsClean']) ?'' :'display:none'}}">
						<label for="video_id">YouTube Video ID</label>
						<input type="text" class="form-control" name="video_id" id="video_id" value="{{$prefill['video_id']}}">
						<small class="text-muted">Found in YouTube URL after <b>watch?v=</b> and before special characters such as <b>&</b>.</small><br>
						<small class="text-muted">https://www.youtube.com/watch?v=<b><u>qvAwjugYfrA</u></b>&list=UUaQNtpoeCscUS6OG-7LjobQ</small>
					</fieldset>

					<fieldset class="form-group">
						<label for="image">Image</label>
						<small class="text-muted">.jpg .png or .gif</small>
						<input type="file" class="form-control" name="image" id="image">
						<small class="text-muted">This will replace any previous image.</small>
					</fieldset>

					<fieldset class="form-group">
					    <label for="body">Body</label>
					    <small class="text-muted">Pasting content may cause formatting issues.</small>
					    <textarea class="form-control" name="body" id="body" rows="20">{!! $prefill['body'] !!}</textarea>
					</fieldset>

				    <input type="hidden" name="_method" value="{{ $post ? 'PUT' : 'POST' }}">
    				<input type="hidden" name="_token"  value="{{ csrf_token() }}">

					<button id="submit" type="submit" class="btn btn-success btn-large" style="float:right">Submit</button>
      			{!! Form::close() !!}
      			<a href="{{action('Cms\PostsController@index')}}"><button id="cancel" type="cancel" class="btn btn-default btn-large">Cancel</button></a>
            </div><!-- /.blog-post -->
        </div>
    </div>
@stop

@section('javascript')
	<script>
		tinymce.init({ 
			selector:'textarea',
			menubar: 'false',
			plugins: "link",
			body_class: 'form-control'
		});

	    $('.btn-group').button();


	    function toggleVideo() {
		    if ($('#Video').prop('checked')) {
		    	$('#video-input').show();
		    } else {
		    	$('#video-input').hide();
		    	$('#video_id').val('');
		    }
		}
	</script>
@stop







