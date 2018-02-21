@extends('layouts.layout')

@section('content')
<form method="POST" action="/savesubsector">
	{{csrf_field()}}

	<div>
		<label for="subsector_code">Sub-Sector Code:</label>
		<input type="text" name="subsector_code" id="subsector_code">
	</div>
	<div>
		<label for="subsector_name">Sub-Sector Name:</label>
		<input type="text" name="subsector_name" id="subsector_name">
	</div>
	<div>
		<label for="subsector_description">Sub-Sector Description:</label>
		<textarea name="subsector_description" id="subsector_description"></textarea>
	</div>
	<div>
		<button name="save" value="save" type="submit">Save</button>
		<button name="edit" value="edit" type="submit">Edit</button>
		<button name="delete" value="delete" type="submit">Delete</button>
	</div>

</form>


@endsection
