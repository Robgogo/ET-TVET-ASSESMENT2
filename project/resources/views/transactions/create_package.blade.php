 @extends('layouts.layout')


@section('content')

<form method="POST" action="/creatpackages" enctype="multipart/form-data">
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
		<label for="package_code">Package Code:</label>
		<select id="package_code" name="package_code">
			<option value="">Choose the code</option>
			{{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
			@foreach($package as $code)
				<option value="{{$code->Packagecode}}">{{$code->Packagecode}}</option>
			@endforeach
		</select>
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
							
						</select> 
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 2</td>
					<td>
						<select id="item_name2" name="item_name">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 3</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 4</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 5</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 6</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 7</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 8</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 9</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" name="upload" id="upload">
					</td>
					<td>
						<input type="text" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<td>Item 10</td>
					<td>
						<select id="item_name" name="item_name">
							<option value="">Choose item name</option>

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


</form>

<script type="text/javascript">
	
//this is the Ajax script that fetches the 
//data behind the scene from database based on the selectoin of the package code,
 var xhttp = new XMLHttpRequest();
 var packageNumber = document.getElementById('package_code');
 packageNumber.onchange=  function (){
 	console.log("adfasfda");
 	var package_name='';
 	xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
 	   	responseObject=JSON.parse(xhttp.responseText);
 	   	package_name=responseObject.Packagename;
    	console.log(responseObject);
    	var newcontent='';
    	//items is part of the response
    	console.log(responseObject.items.length);
    	$('#item_name').empty();
    	for(var i=0;i<responseObject.items.length;i++){
    		newcontent+='<option value="'+responseObject.items[i].Itemname+'">'+responseObject.items[i].Itemname+'</option>';
    	}
        document.getElementById("item_name").innerHTML = newcontent;
		document.getElementById("item_name2").innerHTML = newcontent;
        document.getElementById("package_name").value=package_name;
    }
  };
  xhttp.open("GET", "get_package_id/" + packageNumber.value, true);
 	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.send();
 }

</script>


	@include('layouts.errors');
@endsection