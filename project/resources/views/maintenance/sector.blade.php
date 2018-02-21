@extends('layouts.layout')

@section('content')
<form method="POST" action="/savesector">
	{{csrf_field()}}

	<div>
		<label for="sector_code">Sector Code:</label>
		<input type="text" name="sector_code" id="sector_code">
	</div>
	<div>
		<label for="sector_name">Sector Name:</label>
		<input type="text" name="sector_name" id="sector_name">
	</div>
	<div>
		<label for="sector_description">Sector Description:</label>
		<textarea name="sector_description" id="sector_description"></textarea>
	</div>
	<div>
		<button name="save" value="save" type="submit">Save</button>
		<button name="edit" value="edit" type="submit">Edit</button>
		<button name="delete" value="delete" type="submit">Delete</button>
	</div>

</form>


@endsection
