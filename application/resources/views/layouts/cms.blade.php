<!DOCTYPE html>
<html lang="en">

    <head>
        @include('resource.head')
        <title>Thirsty Content Manager - @yield('title')</title>
        @yield('head')

        <style>
            @yield('style')
        </style>
    </head>

    <body id="app-layout">
        <div class="container">
            @include('resource.header')
            
            <div class='row'>
                <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar">
                    @include('cms.sidebar')
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="jumbotron">
                        <h1>@yield('title')</h1>
                        <p>@yield('blurb')</p>
                        @yield('link')
                    </div>
                    @yield('content')
                </div>
            </div>

            @include('resource.footer')
        </div><!--/.container-->

        @yield('javascript')

    </body>

</html>