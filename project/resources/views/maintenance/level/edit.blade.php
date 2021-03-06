@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasLevelPermission( Auth::user()))
            <form method="POST" action="/level/edit">
                {{csrf_field()}}

                <div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
                    <label for="level_code">Level Code:</label>
                    <input type="text" class="form-control" name="level_code" id="level_code" value="{{$level->Levelcode}}" readonly>
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <label for="level_name">Level Name:</label>
                    <input type="text" class="form-control" name="level_name" id="level_name" value="{{$level->Levelname}}">
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <label for="level_description">Level Description:</label>
                    <textarea name="level_description" class="form-control" id="level_description" value="{{$level->Leveldesc}}">{{$level->Leveldesc}}</textarea>
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Edit</button>
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
