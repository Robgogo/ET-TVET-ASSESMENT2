@extends('layouts.layout')

@section('content')
<form method="POST" action="/saveassesor">
	{{csrf_field()}}

	<div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
		<label for="assesor_code">Assesor Code:</label>
		<input type="text" class="form-control" name="assesor_code" id="assesor_code">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="assesor_name">Assesor Name:</label>
		<input type="text" class="form-control" name="assesor_name" id="assesor_name">
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<label for="assesor_description">Assesor Description:</label>
		<textarea name="assesor_description" class="form-control" id="assesor_description"></textarea>
	</div>
	<div class="form-group col-md-4 " style="margin-left: 400px;">
		<button name="save" class="form-control col-md-3 btn btn-primary" value="save" type="submit">Save</button>
		<button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Edit</button>
		<button name="delete" class="form-control col-md-3 btn btn-primary" value="delete" type="submit">Delete</button>
	</div>

	@include('layouts.errors');

</form>


@endsection
