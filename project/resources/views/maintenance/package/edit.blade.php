@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasPackagePermission( Auth::user()))
            <form method="POST" action="/package/edit">
                {{csrf_field()}}

                <div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
                    <label for="package_code">Package Code:</label>
                    <input type="text" class="form-control" name="package_code" id="package_code" value="{{$package->Packagecode}}" readonly>
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <label for="package_name">package Name:</label>
                    <input type="text" class="form-control" name="package_name" id="package_name" value="{{$package->Packagename}}">
                </div>
                <div class="form-group col-md-4 " style="margin-left: 400px;">
                    <label for="package_description">package Description:</label>
                    <textarea name="package_description" class="form-control" id="package_description">{{$package->Packagedesc}}</textarea>
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
