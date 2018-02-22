<!DOCTYPE html>
<html>
<head>
	<link  href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
	<link rel="stylesheet"  href="{{asset('css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-grid.min.css')}}">
	<title>ET-TVET SYSTEM</title>
</head>
<body>
	<script type="text/javascript" src="{{asset('js/jquery-2.1.3.min.js')}}"></script>
	<div class="container">
		@yield('content')

	</div>
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

	
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>