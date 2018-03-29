<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link  href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-grid.min.css')}}">
    <link href="{{ URL::asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-submenu.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>
    <script src="{{ URL::asset('js/respond.min.js') }}"></script>
	<title>ET-TVET SYSTEM</title>
	{{--<style>--}}
		{{--.nav{--}}
			{{--background: lightgray;--}}
		{{--}--}}
		{{--body{--}}
			{{--background: ;--}}
			{{--color: black;--}}
		{{--}--}}
	{{--</style>--}}
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
                        @endif
                    @endif
                </ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
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
                                <li><a href="/changepassword">Change Password</a> </li>
							</ul>
						</li>
                        <li class=""><a role="button" href="{{ url('/home') }}">Home</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	</div>

	<div class="container-fluid">
        {{--@if(\App\Http\Controllers\EmployeeInfoController::isUserActive(Auth::user()))--}}
        @yield('content')
        {{--@else--}}
            {{--<h1>You are not allowed to view any page!</h1>--}}
        {{--@endif--}}


	</div>
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-submenu.min.js') }}"></script>
    <script>
        $('.dropdown-submenu > a').submenupicker();
    </script>
	@yield('ajax')

</body>
</html>