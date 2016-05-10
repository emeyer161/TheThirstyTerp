@extends('layouts.cms')

@section('title', 'Posts')
@section('blurb', $blurb)

@section('content')
    <div class="row">
    	<table class="table table-hover table-sm table-striped">
            <tbody data-link="row" class="rowlink">
                @foreach($posts as $post)
                    @include('resource.posts.row', Array($post, "cms" => true))
                @endforeach
            </tbody>
        </table>
    </div><!--/row-->

    @include('resource.posts.pagination', ['data' => $posts])
@stop