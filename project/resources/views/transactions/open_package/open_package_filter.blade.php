@extends('layouts.layout')


    @section('content')

        <form method="POST" action="/open_package">
            {{csrf_field()}}

            <div>
                <label for="opackno">Open Package No:</label>
                <input type="text" name="opackno" id="opackno">
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="date" name="date" id="date">
            </div>
            <div>
                <label for="opened_by">Opened By:</label>
                <input type="text" name="opened_by" id="opened_by">
            </div>
            <div>
                <span>
                     <div>
                        <label for="sector_code">Sector Code:</label>
                        <select id="sector_code" name="sector_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($sector as $code)
                                <option value="{{$code->Sectorcode}}">{{$code->Sectorcode}}</option>
                            @endforeach
                        </select>
                     </div>
                     <div>
                        <label for="sector_name">Sector Name:</label>
                        <input type="text" name="sector_name" id="sector_name" readonly="true">
                     </div>
                </span>
            </div>
            <div>
                <span>
                    <div>
                        <label for="subsector_code">Subsector Code:</label>
                        <select id="subsector_code" name="subsector_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($subsector as $code)
                                <option value="{{$code->Subsectorcode}}">{{$code->Subsectorcode}}</option>
                            @endforeach
                        </select>
                     </div>
                    <div>
                        <label for="subsector_name">Subsector Name:</label>
                        <input type="text" name="subsector_name" id="subsector_name" readonly="true">
                    </div>
                </span>
            </div>
            <div>
                <span>
                    <div>
                        <label for="os_code">OS Code:</label>
                        <select id="os_code" name="os_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($os as $code)
                                <option value="{{$code->OScode}}">{{$code->OScode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="os_name">OS Name:</label>
                        <input type="text" name="os_name" id="os_name" readonly="true">
                    </div>
                </span>
            </div>

            <div>
                 <span>
                    <div>
                        <label for="level_code">Level Code:</label>
                        <select id="level_code" name="level_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($level as $code)
                                <option value="{{$code->Levelcode}}">{{$code->Levelcode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="level_name">Level Name:</label>
                        <input type="text" name="level_name" id="level_name" readonly="true">
                    </div>
                </span>
            </div>


            <div>
                <span>
                    <div>
                        <label for="region_code">Region Code:</label>
                        <select id="region_code" name="region_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($region as $code)
                                <option value="{{$code->Regioncode}}">{{$code->Regioncode}}</option>
                            @endforeach
                        </select>
                     </div>
                    <div>
                        <label for="region_name">Region Name:</label>
                        <input type="text" name="region_name" id="region_name" readonly="true">
                    </div>
                </span>
            </div>
            <div>
                <span>
                     <div>
                        <label for="package_code">Created Package Code:</label>
                        <select id="package_code" name="package_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($package as $code)
                                <option value="{{$code->package_code}}">{{$code->package_code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="package_name">Package Name:</label>
                        <input type="text" name="package_name" id="package_name" readonly="true">
                    </div>
                </span>
            </div>

            <div>
                <button name="next" value="next" type="submit">Next</button>
            </div>
        </form>
        @include('layouts.errors')
    @endsection