@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\EmployeeInfoController::isUserActive(Auth::user()))
            @if($doc->isEmpty())
                <div>
                    <h3>No document for the choosen package!</h3>
                    <p><a href="/home">Go to home</a></p>
                </div>
            @else
            <div class="container">
                <a href="/downloaddoc/{{$doc[0]->id}}" class="btn btn-primary " role="button">Download File</a><h4>{{$doc[0]->item_name}}</h4>
            </div>
            @endif
        @else
            <h2>Your account has been set to in active. contact your system adminstrator!</h2>
        @endif
    @else
        <h1>You re not logged in!</h1>
        @if (Auth::guest())
            {{ view('Auth.login')}}
        @endif
    @endif


@endsection


