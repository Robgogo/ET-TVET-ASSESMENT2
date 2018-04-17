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
            <div class="form-group col-md-4 " style="margin-left: 400px;">
                <button name="save" class="form-control col-md-3 btn btn-success" value="save" type="submit">Save</button>
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
