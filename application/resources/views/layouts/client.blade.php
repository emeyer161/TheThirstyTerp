<!DOCTYPE html>
<html lang="en">

    <head>
        @include('resource.general.head')
        <title>Thirsty Blog - @yield('title')</title>
        @yield('head')

        <style>
            body {
                font-family: 'Lato';
            }
            @yield('style')
        </style>
    </head>

    <body id="app-layout">
        @include('resource.general.header')
        
        <div class="container">
            @yield('content')
        </div>

        @include('resource.general.footer')
        
        @yield('javascript')
    </body>

</html>
