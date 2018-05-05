@extends('layouts.layout')

@section('content')
    @if(Auth::check())
    @if(\App\Http\Controllers\EmployeeInfoController::isUserActive(Auth::user()))
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
            <h1><a href="/open_package" title="Add new"><button class="btn btn-info">Open Package</button></a></h1>
            <hr>
            <div class="form-group col-md-12 table-responsive">
                <table class="table table-info">
                    <thead class="">
                    <tr>
                        <th scope="col">Open Pack. No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Opened By</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Sub sector</th>
                        <th scope="col" >OS code</th>
                        <th scope="col" >Level</th>
                        <th scope="col" >Region</th>


                    </tr>
                    </thead>

                    <tbody>
                    @if(!$opened->isEmpty())
                        @foreach($opened as $field)
                            <tr>
                                <td>{{$field->open_pack_no}}</td>
                                <td>{{$field->created_at}}</td>
                                <td>{{$field->opened_by}}</td>
                                <td>{{$field->sector_code}}</td>
                                <td>{{$field->subsector_code}}</td>
                                <td>{{$field->os_code}}</td>
                                <td>{{$field->level_code}}</td>
                                <td>{{$field->region_code}}</td>
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
    <h2>Your account has been set to in active. contact your system adminstrator!</h2>
    @endif
    @else
        <h1>You re not logged in!</h1>
        @if (Auth::guest())
            {{ view('Auth.login')}}
        @endif
    @endif


@endsection

