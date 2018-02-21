@extends('layouts.layout')

@section('content')
<form method="POST" action="/saveassesor">
	{{csrf_field()}}

	<div>
		<label for="assesor_code">Assesor Code:</label>
		<input type="text" name="assesor_code" id="assesor_code">
	</div>
	<div>
		<label for="assesor_name">Assesor Name:</label>
		<input type="text" name="assesor_name" id="assesor_name">
	</div>
	<div>
		<label for="assesor_description">Assesor Description:</label>
		<textarea name="assesor_description" id="assesor_description"></textarea>
	</div>
	<div>
		<button name="save" value="save" type="submit">Save</button>
		<button name="edit" value="edit" type="submit">Edit</button>
		<button name="delete" value="delete" type="submit">Delete</button>
	</div>

</form>


@endsection
