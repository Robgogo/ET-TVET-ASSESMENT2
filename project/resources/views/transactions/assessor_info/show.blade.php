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
            <h1><a href="/assessor_info" title="Add new"><button class="btn btn-info">Add Assessor Info</button></a></h1>
            <hr>
            <div class="form-group col-md-12 table-responsive">
                <table class="table table-info">
                    <thead class="">
                    <tr>
                        <th scope="col">Ass pack Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Date of Exam</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Approval Package number</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Sub-sector</th>
                        <th scope="col">OS code</th>
                        <th scope="col">Level</th>
                        <th scope="col">Region</th>
                        <th scope="col" colspan="2">Completed</th>
                        <th scope="col" colspan="2">Incomplete</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(!$assessor->isEmpty())
                        <?php $i=0; ?>
                    @foreach($assessor as $field)
                    <tr>
                        <td>{{$field->ass_pack_no}}</td>
                        <td>{{$field->created_at}}</td>
                        <td>{{$field->date_of_exam}}</td>
                        <td>{{$field->created_by}}</td>
                        <td>{{$field->full_name}}</td>
                        <td>{{$field->app_pack_no}}</td>
                        <td>{{$field->sector}}</td>
                        <td>{{$field->sub_sector}}</td>
                        <td>{{$field->os}}</td>
                        <td>{{$field->level}}</td>
                        <td>{{$field->region}}</td>
                        <td>{{$field->male_comp}}</td>
                        <td>{{$field->female_comp}}</td>
                        <td>{{$field->male_inc}}</td>
                        <td>{{$field->female_inc}}</td>
                        <td>{{$total[$i]}}</td>
                    </tr>
                        <?php $i++; ?>
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

