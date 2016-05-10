@section('style')
    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
@stop

<div class="container">
    <div id="titleBar" style="height:100px; position: relative; z-index: 10; background-image:url('/img/emptyLogo.jpg'); background-size:contain; background-repeat:repeat-x">
        <img src="/img/mainLogo.png" style="position:relative; display:block; margin:auto; top:10%; height:80%; width:auto;">
    </div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">The Thirsty Terp</a>
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dropdown_menu" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse" id="dropdown_menu">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li><a href="#">Sports</a></li> -->
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right container-fluid">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        @if (!Auth::guest() && Auth::user()->cmsEntry())
                            <li><a href="{{ url('/manage') }}">Content Manager</a></li>
                        @endif
                        <li class="dropdown">
                            <a a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul role="menu" class="dropdown-menu">
                                <!-- <li><a href="{{ url('/user') }}"><i class="fa fa-btn"></i>Profile</a></li> -->
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
