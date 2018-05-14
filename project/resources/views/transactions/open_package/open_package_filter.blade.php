@extends('layouts.layout')


    @section('content')
        @if(Auth::check())
            @if(\App\Http\Controllers\UserControlPermissionController::hasOpenPackagePermission(Auth::user()))
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
                    <input type="text" class="form-control " name="opened_by" id="opened_by" value="{{ Auth::user()->user_name}}" readonly>
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
                                    <option value="{{$code->Sectorcode}}">{{$code->Sectorname}}</option>
                                @endforeach
                            </select>
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
                                <option value="{{$code->Subsectorcode}}">{{$code->Subsectorname}}</option>
                            @endforeach
                        </select>
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
                                    <option value="{{$code->OScode}}">{{$code->OSname}}</option>
                                    @endforeach
                            </select>
                        </div>

                    </div>
                </span>
            </div>

            <div>
                 <span>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="level_code">Level Code:</label>
                        <div class="col-sm-6">
                        <select id="level_code" class="form-control" name="level_code" id="level_code">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($level as $code)
                                <option value="{{$code->Levelcode}}">{{$code->Levelname}}</option>
                            @endforeach
                        </select>
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
                                <option value="{{$code->Regioncode}}">{{$code->Regionname}}</option>
                            @endforeach
                        </select>
                        </div>
                     </div>
                </span>
            </div>
            <div>
                <span>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="package_code">Created Package Code:</label>
                         <div class="col-sm-6">
                        <select id="package_code" class="form-control" name="package_code" id="package_code">
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

@section('ajax')
    <script type="text/javascript">

        var xhttp = new XMLHttpRequest();
        var sectorName = document.getElementById('sector_code');
        sectorName.onchange=  function (){
            var msg="NO Sub Sector found";
            var new_content='<option value="">Choose the code</option>';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    if(responseObject.subsector.length===0){
                        new_content+='<option value="">'+msg+'</option>';
                    }else {
                        for (var i = 0; i < responseObject.subsector.length; i++) {
                            new_content += '<option value="' + responseObject.subsector[i].Subsectorcode + '">' + responseObject.subsector[i].Subsectorname + '</option>';
                        }
                    }
                    document.getElementById("subsector_code").innerHTML = new_content;
                }
            };
            xhttp.open("GET", "get_subsector/" + sectorName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

        var packageName=document.getElementById('package_code');
        packageName.onchange=  function (){
            var package_name='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    package_name=responseObject.Packagename;

                    document.getElementById("package_name").value = package_name;

                }
            };
            xhttp.open("GET", "get_package_id/" + packageName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }


    </script>
    @else
        <h1>Not Allowed to view this page!</h1>
    @endif
    @else
        <h1>You re not logged in!</h1>
        @if (Auth::guest())
            {{ view('Auth.login')}}
        @endif
    @endif
@endsection