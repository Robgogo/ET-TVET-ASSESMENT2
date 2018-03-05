@extends('layouts.layout')


@section('content')
    <h3 class="h3 font-italic">Open Package for edit</h3>
    <br>
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="/open_package">
            {{csrf_field()}}

            <div class="form-group">
                <label class="control-label col-sm-2" for="opackno">Open Package No:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="opackno" id="opackno">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="date">Date:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control " name="date" id="date">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="opened_by">Opened By:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="opened_by" id="opened_by">
                </div>
            </div>
            <div>
                <span >
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="sector_code">Sector Code:</label>
                         <div class="col-sm-6">
                            <select id="sector_code" class="form-control " name="sector_code">
                                <option value="">Choose the code</option>
                                {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                                @foreach($sector as $code)
                                    <option value="{{$code->Sectorcode}}">{{$code->Sectorcode}}</option>
                                @endforeach
                            </select>
                         </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="sector_name">Sector Name:</label>
                         <div class="col-sm-6">
                             <input type="text" class="form-control " name="sector_name" id="sector_name" readonly="true">
                         </div>

                     </div>
                </span>
            </div>
            <div>
                <span>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="subsector_code">Subsector Code:</label>
                        <div class="col-sm-6">
                        <select id="subsector_code" class="form-control " name="subsector_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($subsector as $code)
                                <option value="{{$code->Subsectorcode}}">{{$code->Subsectorcode}}</option>
                            @endforeach
                        </select>
                        </div>
                     </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="subsector_name">Subsector Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="subsector_name" id="subsector_name" readonly="true">
                        </div>
                    </div>
                </span>
            </div>
            <div>
                <span>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="os_code">OS Code:</label>
                        <div class="col-sm-6">
                            <select id="os_code" class="form-control " name="os_code">
                                <option value="">Choose the code</option>
                                {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                                @foreach($os as $code)
                                    <option value="{{$code->OScode}}">{{$code->OScode}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="os_name">OS Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="os_name" id="os_name" readonly="true">
                        </div>
                    </div>
                </span>
            </div>

            <div>
                 <span>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="level_code">Level Code:</label>
                        <div class="col-sm-6">
                        <select id="level_code" class="form-control" name="level_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($level as $code)
                                <option value="{{$code->Levelcode}}">{{$code->Levelcode}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="level_name">Level Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="level_name" id="level_name" readonly="true">
                        </div>
                    </div>
                </span>
            </div>


            <div>
                <span>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="region_code">Region Code:</label>
                        <div class="col-sm-6">
                        <select id="region_code" class="form-control" name="region_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($region as $code)
                                <option value="{{$code->Regioncode}}">{{$code->Regioncode}}</option>
                            @endforeach
                        </select>
                        </div>
                     </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="region_name">Region Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="region_name" id="region_name" readonly="true">
                        </div>
                    </div>
                </span>
            </div>
            <div>
                <span>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="package_code">Created Package Code:</label>
                         <div class="col-sm-6">
                        <select id="package_code" class="form-control" name="package_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($package as $code)
                                <option value="{{$code->package_code}}">{{$code->package_code}}</option>
                            @endforeach
                        </select>
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="package_name">Package Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="package_name" id="package_name" readonly="true">
                        </div>
                    </div>
                </span>
            </div>
            <br>
            <div class="form-group col-sm-2">
                <button class="form-control col-sm-8 btn btn-primary" style="margin-left: 620px;" name="next" value="next" type="submit">Next</button>
            </div>
        </form>
    </div>
    @include('layouts.errors')
@endsection