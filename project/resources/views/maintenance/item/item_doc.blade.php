@extends('layouts.layout')

@section('content')
	@if(Auth::check())
		@if(\App\Http\Controllers\UserControlPermissionController::hasItemPermission( Auth::user()))
			<form method="POST" action="/saveitem">
				{{csrf_field()}}


				<div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
					<label for="item_code">Item Code:</label>
					<input type="text" class="form-control" name="item_code" id="item_code">
				</div>
				<div class="form-group col-md-4 " style="margin-left: 400px;">
					<label for="item_name">Item Name:</label>
					<input type="text" class="form-control" name="item_name" id="item_name">
				</div>
				<div class="form-group col-md-4 " style="margin-left: 400px;">
					<label for="item_description">Item Description:</label>
					<textarea name="item_description" class="form-control" id="item_description"></textarea>
				</div>
				<div class="form-group col-md-4" style="margin-left: 400px;">
					<label for="package_no">Package Code:</label>
					<select class="form-control" name="package_no" id="package_no">
						<option value="">Choose package belonging to:</option>
						@foreach($packages as $pack)
							<option value="{{$pack["id"]}}">{{$pack["Packagename"]}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-4"  style="margin-left: 400px;">
					<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#mySaveModal" onclick="printelement()">Save</button>
				</div>
				<div class="modal fade" id="mySaveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Check your Input</h4>
							</div>
							<div class="modal-body">
								<p>Here is your input are u sure to proceed?</p>
								<p id="code"></p>
								<p id="name"></p>
								<p id="desc"></p>
								<p id="sect"></p>
								<script>

                                    function printelement(){
                                        var seccode=document.getElementById("item_code");
                                        var secname=document.getElementById("item_name");
                                        var secdesc=document.getElementById("item_description");
                                        var sec=document.getElementById('package_no');
                                        console.log(seccode.value);
                                        document.getElementById('code').innerHTML='<p id="code">Item Code:'+seccode.value+'</p>';
                                        document.getElementById('name').innerHTML='<p id="name">Item name:'+secname.value+'</p>';
                                        document.getElementById('desc').innerHTML='<p id="desc">Item Description:'+secdesc.value+'</p>';
                                        document.getElementById('sect').innerHTML='<p id="sect">Package Code:'+sec.options[sec.selectedIndex].text;+'</p>';
                                    }

								</script>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success" >Save</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->


				@include('layouts.errors');

			</form>
		@else
			<h1>You are not allowed to view this page!</h1>
		@endif
	@else
		<h1>You re not logged in!</h1>
		@if (Auth::guest())
			{{ view('Auth.login')}}
		@endif
	@endif
@endsection
