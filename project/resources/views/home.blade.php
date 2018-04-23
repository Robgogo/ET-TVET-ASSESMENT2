@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="flash-message">
        @foreach(['danger', 'warning', 'success', 'info'] as $msg)
            @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">
                    {{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">MIS</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check())
                    <div class="row">
                        <div class="col col-lg-10 col-lg-offset-1">
                            <img src="{{ URL::asset('img/tvetbanner.PNG') }}" class="img-responsive" style="width:1000px;height:250px;" alt="Management Information System">
                        </div>
                    </div>
                   
                    @else
                    <div class="row">
                        <div class="col col-lg-8 col-lg-offset-2">
                            <img src="{{ URL::asset('img/mis_front.PNG') }}" class="img-responsive" width="100%" alt="Management Information System">
                        </div>
                    </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
