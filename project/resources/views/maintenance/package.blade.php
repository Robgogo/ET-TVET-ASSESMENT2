@extends('layouts.layout')

@section('content')
<form method="POST" action="/savepackage">
	{{csrf_field()}}

	<div>
		<label for="package_code">Package Code:</label>
		<input type="text" name="package_code" id="package_code">
	</div>
	<div>
		<label for="package_name">package Name:</label>
		<input type="text" name="package_name" id="package_name">
	</div>
	<div>
		<label for="package_description">package Description:</label>
		<textarea name="package_description" id="package_description"></textarea>
	</div>
	<div>
		<button name="save" value="save" type="submit">Save</button>
		<button name="edit" value="edit" type="submit">Edit</button>
		<button name="delete" value="delete" type="submit">Delete</button>
	</div>

</form>


@endsection
