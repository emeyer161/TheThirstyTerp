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
        @include('resource.header')
        
        <div class="container">
            @yield('content')
        </div>

        @include('resource.footer')
        
        @yield('javascript')
    </body>

</html>
