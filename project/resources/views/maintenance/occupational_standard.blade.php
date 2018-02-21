@extends('layouts.layout')

@section('content')
<form method="POST" action="/saveos">
	{{csrf_field()}}

	<div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
		<label for="os_code">OS Code:</label>
		<input type="text" class="form-control" name="os_code" id="os_code">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="os_name">OS Name:</label>
		<input type="text" class="form-control" name="os_name" id="os_name">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="os_description">OS Description:</label>
		<textarea name="os_description" class="form-control" id="os_description"></textarea>
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<button name="save" class="form-control col-md-3 btn btn-primary" value="save" type="submit">Save</button>
		<button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Edit</button>
		<button name="delete" class="form-control col-md-3 btn btn-primary" value="delete" type="submit">Delete</button>
	</div>

	@include('layouts.errors');

</form>


@endsection
