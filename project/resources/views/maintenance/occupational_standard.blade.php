@extends('layouts.layout')

@section('content')
<form method="POST" action="/saveos">
	{{csrf_field()}}

	<div>
		<label for="os_code">OS Code:</label>
		<input type="text" name="os_code" id="os_code">
	</div>
	<div>
		<label for="os_name">OS Name:</label>
		<input type="text" name="os_name" id="os_name">
	</div>
	<div>
		<label for="os_description">OS Description:</label>
		<textarea name="os_description" id="os_description"></textarea>
	</div>
	<div>
		<button name="save" value="save" type="submit">Save</button>
		<button name="edit" value="edit" type="submit">Edit</button>
		<button name="delete" value="delete" type="submit">Delete</button>
	</div>

</form>


@endsection
