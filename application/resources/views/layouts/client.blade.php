<!DOCTYPE html>
<html lang="en">

    <head>
        @include('resource.head')
        <title>The Thirsty Terp - @yield('title')</title>
        @yield('head')

        <style>
            body {
                font-family: 'Lato';
            }
            @yield('style')
        </style>
    </head>

    <body id="app-layout">
        @include('resource.analyticstracking')
        <div class="container">
            @include('resource.header')

            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    @yield('content')
                </div>
                <div class="col-sm-3 col-xs-12">
                    @include('client.sidebar')
                </div>
            </div>

            @include('resource.footer')
        
        </div>

        @yield('javascript')
    </body>
</html>
