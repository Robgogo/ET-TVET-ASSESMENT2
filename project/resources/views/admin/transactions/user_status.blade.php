@extends('layouts.layout')
@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\EmployeeInfoController::isUserAdmin(Auth::user()))
    <h2>Browse User</h2>
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="/update_status" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-sm-2" for="employee_id">Employee Id:</label>
                 <div class="col-sm-6">
                    <select id="employee_id" class="form-control " name="employee_id">
                        <option value="">Choose employee</option>
                        {{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
                        @foreach($employee as $code)
                            <option value="{{$code->id}}">{{$code->employee_id}}</option>
                        @endforeach
                    </select>
                 </div>
            </div>
            <div class="form-group" id="image">
                <img src="{{asset('storage/male_avatar.png')}}" id="picture" class="img-rounded" style="width: 240px;height: 240px; margin-left: 250px;">
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="first_name">First Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="first_name" id="first_name" readonly="true">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="middle_name">Middle Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="middle_name" id="middle_name" readonly="true">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="last_name">Last Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="last_name" id="last_name" readonly="true">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="sector">Sector:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="sector" id="sector" readonly="true">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="subsector">Sub Sector:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="subsector" id="subsector" readonly="true">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="department">Department:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="department" id="department" readonly="true">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="position">Position:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="position" id="position" readonly="true">
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="region">Region:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="region" id="region" readonly="true">
                </div>
            </div>
            <div class="form-group radio" style="margin-left: 200px;" >
                <label>
                    <input type="radio" name="status" value="active" id="active">Active
                </label>

            </div>
            <div class="form-group radio" style="margin-left: 200px;">
                <label>
                    <input type="radio" name="status" value="not active" id="not_active"> Not Active
                </label>
            </div>
            <br>
            <div class="form-group col-sm-2">
                <button class="form-control col-sm-8 btn btn-primary" style="margin-left: 620px;" name="save" value="save" type="submit">Save</button>
            </div>
        </form>
    </div>

@endsection
@section('ajax')
    <script type="text/javascript">
        var xhttp = new XMLHttpRequest();
        var employee = document.getElementById('employee_id');
        employee.onchange=  function (){
            console.log("adfasfda");
            var first_name='';
            var middle_name='';
            var last_name='';
            var sector='';
            var subsector='';
            var department='';
            var position='';
            var region='';
            var src='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject=JSON.parse(xhttp.responseText);
                    first_name=responseObject.first_name;
                    middle_name=responseObject.middle_name;
                    last_name=responseObject.last_name;
                    sector=responseObject.sector_code;
                    subsector=responseObject.subsector_code;
                    region=responseObject.region_code;
                    department=responseObject.department;
                    position=responseObject.position;
                    src=responseObject.image_dir;
                    var test='{{asset('storage/')}}'+'/'+src;
                    var img="<img src='{{asset('storage/')}}"+"/"+src+"' id='picture'>";
                    console.log(img);
                    console.log(responseObject);
                    //document.getElementById("image").appendChild("");
                    console.log(responseObject.status);


                    document.getElementById("first_name").value = first_name;
                    document.getElementById("middle_name").value = middle_name;
                    document.getElementById("last_name").value = last_name;
                    document.getElementById("sector").value = sector;
                    document.getElementById("subsector").value = subsector;
                    document.getElementById("department").value = department;
                    document.getElementById("position").value = position;
                    document.getElementById("region").value = region;
                    document.getElementById('picture').src="{{asset('storage/')}}"+"/"+src;
                    if(responseObject.status.toString()=="active"){
                        document.getElementById("active").setAttribute('checked','checked');
                    }
                    else{
                        document.getElementById("not_active").setAttribute('checked','checked');
                    }


                }
            };
            xhttp.open("GET", "get_emp_info/" + employee.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

    </script>
    @else
        <h1>Only System Admin is allowed to view this page!</h1>
    @endif
    @else
        <h1>You re not logged in!</h1>
        @if (Auth::guest())
            {{ view('Auth.login')}}
        @endif
    @endif
@endsection