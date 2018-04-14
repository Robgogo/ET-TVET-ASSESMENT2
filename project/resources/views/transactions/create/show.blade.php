@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasCreatePackagePermission(Auth::user()))
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
                <hr>
                <h1><a href="/create_package" title="Add new"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></h1>
                <hr>
                <div class="form-group col-md-12 table-responsive">
                    <table class="table table-info">
                        <thead class="">
                        <tr>
                            <th scope="col">Package Number</th>
                            <th scope="col">Date</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Package Code</th>


                        </tr>
                        </thead>

                        <tbody>
                        @if(!$created->isEmpty())
                            @foreach($created as $field)
                                <tr>
                                    <td>{{$field->cpack_no}}</td>
                                    <td>{{$field->created_at}}</td>
                                    <td>{{$field->creatd_by}}</td>
                                    <td>{{$field->package_code}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <tr><th>No records found</th></tr>
        @endif
    @else
        <h1>Yo are not allowed to view this page!</h1>
    @endif
    @else
        <h1>You re not logged in!</h1>
        @if (Auth::guest())
            {{ view('Auth.login')}}
        @endif
    @endif


@endsection

