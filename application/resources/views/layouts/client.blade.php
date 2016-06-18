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

        {{-- <a title="Real Time Web Analytics" href="http://clicky.com/100965820"><img alt="Real Time Web Analytics" src="//static.getclicky.com/media/links/badge.gif" border="0" /></a> --}}
        <script src="//static.getclicky.com/js" type="text/javascript"></script>
        <script type="text/javascript">try{ clicky.init(100965820); }catch(e){}</script>
        <noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100965820ns.gif" /></p></noscript>
        @yield('javascript')
    </body>
</html>
