<?php ?>
@extends('layouts.client')

@section('title', 'Home')

@section('style')
    <style type="text/css">
        .marketing p + h4 {
            padding-right: 15px;
            padding-left: 15px;
            margin: 40px 0;
            margin-top: 28px;
        }

        /* Responsive: Portrait tablets and up */
        @media screen and (min-width: 768px) {
            /* Remove the padding we set earlier */
            .marketing {
                padding-right: 0;
                padding-left: 0;
            }
        }

        .slide{
            height:300px;
            background-size:cover;
        }
    </style>
@stop

@section('content')

    <div class="col-sm-4 col-xs-12 pull-right" style="text-align: center">
        <a class="twitter-timeline" href="https://twitter.com/TheThirstyTerp" data-widget-id="685961120058859520" data-screen-name="TheThirstyTerp" width="100%">Tweets by @TheThirstyTerp</a>
    </div>

    <div class="col-sm-8 col-xs-12">
        <div id="featured" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($features as $i => $f)
                    <li data-target="#featured" data-slide-to={{$i}} class={{$i==0 ? ' active' : ''}}></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach ($features as $i => $f)
                    <div class="slide item{{$i==0 ? ' active' : ''}}" style="background-image:url({{ $f['img_filename'] }}); background-position:center">
                        <a href={{ $f['link_url'] }} target="{{substr( $f['link_url'], 0, 4 ) === 'http' ? '_blank' : ''}}">
                            <img style="height:100%; width:100%"}}>
                            <div class="carousel-caption">
                                <h3>{{ $f['title'] }}</h3>
                                <p>{{ $f['description'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#featured" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <table class="table table-hover table-sm table-striped">
            <thead>
              <tr>
                <th>Posts</th>
              </tr>
            </thead>
            <tbody data-link="row" class="rowlink">
                @foreach($posts as $post)
                    @include('resource.posts.row', Array($post, "cms" => false))
                @endforeach
            </tbody>
        </table>
        @include('resource.pagination', ['data' => $posts])
    </div>

@stop


@section('javascript')
    <script>!function(doc,script,id){var js,fjs=doc.getElementsByTagName(script)[0],p=/^http:/.test(doc.location)?'http':'https';if(!doc.getElementById(id)){js=doc.createElement(script);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
@stop