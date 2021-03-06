<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link  href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-grid.min.css')}}">

        <!-- Styles -->
        <style>

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div>
        <nav class="navbar navbar-inverse nav">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="/">Brand</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            @if(\App\Http\Controllers\EmployeeInfoController::isUserActive(Auth::user()))
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
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Report </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenance</a>
                                            <ul class="dropdown-menu">
                                                <li role="presentation"><a href="/summary/sector">Sector Summary</a></li>
                                                <li role="presentation"><a href="/summary/subsector">Sub sector Summary</a></li>
                                                <li role="presentation"><a href="/summary/level">Level Summary</a></li>
                                                <li role="presentation"><a href="/summary/region">Region Summary</a></li>
                                                <li role="presentation"><a href="/summary/item">Item Summary</a></li>
                                                <li role="presentation"><a href="/summary/package">Package Summary</a></li>
                                                <li role="presentation"><a href="/summary/occupationstd">OS Summary</a></li>
                                                <li role="presentation"><a href="/summary/assessor">Assesor Summary</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaction</a>
                                            <ul class="dropdown-menu">
                                                <li role="presentation"><a href="/summary/created-package">Created Package Summary</a></li>
                                                <li role="presentation"><a href="/summary/opened-package">Opened Package Summary</a></li>
                                                <li role="presentation"><a href="/summary/posted-package">Posted Package Summary</a></li>
                                                <li role="presentation"><a href="/summary/approve-package">Approved Package Summary</a></li>
                                                <li role="presentation"><a href="/summary/ass-info-package">Assesor Info Summary</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Management</a>
                                            <ul class="dropdown-menu">
                                                <li role="presentation"><a href="/summary/user-summary">User Summary</a></li>
                                                <li role="presentation"><a href="/summary/user-permission">User Permission Summary</a></li>
                                                <li role="presentation"><a href="/summary/user-stat-summary">User Status Summary</a></li>
                                                <li role="presentation"><a href="/summary/user-activity-summary">User Activity Summary</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <h1>You are not allowed to view any page!</h1>
                            @endif
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>

                    @endif
                </div>
            @endif
        </nav>
    </div>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    </body>
</html>
