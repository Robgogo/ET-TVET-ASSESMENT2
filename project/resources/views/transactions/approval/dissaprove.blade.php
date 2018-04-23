@extends('layouts.layout')

@section('content')
    <div class="container">
        <form method="POST" action="/disapprove">
            {{csrf_field()}}

            <h3><p>Please state your reason for dis-approving this package below.</p></h3>
            <input type="hidden" name="id" value="{{$user_id}}">
            <textarea name="comment" class="form-control" style="width:500px;height: 200px;"></textarea>
            <br>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>

@endsection