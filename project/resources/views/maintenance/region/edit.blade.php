@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasRegionPermission( Auth::user()))
            <form method="POST" action="/region/edit">
                {{csrf_field()}}

                <div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
                    <label for="region_code">Region Code:</label>
                    <input type="text" class="form-control" name="region_code" id="region_code" value="{{$region->Regioncode}}" readonly>
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <label for="region_name">Region Name:</label>
                    <input type="text" class="form-control" name="region_name" id="region_name">
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <label for="region_description">Region Description:</label>
                    <textarea name="region_description" class="form-control" id="region_description"></textarea>
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
