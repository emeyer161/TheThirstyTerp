<?php
	// dd($user->posts);
?>

@extends('layouts.cms')

@section('title', $user['attributes']['user_name'])
@section('blurb', $user['attributes']['first_name'].' '.$user['attributes']['last_name'].' | '.$user['role']['name'])

@section('style')
@stop

@section('content')
    <h2>Posts</h2>
    <div class="row">
        <table class="table table-hover table-sm table-striped">
            <tbody data-link="row" class="rowlink">
                @foreach($user->posts->items() as $post)
                    @include('resource.posts.row', Array($post, "cms" => true))
                @endforeach
            </tbody>
        </table>
    </div><!--/row-->
    @include('resource.posts.pagination', ['data' => $user->posts])
@stop