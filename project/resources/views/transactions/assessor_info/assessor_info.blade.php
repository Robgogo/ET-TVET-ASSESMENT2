@extends('layouts.layout')

@section('content')

    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasAssesorInfoPackagePermission(Auth::user()))
            <div class="container">
                <form class="form-horizontal" role="form" method="POST" action="/assessor_info">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="ass_pack_no"class="control-label col-sm-2">Assessor Package No:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="ass_pack_no" id="ass_pack_no">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="control-label col-sm-2">Date:</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="created_by"class="control-label col-sm-2">Created By:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="created_by" id="created_by">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exam_date" class="control-label col-sm-2">Date of Exam:</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="exam_date" id="exam_date">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="app_pack_no"class="control-label col-sm-2">Approved Package No:</label>
                        <div class="col-sm-6">
                            <select id="app_pack_no" class="form-control" name="app_pack_no">
                                <option value=""></option>
                                @foreach($package as $field)
                                    <option value="{{$field->app_pack_no}}">{{$field->app_pack_no}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_created"class="control-label col-sm-2">Date created:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="date_created">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="approved_by"class="control-label col-sm-2">Approved by:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="approved_by">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="sector"class="control-label col-sm-2">Sector:</label>
                        <div class="col-sm-6">
                            <select id="sector" class="form-control" name="sector">
                                <option value=""></option>
                                @foreach($sector as $field)
                                    <option value="{{$field->Sectorcode}}">{{$field->Sectorname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sub_sector"class="control-label col-sm-2">Sub-sector:</label>
                        <div class="col-sm-6">
                            <select id="sub_sector" class="form-control" name="sub_sector">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="os"class="control-label col-sm-2">OS:</label>
                        <div class="col-sm-6">
                            <select id="os" class="form-control" name="os">
                                <option value=""></option>
                                @foreach($os as $field)
                                    <option value="{{$field->OScode}}">{{$field->OScode}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="level"class="control-label col-sm-2">Level:</label>
                        <div class="col-sm-6">
                            <select id="level" class="form-control" name="level">
                                <option value=""></option>
                                @foreach($level as $field)
                                    <option value="{{$field->Levelcode}}">{{$field->Levelcode}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="region"class="control-label col-sm-2">Region:</label>
                        <div class="col-sm-6">
                            <select id="region" class="form-control" name="region">
                                <option value=""></option>
                                @foreach($region as $field)
                                    <option value="{{$field->Regioncode}}">{{$field->Regioncode}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group col-md-12 table-responsive">
                        <table class="table table-info">
                            <thead class="">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">First name</th>
                                <th scope="col">Middle name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Comp(F)</th>
                                <th scope="col">Comp(M)</th>
                                <th scope="col">Incomp(F)</th>
                                <th scope="col">Incomp(M)</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Assessor 1</td>
                                <td><input type="text" class="form-control" name="fname1"></td>
                                <td><input type="text" class="form-control" name="mname1"></td>
                                <td><input type="text" class="form-control" name="lname1"></td>
                                <td><input type="number" id="com_fem1" name="com_fem1" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" id="com_male1" name="com_male1" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" id="incomp_fem1" name="incomp_fem1" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" id="incomp_male1" name="incomp_male1" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" id="total1" name="total1" class="form-control" min="0" placeholder="0" readonly></td>
                            </tr>
                            <tr>
                                <td>Assessor 2</td>
                                <td><input type="text" class="form-control" name="fname2"></td>
                                <td><input type="text" class="form-control" name="mname2"></td>
                                <td><input type="text" class="form-control" name="lname2"></td>
                                <td><input type="number" name="com_fem2" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="com_male2" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="incomp_fem2" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="incomp_male2" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="total2" class="form-control" min="0" placeholder="0" readonly></td>
                            </tr>
                            <tr>
                                <td>Assessor 3</td>
                                <td><input type="text" class="form-control" name="fname3"></td>
                                <td><input type="text" class="form-control" name="mname3"></td>
                                <td><input type="text" class="form-control" name="lname3"></td>
                                <td><input type="number" name="com_fem3" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="com_male3" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="incomp_fem3" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="incomp_male3" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="total3" class="form-control" min="0" placeholder="0" readonly></td>
                            </tr>
                            <tr>
                                <td>Assessor 4</td>
                                <td><input type="text" class="form-control" name="fname4"></td>
                                <td><input type="text" class="form-control" name="mname4"></td>
                                <td><input type="text" class="form-control" name="lname4"></td>
                                <td><input type="number" name="com_fem4" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="com_male4" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="incomp_fem4" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="incomp_male4" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="total4" class="form-control" min="0" placeholder="0" readonly></td>
                            </tr>
                            <tr>
                                <td>Assessor 5</td>
                                <td><input type="text" class="form-control" name="fname5"></td>
                                <td><input type="text" class="form-control" name="mname5"></td>
                                <td><input type="text" class="form-control" name="lname5"></td>
                                <td><input type="number" name="com_fem5" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="com_male5" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="incomp_fem5" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="incomp_male5" class="form-control" min="0" placeholder="0"></td>
                                <td><input type="number" name="total5" class="form-control" min="0" placeholder="0" readonly></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-sm-2">
                        <button class="form-control col-sm-8 btn btn-primary" style="margin-left: 980px;" name="save" value="save" type="submit">Save</button>
                    </div>
                </form>
            </div>

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

@section('ajax')
    <script type="text/javascript">
        var xhttp = new XMLHttpRequest();
        var sectorName = document.getElementById('sector');
        sectorName.onchange=  function (){
            var msg="NO Sub Sector found";
            var new_content='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    if(responseObject.length===0){
                        new_content+='<option value="">'+msg+'</option>';
                    }else {
                        for (var i = 0; i < responseObject.subsector.length; i++) {
                            new_content += '<option value="' + responseObject.subsector[i].Subsectorcode + '">' + responseObject.subsector[i].Subsectorname + '</option>';
                        }
                    }
                    document.getElementById("sub_sector").innerHTML = new_content;
                }
            };
            xhttp.open("GET", "get_subsector/" + sectorName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }


        var packageName=document.getElementById('app_pack_no');
        packageName.onchange=  function (){
            console.log("adfasfda");
            var by='';
            var at='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    by=responseObject[0].approved_by;
                    at=responseObject[0].created_at;
                    console.log(responseObject);
                    document.getElementById("approved_by").value = by;
                    document.getElementById("date_created").value=at;

                }
            };
            xhttp.open("GET", "get_app_pack/" + packageName.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

        var com_fem1=document.getElementById('com_fem1');
        var total=0;
        var val=0;

        com_fem1.onchange= function (){
            val=Number.parseInt(com_fem1.value);
            console.log(document.getElementById('total1').value);
            total=Number.parseInt(document.getElementById('total1').value);
            if(Number.isNaN(total)){
                console.log("echo");
                total=0;
            }
            console.log(total);
            total+=val;
            console.log(total);
            document.getElementById('total1').value=total;

        }

    </script>
@endsection
