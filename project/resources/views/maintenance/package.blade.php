@extends('layouts.layout')

@section('content')
<form method="POST" action="/savepackage">
	{{csrf_field()}}

	<div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;"> 
		<label for="package_code">Package Code:</label>
		<input type="text" class="form-control" name="package_code" id="package_code">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="package_name">package Name:</label>
		<input type="text" class="form-control" name="package_name" id="package_name">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="package_description">package Description:</label>
		<textarea name="package_description" class="form-control" id="package_description"></textarea>
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<button name="save" class="form-control col-md-3 btn btn-primary" value="save" type="submit">Save</button>
		<button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Edit</button>
		<button name="delete" class="form-control col-md-3 btn btn-primary" value="delete" type="submit">Delete</button>
	</div>

	@include('layouts.errors');

</form>


@endsection
