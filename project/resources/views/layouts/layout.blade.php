<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link  href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-grid.min.css')}}">
	<title>ET-TVET SYSTEM</title>
	<style>
		.nav{
			background: lightgray;
		}
		body{
			background: ;
			color: black;
		}
	</style>
</head>
<body>
	<div>
	<nav class="navbar navbar-default nav">
		<div class="container-fluid">
			<div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Brand</a>
				<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			</div>
			<div class="collapse navbar-collapse" id="navcol-1">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">maintenance </a>
						<ul class="dropdown-menu" role="menu">
							<li role="presentation"><a href="/sector">Sector</a></li>
							<li role="presentation"><a href="subsector">Sub Sector</a></li>
							<li role="presentation"><a href="/region">Region</a></li>
							<li role="presentation"><a href="/package">Package</a></li>
							<li role="presentation"><a href="/os">OS</a></li>
							<li role="presentation"><a href="/level">Level</a></li>
							<li role="presentation"><a href="/item">Items</a></li>
							<li role="presentation"><a href="/assesor">Assesor</a></li>
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
				</ul>
			</div>
		</div>
	</nav>
	</div>
	<div class="container-fluid">
		@yield('content')

	</div>
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>