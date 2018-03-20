@extends('layouts.layout')

@section('content')
	@if(Auth::check())
		@if(\App\Http\Controllers\UserControlPermissionController::hasItemPermission( Auth::user()))
			<form method="POST" action="/saveitem">
				{{csrf_field()}}


				<div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
					<label for="item_code">Item Code:</label>
					<input type="text" class="form-control" name="item_code" id="item_code">
				</div>
				<div class="form-group col-md-4 " style="margin-left: 400px;">
					<label for="item_name">Item Name:</label>
					<input type="text" class="form-control" name="item_name" id="item_name">
				</div>
				<div class="form-group col-md-4 " style="margin-left: 400px;">
					<label for="item_description">Item Description:</label>
					<textarea name="item_description" class="form-control" id="item_description"></textarea>
				</div>
				<div class="form-group col-md-4" style="margin-left: 400px;">
					<label for="package_no">Package Code:</label>
					<select class="form-control" name="package_no" id="package_no">
						<option value="">Choose package belonging to:</option>
						@foreach($packages as $pack)
							<option value="{{$pack["id"]}}">{{$pack["Packagecode"]}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-4 " style="margin-left: 400px;">
					<button name="save" class="form-control col-md-3 btn btn-primary" value="save" type="submit">Save</button>
					<button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Edit</button>
					<button name="delete" class="form-control col-md-3 btn btn-primary" value="delete" type="submit">Delete</button>
				</div>

				@include('layouts.errors');

			</form>
		@else
			<h1>You are not allowed to view this page!</h1>
		@endif
	@else
		<h1>You re not logged in!</h1>
		@if (Auth::guest())
			{{ view('Auth.login')}}
		@endif
	@endif
@endsection
