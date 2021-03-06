@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasOsPermission( Auth::user()))
            <form method="POST" action="/os/edit">
                {{csrf_field()}}

                <div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
                    <label for="os_code">OS Code:</label>
                    <input type="text" class="form-control" name="os_code" id="os_code" value="{{$os->OScode}}" readonly>
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <label for="os_name">OS Name:</label>
                    <input type="text" class="form-control" name="os_name" id="os_name" value="{{$os->OSname}}">
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <label for="os_description">OS Description:</label>
                    <textarea name="os_description" class="form-control" id="os_description">{{$os->OSdesc}}</textarea>
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Update</button>
                </div>

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
