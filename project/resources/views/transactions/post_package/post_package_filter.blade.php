@extends('layouts.layout')


@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasPostPackagePermission(Auth::user()))
    <h3 class="h3 font-italic">Open Package for posting</h3>
    <br>
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="/post_package">
            {{csrf_field()}}

            <div class="form-group">
                <label class="control-label col-sm-2" for="postpackno">Post Package No:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="postpackno" id="postpackno">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="date">Date:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control " name="date" id="date">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="posted_by">Posted By:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="posted_by" id="posted_by" value="{{ Auth::user()->user_name}}" readonly>
                </div>
            </div>
            <div>
                <span >
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="sector_code">Sector Code:</label>
                         <div class="col-sm-6">
                            <select id="sector_code" class="form-control" name="sector_code">
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
                        <label class="control-label col-sm-2" for="open_package_no">Opened Package Code:</label>
                         <div class="col-sm-6">
                        <select id="open_package_no" class="form-control" name="open_package_no" id="open_package_no">
                            <option value="">Choose the code</option>
                            {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                            @foreach($open_package as $code)
                                <option value="{{$code->open_pack_no}}">{{$code->open_pack_no}}</option>
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

@section('ajax')
    <script type="text/javascript">
        var xhttp = new XMLHttpRequest();
        var sectorName = document.getElementById('sector_code');
        sectorName.onchange=  function (){
            console.log("adfasfda");
            var sector_name='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    sector_name=responseObject[0].Sectorname;
                    console.log(responseObject[0].Sectorname);
                    var newcontent='';
                    //items is part of the response
                    document.getElementById("sector_name").value = sector_name;

                    //document.getElementById("package_name");
                }
            };
            xhttp.open("GET", "get_sector_id/" + sectorName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

        var xhttp = new XMLHttpRequest();
        var sectorName = document.getElementById('sector_code');
        sectorName.onchange=  function (){
            var msg="NO Sub Sector found";
            var new_content='<option value="">Choose the code</option>';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    if(responseObject.length===0){
                        new_content+='<option value="">'+msg+'</option>';
                    }else {
                        for (var i = 0; i < responseObject.subsector.length; i++) {
                            new_content += '<option value="' + responseObject.subsector[i].Subsectorcode + '">' + responseObject.subsector[i].Subsectorcode + '</option>';
                        }
                    }
                    document.getElementById("sector_name").value=responseObject.sector[0].Sectorname;
                    document.getElementById("subsector_code").innerHTML = new_content;
                }
            };
            xhttp.open("GET", "get_subsector/" + sectorName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

        var subsectorName=document.getElementById('subsector_code');
        subsectorName.onchange=  function (){
            console.log("adfasfda");
            var subsector_name='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    subsector_name=responseObject[0].Subsectorname;
                    console.log(responseObject);
                    var newcontent='';
                    //items is part of the response
                    document.getElementById("subsector_name").value = subsector_name;

                }
            };
            xhttp.open("GET", "get_subsector_id/" + subsectorName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

        var osName=document.getElementById('os_code');
        osName.onchange=  function (){
            console.log("adfasfda");
            var os_name='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    os_name=responseObject[0].OSname;
                    console.log(responseObject);
                    document.getElementById("os_name").value = os_name;

                }
            };
            xhttp.open("GET", "get_os_id/" + osName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

        var levelName=document.getElementById('level_code');
        levelName.onchange=  function (){
            console.log("adfasfda");
            var level_name='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    level_name=responseObject[0].Levelname;
                    console.log(responseObject);
                    document.getElementById("level_name").value = level_name;

                }
            };
            xhttp.open("GET", "get_level_id/" + levelName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

        var regionName=document.getElementById('region_code');
        regionName.onchange=  function (){
            console.log("adfasfda");
            var region_name='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    region_name=responseObject[0].Regionname;
                    console.log(responseObject);
                    document.getElementById("region_name").value = region_name;

                }
            };
            xhttp.open("GET", "get_region_id/" + regionName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

        var packageName=document.getElementById('open_package_no');
        packageName.onchange=  function (){
            console.log("adfasfda");
            var package_name='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    package_name=responseObject[0].Packagename;
                    console.log(responseObject);
                    document.getElementById("package_name").value = package_name;

                }
            };
            xhttp.open("GET", "get_open_package_id/" + packageName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }


    </script>


@endsection