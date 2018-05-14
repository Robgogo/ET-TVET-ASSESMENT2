@extends('layouts.layout')

@section('content')
	@if(Auth::check())
		@if(\App\Http\Controllers\UserControlPermissionController::hasSectorPermission( Auth::user()))
			<form class="form" method="POST" action="/savesector">
				{{csrf_field()}}

				<div class="form-group col-md-4 " style="margin-left: 350px;margin-top: 100px;">
					<label for="sector_code">Sector Code:</label>
					<input class="form-control"  type="text" name="sector_code" id="sector_code">

				</div>
				<div class="form-group col-md-4" style="margin-left: 350px;">
					<label for="sector_name">Sector Name:</label>
					<input class="form-control" type="text" name="sector_name" id="sector_name">

				</div>
				<div class="form-group col-md-4" style="margin-left: 350px;">
					<label for="sector_description">Sector Description:</label>
					<textarea class="form-control" name="sector_description" id="sector_description"></textarea>
				</div>
				<div class="form-group col-md-4"  style="margin-left: 350px;">
					<button class="form-control col-md-3 btn btn-success" name="save" value="save" type="submit">Save</button>
				</div>
				@include('layouts.errors')

			</form>
		@else
			<h1>Yo are not allowed to view this page!</h1>
		@endif
	@else
		<h1>You re not logged in!</h1>
		@if (Auth::guest())
			{{ view('Auth.login')}}
		@endif
	@endif

@endsection
