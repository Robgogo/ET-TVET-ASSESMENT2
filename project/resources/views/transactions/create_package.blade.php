@extends('layouts.layout')


@section('content')
	@if(Auth::check())

		@if(\App\Http\Controllers\UserControlPermissionController::hasCreatePackagePermission(Auth::user()))
<form class="form-horizontal" role="form" method="POST" action="/creatpackages" enctype="multipart/form-data">
	{{csrf_field()}}

	<div class="form-group">
		<label class="control-label col-sm-2" for="cpackno">Package No:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" name="cpackno" id="cpackno">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="date">Date:</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" name="date" id="date">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="package_code">Package Code:</label>
		<div class="col-sm-4">
			<select class="form-control" id="package_code" name="package_code">
				<option value="">Choose the code</option>
				{{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
				@foreach($package as $code)
					<option value="{{$code->Packagecode}}">{{$code->Packagecode}}</option>
				@endforeach
			</select>
		</div>

	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="package_name">Package Name:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" name="package_name" id="package_name" readonly="true">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="created_by">Created By:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" name="created_by" id="created_by">
		</div>
	</div>
	
	<div class="form-group col-md-12 table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th scope="col"></th>
				<th scope="col">Item Name</th>
				<th scope="col">Upload a document</th>
				<th scope="col">Comments</th>
			</tr>
			<tbody>
				<tr>
					<input type="hidden" value="1" name="item_no">
					<td>Item 1</td>
					<td>
						<select class="form-control" id="item_name" name="item_name">
							<option value="">Choose item name</option>
							
						</select> 
					</td>
					<td>
						<input type="file" class="form-control" name="upload" id="upload">
					</td>
					<td>
						<input type="text" class="form-control" name="comments" id="comments">
					</td>
				</tr>
				<tr>
					<input type="hidden" value="2" name="item_no2">
					<td>Item 2</td>
					<td>
						<select class="form-control" id="item_name2" name="item_name2">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input class="form-control" type="file" name="upload2" id="upload2">
					</td>
					<td>
						<input type="text" class="form-control" name="comments2" id="comments2">
					</td>
				</tr>
				<tr>
					<input type="hidden" class="form-control" value="3" name="item_no3">
					<td>Item 3</td>
					<td>
						<select id="item_name3" class="form-control" name="item_name3">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" class="form-control" name="upload3" id="upload3">
					</td>
					<td>
						<input type="text" class="form-control" name="comments3" id="comments3">
					</td>
				</tr>
				<tr>
					<input type="hidden"  value="4" name="item_no4">
					<td>Item 4</td>
					<td>
						<select class="form-control" id="item_name4" name="item_name4">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" class="form-control" name="upload4" id="upload4">
					</td>
					<td>
						<input type="text" class="form-control" name="comments4" id="comments4">
					</td>
				</tr>
				<tr>
					<input type="hidden" value="5" name="item_no5">
					<td>Item 5</td>
					<td>
						<select id="item_name5" class="form-control" name="item_name5">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input class="form-control" type="file" name="upload5" id="upload5">
					</td>
					<td>
						<input type="text" class="form-control" name="comments5" id="comments5">
					</td>
				</tr>
				<tr>
					<input type="hidden" value="6" name="item_no6">
					<td>Item 6</td>
					<td>
						<select id="item_name6" class="form-control" name="item_name6">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" class="form-control" name="upload6" id="upload6">
					</td>
					<td>
						<input type="text" class="form-control" name="comments6" id="comments6">
					</td>
				</tr>
				<tr>
					<input type="hidden" value="7" name="item_no7">
					<td>Item 7</td>
					<td>
						<select id="item_name7" class="form-control" name="item_name7">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" class="form-control" name="upload7" id="upload7">
					</td>
					<td>
						<input type="text" class="form-control" name="comments7" id="comments7">
					</td>
				</tr>
				<tr>
					<input type="hidden" value="8" name="item_no8">
					<td>Item 8</td>
					<td>
						<select class="form-control" id="item_name8" name="item_name8">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" class="form-control" name="upload8" id="upload8">
					</td>
					<td>
						<input type="text" class="form-control" name="comments8" id="comments8">
					</td>
				</tr>
				<tr>
					<input type="hidden" value="9" name="item_no9">
					<td>Item 9</td>
					<td>
						<select class="form-control" id="item_name9" name="item_name9">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" class="form-control" name="upload9" id="upload9">
					</td>
					<td>
						<input type="text" class="form-control" name="comments9" id="comments9">
					</td>
				</tr>
				<tr>
					<input type="hidden" value="10" name="item_no10">
					<td>Item 10</td>
					<td>
						<select class="form-control" id="item_name10" name="item_name10">
							<option value="">Choose item name</option>

						</select>
					</td>
					<td>
						<input type="file" class="form-control" name="upload10" id="upload10">
					</td>
					<td>
						<input type="text" class="form-control" name="comments10" id="comments10">
					</td>
				</tr>
			</tbody>
		</table>
	</div>

<br>
	<div class="form-group col-sm-2">
		<button name="save" class="form-control btn btn-primary col-sm-5" style="margin-left: 1275px;" type="submit">Save</button>
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
        document.getElementById("item_name3").innerHTML = newcontent;
        document.getElementById("item_name4").innerHTML = newcontent;
        document.getElementById("item_name5").innerHTML = newcontent;
        document.getElementById("item_name6").innerHTML = newcontent;
        document.getElementById("item_name7").innerHTML = newcontent;
        document.getElementById("item_name8").innerHTML = newcontent;
        document.getElementById("item_name9").innerHTML = newcontent;
        document.getElementById("item_name10").innerHTML = newcontent;
        document.getElementById("package_name").value=package_name;
        //document.getElementById("package_name");
    }
  };
  xhttp.open("GET", "get_package_id/" + packageNumber.value, true);
 	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.send();
 }

</script>
@else
			<h1>Not Allowed to view this page!</h1>
@endif
	@include('layouts.errors');
@else
	<h1>You re not logged in!</h1>
	@if (Auth::guest())
		{{ view('Auth.login')}}
	@endif
@endif
@endsection