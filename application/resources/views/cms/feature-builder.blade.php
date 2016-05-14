<?php
	if(old('title')){
		$prefill = old();
	} else if ($feature) {
		$prefill = $feature;
	} else if ($post) {
		$prefill = ['title' => $post['title'], 'description' => substr(strip_tags($post['body']), 0, 255), 'link_url' => '/posts/'.$post['slug']];
	} else {
		$prefill = ['title' => null, 'description' => null, 'link_url' => null];
	}
?>

@extends('layouts.cms')

@section('title', 'Features')
@section('blurb', $prefill['title'] ? $prefill['title'] : 'Create New' )
@section('link')
	@if ($feature)
		@include('resource.delete-button', array('url' => action('Cms\FeaturesController@destroy', ['id' => $feature['id']]) ))
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
            	{!! Form::open(array('url'=>$feature
            			? action('Cms\FeaturesController@update', ['id' => $feature['id']])
            			: action('Cms\FeaturesController@store')
            		,'method'=>'POST', 'files'=>true)) !!}
					
            		<fieldset class="form-group">
					    <label for="title">Title</label>
					    <input type="text" class="form-control" name="title" id="title" value="{{ $prefill['title'] }}" placeholder="Enter Title">
					    <small class="text-muted">Choose a unique title.</small>
					</fieldset>

					<fieldset class="form-group">
						<label for="image">Upload Image</label>
						<small class="text-muted">.jpg .png or .gif</small>
						<input type="file" class="form-control" name="image" id="image">
						<small class="text-muted">This will replace any previous image.</small>
					</fieldset>

					@if($post)
						<input type="hidden" name="post_id" id="post_id" value="{{ $post['id'] }}">
						<input type="hidden" name="link_url" id="link_url" value="{{ '/posts/'.$post['slug'] }}">
					@elseif(!$feature['post'])
						<fieldset class="form-group">
						    <label for="link_url">Link URL</label>
						    <input type="text" class="form-control" name="link_url" id="link_url" value="{{ $prefill['link_url'] }}" placeholder="Enter URL">
							<small class="text-muted">Include full url including <b>http://</b> or <b>https://</b>.</small>
						</fieldset>
					@endif

					<fieldset class="form-group">
					    <label for="description">Description</label>
					    <input class="form-control" name="description" id="description" rows="20" value="{!! $prefill['description'] !!}">
					    <small class="text-muted">Describe in 255 characters or less, Twitter style.</small>
					</fieldset>

				    <input type="hidden" name="_method" value="{{ $feature ? 'PUT' : 'POST' }}">
    				<input type="hidden" name="_token"  value="{{ csrf_token() }}">
						
					<button id="submit" type="submit" class="btn btn-success btn-large" style="float:right">Submit</button>
      			{!! Form::close() !!}
				<a href="{{action('Cms\FeaturesController@index')}}"><button id="cancel" type="cancel" class="btn btn-default btn-large">Cancel</button></a>	
            </div><!-- /.blog-feature -->
        </div>
    </div>
@stop



