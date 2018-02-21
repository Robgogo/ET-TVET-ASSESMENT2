@extends('layouts.layout')

@section('content')
<form method="POST" action="/saveregion">
	{{csrf_field()}}

	<div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
		<label for="region_code">Region Code:</label>
		<input type="text" class="form-control" name="region_code" id="region_code">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="region_name">Region Name:</label>
		<input type="text" class="form-control" name="region_name" id="region_name">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="region_description">Region Description:</label>
		<textarea name="region_description" class="form-control" id="region_description"></textarea>
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<button name="save" class="form-control col-md-3 btn btn-primary" value="save" type="submit">Save</button>
		<button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Edit</button>
		<button name="delete" class="form-control col-md-3 btn btn-primary" value="delete" type="submit">Delete</button>
	</div>

	@include('layouts.errors');

</form>


@endsection
