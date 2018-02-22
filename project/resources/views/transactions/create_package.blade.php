 @extends('layouts.layout')


@section('content')

<form method="POST" action="/creatpackages">
	{{csrf_field()}}

	<div>
		<label for="cpackno">Package No:</label>
		<input type="text" name="cpackno" id="cpackno">
	</div>
	<div>
		<label for="date">Date:</label>
		<input type="date" name="date" id="date">
	</div>
	<div>
		<label for="package_name">Package Name:</label>
		<input type="text" name="package_name" id="package_name">
	</div>
	<div>
		<label for="created_by">Created By:</label>
		<input type="text" name="created_by" id="created_by">
	</div>
	<div>
		<label for="package_code">Package Code:</label>
		<select id="package_code" name="package_code">
			<option value="">Choose the code</option>
			@foreach($package as $code)
				<option value="{{$code->Packagecode}}">{{$code->Packagecode}}</option>
			@endforeach
		</select>
	</div>
	<div>
		<table>
			<tr>
				<th></th>
				<th>Item Name</th>
				<th>Upload a document</th>
				<th>Comments</th>
			</tr>
			<tbody>
				<tr>
					<td>Item 1</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>
							{{--@foreach($package->items as $item)
									<option value="{{$item}}">{{$item}}</option>
								@endforeach--}}
						</select> 
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
			</tbody>
		</table>
	</div>

<br>
	<div>
		<button name="save" style="margin-left: 600px;" type="submit">Save</button>
	</div>


<script type="text/javascript">
	
	$('#package_code').on('click',function(){
		var pack_no=this.value;
		$.get("{{URL::to('get_package_id/'."+pack_no+")}}",function(data){
			console.log(data);
		});
	});

</script>


@endsection