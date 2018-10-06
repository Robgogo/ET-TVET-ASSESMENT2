@extends('layouts.layout')

@section('content')
	@if(Auth::check())
		@if(\App\Http\Controllers\UserControlPermissionController::hasOsPermission( Auth::user()))
			<form method="POST" action="/saveos">
				{{csrf_field()}}

				<div class="form-group col-md-4 " style="margin-left: 350px;margin-top: 100px;">
					<label for="os_code">OS Code:</label>
					<input type="text" class="form-control" name="os_code" id="os_code">
				</div>
				<div class="form-group col-md-4 " style="margin-left: 350px;">
					<label for="os_name">OS Name:</label>
					<input type="text" class="form-control" name="os_name" id="os_name">
				</div>
				<div class="form-group col-md-4 " style="margin-left: 350px;">
					<label for="os_description">OS Description:</label>
					<textarea name="os_description" class="form-control" id="os_description"></textarea>
				</div>
				<div class="form-group col-md-4"  style="margin-left: 350px;">
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
								<script>

                                    //console.log("afasdfasf");

                                    function printelement(){
                                        var seccode=document.getElementById("os_code");
                                        var secname=document.getElementById("os_name");
                                        var secdesc=document.getElementById("os_description");
                                        console.log(seccode.value);
                                        document.getElementById('code').innerHTML='<p id="code">OS Code:'+seccode.value+'</p>';
                                        document.getElementById('name').innerHTML='<p id="name">OS name:'+secname.value+'</p>';
                                        document.getElementById('desc').innerHTML='<p id="desc">OS Description:'+secdesc.value+'</p>';
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
