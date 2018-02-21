@extends('layouts.layout')

@section('content')
<form method="POST" action="/savelevel">
	{{csrf_field()}}

	<div>
		<label for="level_code">Level Code:</label>
		<input type="text" name="level_code" id="level_code">
	</div>
	<div>
		<label for="level_name">Level Name:</label>
		<input type="text" name="level_name" id="level_name">
	</div>
	<div>
		<label for="level_description">Level Description:</label>
		<textarea name="level_description" id="level_description"></textarea>
	</div>
	<div>
		<button name="save" value="save" type="submit">Save</button>
		<button name="edit" value="edit" type="submit">Edit</button>
		<button name="delete" value="delete" type="submit">Delete</button>
	</div>

</form>


@endsection
