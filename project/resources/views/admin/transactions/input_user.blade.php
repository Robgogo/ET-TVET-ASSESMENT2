@extends('layouts.layout')


@section('content')
    <p class="h3 font-italic">Insert a new employee</p>
    <br>
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="/input_user">
            {{csrf_field()}}

            <div class="form-group">
                <label class="control-label col-sm-2" for="postpackno">Transaction No:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="postpackno" id="postpackno">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="employee_id">Employee Id:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="employee_id" id="employee_id">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="date">Date:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control " name="date" id="date">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="first_name">First name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="first_name" id="first_name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="middle_name">Middle name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="middle_name" id="middle_name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="last_name">Last name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="last_name" id="last_name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="sector_code">Sector:</label>
                 <div class="col-sm-6">
                    <select id="sector_code" class="form-control " name="sector_code">
                        <option value="">Choose the code</option>
                        {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                        @foreach($sector as $code)
                            <option value="{{$code->Sectorcode}}">{{$code->Sectorname}}</option>
                        @endforeach
                    </select>
                 </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="subsector_code">Subsector:</label>
                <div class="col-sm-6">
                <select id="subsector_code" class="form-control " name="subsector_code">
                    <option value="">Choose the code</option>
                    {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                    @foreach($subsector as $code)
                        <option value="{{$code->Subsectorcode}}">{{$code->Subsectorname}}</option>
                    @endforeach
                </select>
                </div>
             </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="department">Department:</label>
                <div class="col-sm-6">
                    <select id="department" class="form-control " name="department">
                        <option value="">Choose the code</option>
                        {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                        @foreach($department as $code)
                            <option value="{{$code['Dept_code']}}">{{$code['Dept_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="position">Position:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="position" id="position">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="level_code">Level Code:</label>
                <div class="col-sm-6">
                <select id="level_code" class="form-control" name="level_code">
                    <option value="">Choose the code</option>
                    {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                    @foreach($level as $code)
                        <option value="{{$code->Levelcode}}">{{$code->Levelname}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="region_code">Region Code:</label>
                <div class="col-sm-6">
                <select id="region_code" class="form-control" name="region_code">
                    <option value="">Choose the code</option>
                    {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                    @foreach($region as $code)
                        <option value="{{$code->Regioncode}}">{{$code->Regionname}}</option>
                    @endforeach
                </select>
                </div>
             </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="mobile">Mobile:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="mobile" id="mobile">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">User name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" id="username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="upload_photo">Profile picture:</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="upload_photo" id="upload_photo">
                </div>
            </div>
            <br>
            <div class="form-group col-sm-2">
                <button class="form-control col-sm-8 btn btn-primary" style="margin-left: 620px;" name="next" value="save" type="submit">Save</button>
            </div>
        </form>
    </div>
    @include('layouts.errors')
@endsection