@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasSubsectorPermission( Auth::user()))
            <form method="POST" action="/subsector/edit">
                {{csrf_field()}}

                <div class="form-group col-md-4 " style="margin-left: 350px;margin-top: 70px;">
                    <label for="subsector_code">Sub-Sector Code:</label>
                    <input type="text" class="form-control" name="subsector_code" id="subsector_code" value="{{$subsector->Subsectorcode}}" readonly>
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
                            <option value="{{$sec["id"]}}">{{$sec["Sectorcode"]}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-4 " style="margin-left: 350px;">

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
