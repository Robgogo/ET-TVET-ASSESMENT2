@extends('layouts.layout')

@section('content')

    <h3>Developer Detail</h3>

    <div>
        Name: Robera Worku<br>
        Age: 23<br>
        Computer engineering student at AAiT,4th year.<br>
        Contact at: <br>
            Phone: +251911572482<br>
            Email:Robgogoworku@gmail.com<br>
        

        <img src="{{ URL::asset('img/Rob.jpg') }}" class="img-responsive" style="width:300px;height:250px;" alt="Robera's Photo"/>

    </div>


@endsection