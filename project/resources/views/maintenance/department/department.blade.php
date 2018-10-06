@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        <form method="POST" action="/savedept">
            {{csrf_field()}}

            <div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
                <label for="department_code">Department Code:</label>
                <input type="text" class="form-control" name="department_code" id="department_code">
            </div>
            <div class="form-group col-md-4 " style="margin-left: 400px;">
                <label for="department_name">Department Name:</label>
                <input type="text" class="form-control" name="department_name" id="department_name">
            </div>
            <div class="form-group col-md-4 " style="margin-left: 400px;">
                <label for="department_description">Department Description:</label>
                <textarea name="department_description" class="form-control" id="department_description"></textarea>
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
                            <script>

                                //console.log("afasdfasf");

                                function printelement(){
                                    var seccode=document.getElementById("department_code");
                                    var secname=document.getElementById("department_name");
                                    var secdesc=document.getElementById("department_description");
                                    console.log(seccode.value);
                                    document.getElementById('code').innerHTML='<p id="code">Department Code:'+seccode.value+'</p>';
                                    document.getElementById('name').innerHTML='<p id="name">Department name:'+secname.value+'</p>';
                                    document.getElementById('desc').innerHTML='<p id="desc">Department Description:'+secdesc.value+'</p>';
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
        <h1>You re not logged in!</h1>
        @if (Auth::guest())
            {{ view('Auth.login')}}
        @endif
    @endif
@endsection
