@extends('layouts.layout')

@section('content')
<form method="POST" action="/saveitem">
	{{csrf_field()}}

	<div>
		<label for="item_code">Item Code:</label>
		<input type="text" name="item_code" id="item_code">
	</div>
	<div>
		<label for="item_name">Item Name:</label>
		<input type="text" name="item_name" id="item_name">
	</div>
	<div>
		<label for="item_description">Item Description:</label>
		<textarea name="item_description" id="item_description"></textarea>
	</div>
	<div>
		<button name="save" value="save" type="submit">Save</button>
		<button name="edit" value="edit" type="submit">Edit</button>
		<button name="delete" value="delete" type="submit">Delete</button>
	</div>

</form>


@endsection
