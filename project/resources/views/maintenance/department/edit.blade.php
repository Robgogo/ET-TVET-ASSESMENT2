@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        <form method="POST" action="/department/edit">
            {{csrf_field()}}

            <div class="form-group col-md-4 " style="margin-left: 400px;margin-top: 100px;">
                <label for="department_code">Department Code:</label>
                <input type="text" class="form-control" name="department_code" id="department_code" value="{{$dept->Deptcode}}" readonly>
            </div>
            <div class="form-group col-md-4 " style="margin-left: 400px;">
                <label for="department_name">Department Name:</label>
                <input type="text" class="form-control" name="department_name" id="department_name" value="{{$dept->Deptname}}">
            </div>
            <div class="form-group col-md-4 " style="margin-left: 400px;">
                <label for="department_description">Department Description:</label>
                <textarea name="department_description" class="form-control" id="department_description">{{$dept->Deptdesc}}</textarea>
            </div>
            <div class="form-group col-md-4 " style="margin-left: 400px;">
                <button name="edit" class="form-control col-md-3 btn btn-primary" value="edit" type="submit">Save</button>
            </div>

            @include('layouts.errors');

        </form>
    @else
        <h1>You re not logged in!</h1>
        @if (Auth::guest())
            {{ view('Auth.login')}}
        @endif
    @endif
@endsection
