<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-grid.min.css')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse nav">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="/">Brand</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">maintenance </a>
                                <ul class="dropdown-menu" role="menu">

                                    <li role="presentation"><a href="/sector/show">Sector</a></li>
                                    <li role="presentation"><a href="/subsector/show">Sub Sector</a></li>
                                    <li role="presentation"><a href="/region/show">Region</a></li>
                                    <li role="presentation"><a href="/package/show">Package</a></li>
                                    <li role="presentation"><a href="/os/show">OS</a></li>
                                    <li role="presentation"><a href="/level/show">Level</a></li>
                                    <li role="presentation"><a href="/item/show">Items</a></li>
                                    <li role="presentation"><a href="/assesor/show">Assesor</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Transaction </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="/create_package">Create Package</a></li>
                                    <li role="presentation"><a href="/open_package">Open Package</a></li>
                                    <li role="presentation"><a href="/post_package">Post Package</a></li>
                                    <li role="presentation"><a href="/approve_package">Approve Package</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Reports </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="#">First Item</a></li>
                                    <li role="presentation"><a href="#">Second Item</a></li>
                                    <li role="presentation"><a href="#">Third Item</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->user_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="app">
        @yield('content')
    </div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
