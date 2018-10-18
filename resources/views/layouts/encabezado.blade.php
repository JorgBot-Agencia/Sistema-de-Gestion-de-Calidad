<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#cf3434">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
   
    <title>Sistema Int. Gestión</title>

    <!-- Styles -->
<link href="{{ asset('css/misestilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app" style="background: #f1f1f2">
        <nav class="navbar navbar-default navbar-static-top" style="background: #a50029;">
            <div class="container" >
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" >
                        <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                          <span class="icon-bar"></span>

                    </button>
                     @if (Auth::guest())
                 <a style="color: #fff; font-size: 14px" class="navbar-brand" href="{{ url('/') }}">
                       <span class="glyphicon glyphicon-home"></span> INICIO
                    </a>
                 @else
                    <!-- Branding Image -->
                    <a style="color: #fff; font-size: 14px" class="navbar-brand" href="{{ url('login') }}">
                       <span class="glyphicon glyphicon-home"></span> INICIO
                    </a>
                    <a style="color: #fff; font-size: 14px" class="navbar-brand" href="{{ url('login') }}">
                       
                    </a>
                     <a style="color: #fff; font-size: 14px" class="navbar-brand" href="{{ url('login') }}">
                       
                    </a>
                     <a style="color: #fff; font-size: 14px" class="navbar-brand" href="{{ url('login') }}">
                      
                    </a>
                    @endif

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                         <!--   <li><a  style="color: #fff" href="">Login</a></li>
                            <li><a  style="color: #fff" href="">Register</a></li>-->
                        @else
                            <li class="dropdown">
                                <a  style="color: #fff" >
                                    <span style="font-size: 16px" class="glyphicon glyphicon-user"></span>
                                    {{ Auth::user()->name }}
                                </a>
                                </li>

                                    <li>
                                        <a style="color: #fff" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           Salir
                                            <span style="font-size: 16px" class="glyphicon glyphicon-remove-circle"></span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>


                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col-md-10 col-md-offset-1" style="background: white; border: 1px solid #2d2d2d; padding-bottom: 0; margin-bottom: 0.5em;">
        <div style="background: white; width: 20%; display: inline-block; height: 75px; float: left; border-right: 1px solid #2d2d2d">
            <img style="max-width: 160px; margin-top: 1em;" src="img/logoprocar.png">
        </div>
        <div style="font-family:open sans; background: white; width: 60%; padding-top: 8px; display: inline-block; text-align: center; float: left;  height: 75px; border-right: 1px solid #2d2d2d">
            <h5 style="color: #ab1137; font-family:open sans;" ><strong>{{$titulo1}}</strong> </h5>
            <h5 style="color:#000; font-family:open sans;"><strong>{{$titulo2}}</strong> </h5>
        </div>
        <div style="background: white; width: 20%; display: inline-block; text-align: center;">
                <div style="font-family:open sans; float: right; color: #000; ">
                    <h5 style="margin: 6px; font-family:open sans;"><strong>F - SIG - 01</strong></h5>
                    <h5 style="margin: 6px; font-family:open sans;"><strong>VERSIÓN 03</strong></h5>
                    <h5 style="padding-top: 0; font-family:open sans; margin-bottom: -3px;"><strong>NOVIEMBRE DE 2016</strong></h5>
                </div>
        </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
     @yield('script')
