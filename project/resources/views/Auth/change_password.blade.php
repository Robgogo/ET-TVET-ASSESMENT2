@extends('layouts.layout')

@section('content')

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
        <div class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change password</div>
                <div class="panel-body">
                    <form method="POST" action="/change" >
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="old_password" class="col-md-4 control-label">Old-Password</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control" name="old_password" required>

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                                <br>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <br>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary col-md-offset-4">Save</button>
                                <a href="/cancel"><button type="button" class="btn btn-default col-md-offset-2">Cancel</button></a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection