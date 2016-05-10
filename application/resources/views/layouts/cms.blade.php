<!DOCTYPE html>
<html lang="en">

    <head>
        @include('resource.general.head')
        <title>Thirsty Content Manager - @yield('title')</title>
        @yield('head')

        <style>
            @yield('style')
        </style>
    </head>

    <body id="app-layout">
        @include('resource.general.header')
        <div class="container">
            @include('cms.sidebar')
            <div class="col-xs-12 col-sm-9">
                <div class="jumbotron">
                    <h1>@yield('title')</h1>
                    <p>@yield('blurb')</p>
                    <p>@yield('link')</p>
                </div>
                @yield('content')
            </div><!--/.col-xs-12.col-sm-9-->
        </div><!--/.container-->
        @include('resource.general.footer')

        @yield('javascript')
    </body>

</html>