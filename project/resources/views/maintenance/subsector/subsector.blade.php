@extends('layouts.layout')

@section('content')
	@if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasSubsectorPermission( Auth::user()))
            <form method="POST" action="/savesubsector">
                {{csrf_field()}}

                <div class="form-group col-md-4 " style="margin-left: 350px;margin-top: 70px;">
                    <label for="subsector_code">Sub-Sector Code:</label>
                    <input type="text" class="form-control" name="subsector_code" id="subsector_code">
                </div>
                <div class="form-group col-md-4 " style="margin-left: 350px;;">
                    <label for="subsector_name">Sub-Sector Name:</label>
                    <input type="text" class="form-control" name="subsector_name" id="subsector_name">
                </div>
                <div class="form-group col-md-4 " style="margin-left: 350px;">
                    <label for="subsector_description">Sub-Sector Description:</label>
                    <textarea name="subsector_description" class="form-control" id="subsector_description"></textarea>
                </div>
                <div class="form-group col-md-4" style="margin-left: 350px;">
                    <label for="sector_id">Sector Code:</label>
                    <select class="form-control" name="sector_id" id="sector_id">
                                <option value="">Choose sector belonging to:</option>
                                @foreach($sector as $sec)
                                    <option value="{{$sec["id"]}}">{{$sec["Sectorname"]}}</option>
                                @endforeach

                    </select>
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
                                <p id="sect"></p>
                                <script>

                                    function printelement(){
                                        var seccode=document.getElementById("subsector_code");
                                        var secname=document.getElementById("subsector_name");
                                        var secdesc=document.getElementById("subsector_description");
                                        var sec=document.getElementById('sector_id');
                                        console.log(seccode.value);
                                        document.getElementById('code').innerHTML='<p id="code">Subsector Code:'+seccode.value+'</p>';
                                        document.getElementById('name').innerHTML='<p id="name">Subsector name:'+secname.value+'</p>';
                                        document.getElementById('desc').innerHTML='<p id="desc">Subsector Description:'+secdesc.value+'</p>';
                                        document.getElementById('sect').innerHTML='<p id="sect">Sector Code:'+sec.options[sec.selectedIndex].text+'</p>';
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
