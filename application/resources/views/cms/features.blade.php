@extends('layouts.cms')

@section('title', 'Features')
@section('blurb', 'Show All')

@section('content')
    <div class="row">
    	<table class="table table-hover table-sm table-striped">
            <tbody data-link="row" class="rowlink">
                @foreach($features as $feature)
                    @include('resource.features.row', $feature)
                @endforeach
            </tbody>
        </table>
    </div><!--/row-->
@stop