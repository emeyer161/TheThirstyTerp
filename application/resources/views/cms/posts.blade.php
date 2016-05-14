@extends('layouts.cms')

@section('title', 'Posts')
@section('blurb', $blurb)

@section('content')
    <div class="row">
    	<table class="table table-hover table-sm table-striped" style="table-layout:fixed">
            <tbody data-link="row" class="rowlink">
                @foreach($posts as $post)
                    @include('resource.posts.row', Array($post, "cms" => true))
                @endforeach
            </tbody>
        </table>
    </div><!--/row-->

    @include('resource.pagination', ['data' => $posts])
@stop