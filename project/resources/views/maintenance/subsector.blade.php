@extends('layouts.layout')

@section('content')
<form method="POST" action="/savesubsector">
	{{csrf_field()}}

	<div class="form-group col-md-4 " style="margin-left: 350px;margin-top: 70px;">
		<label for="subsector_code">Sub-Sector Code:</label>
		<input type="text" class="form-control" name="subsector_code" id="subsector_code">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 350px;;">
		<label for="subsector_name">Sub-Sector Name:</label>
		<input type="text" class="form-control" name="subsector_name" id="subsector_name">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 350px;">
		<label for="subsector_description">Sub-Sector Description:</label>
		<textarea name="subsector_description" class="form-control" id="subsector_description"></textarea>
	</div>
	<div class="form-group col-md-4 " style="margin-left: 350px;">
		<button name="save" class="form-control col-md-3 btn btn-primary" value="save" type="submit">Save</button>
		<button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Edit</button>
		<button name="delete" class="form-control col-md-3 btn btn-primary" value="delete" type="submit">Delete</button>
	</div>

	@include('layouts.errors');

</form>


@endsection
