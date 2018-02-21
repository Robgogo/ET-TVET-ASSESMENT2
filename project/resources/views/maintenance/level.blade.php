@extends('layouts.layout')

@section('content')
<form method="POST" action="/savelevel">
	{{csrf_field()}}

	<div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
		<label for="level_code">Level Code:</label>
		<input type="text" class="form-control" name="level_code" id="level_code">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="level_name">Level Name:</label>
		<input type="text" class="form-control" name="level_name" id="level_name">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="level_description">Level Description:</label>
		<textarea name="level_description" class="form-control" id="level_description"></textarea>
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<button name="save" class="form-control col-md-3 btn btn-primary" value="save" type="submit">Save</button>
		<button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Edit</button>
		<button name="delete" class="form-control col-md-3 btn btn-primary" value="delete" type="submit">Delete</button>
	</div>

	@include('layouts.errors');

</form>


@endsection
