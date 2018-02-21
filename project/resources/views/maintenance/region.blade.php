@extends('layouts.layout')

@section('content')
<form method="POST" action="/saveregion">
	{{csrf_field()}}

	<div>
		<label for="region_code">Region Code:</label>
		<input type="text" name="region_code" id="region_code">
	</div>
	<div>
		<label for="region_name">Region Name:</label>
		<input type="text" name="region_name" id="region_name">
	</div>
	<div>
		<label for="region_description">Region Description:</label>
		<textarea name="region_description" id="region_description"></textarea>
	</div>
	<div>
		<button name="save" value="save" type="submit">Save</button>
		<button name="edit" value="edit" type="submit">Edit</button>
		<button name="delete" value="delete" type="submit">Delete</button>
	</div>

</form>


@endsection
