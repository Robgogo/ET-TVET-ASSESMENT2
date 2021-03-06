@extends('layouts.layout')
@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\EmployeeInfoController::isUserAdmin(Auth::user()))
    <h2>Set user permission</h2>
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="/user_permission" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-sm-2" for="permission_no">Permission Number:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="permission_no" id="permission_no" >
                </div>

            </div>
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

            <div class="form-group table-responsive">
                <table class="table table-striped table-bordered table-info">
                    <thead class="">
                    <tr>
                        <th scope="col">Transaction</th>
                        <th scope="col">Maintenance</th>
                        <th scope="col">Report</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>
                                <table class="table table-striped table-bordered table-info">
                                    <thead class="">
                                    <tr>
                                        <th scope="col">Permission</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <table  class="table table-striped table-bordered table-info">
                                                <thead class="">
                                                <tr>
                                                    <th></th>
                                                    <th scope="col">R</th>
                                                    <th scope="col">W</th>
                                                    <th scope="col">All</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Create Package</td>
                                                    <td><input type="radio" name="create_package_permission" value="read" id="create_package_permission_r"> </td>
                                                    <td><input type="radio" name="create_package_permission" value="write" id="create_package_permission_w"> </td>
                                                    <td><input type="radio" name="create_package_permission" value="all" id="create_package_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Open Package</td>
                                                    <td><input type="radio" name="open_package_permission" value="read" id="open_package_permission_r"> </td>
                                                    <td><input type="radio" name="open_package_permission" value="write" id="open_package_permission_w"> </td>
                                                    <td><input type="radio" name="open_package_permission" value="all" id="open_package_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Post Package</td>
                                                    <td><input type="radio" name="post_package_permission" value="read" id="post_package_permission_r"> </td>
                                                    <td><input type="radio" name="post_package_permission" value="write" id="post_package_permission_w"> </td>
                                                    <td><input type="radio" name="post_package_permission" value="all" id="post_package_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Approve Package</td>
                                                    <td><input type="radio" name="approve_package_permission" value="read" id="approve_package_permission_r"> </td>
                                                    <td><input type="radio" name="approve_package_permission" value="write" id="approve_package_permission_w"> </td>
                                                    <td><input type="radio" name="approve_package_permission" value="all" id="approve_package_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Assesor Info</td>
                                                    <td><input type="radio" name="assesor_info_permission" value="read" id="assesor_info_permission_r"> </td>
                                                    <td><input type="radio" name="assesor_info_permission" value="write" id="assesor_info_permission_w"> </td>
                                                    <td><input type="radio" name="assesor_info_permission" value="all" id="assesor_info_permission_a"> </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </td>

                            <td>
                                <table class="table table-striped table-bordered table-info">
                                    <thead class="">
                                    <tr>
                                        <th scope="col">Permission</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <table  class="table table-striped table-bordered table-info">
                                                <thead class="">
                                                <tr>
                                                    <th></th>
                                                    <th scope="col">R</th>
                                                    <th scope="col">W</th>
                                                    <th scope="col">All</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Sector</td>
                                                    <td><input type="radio" name="sector_permission" value="read" id="sector_permission_r"> </td>
                                                    <td><input type="radio" name="sector_permission" value="write" id="sector_permission_w"> </td>
                                                    <td><input type="radio" name="sector_permission" value="all" id="sector_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Sub sector</td>
                                                    <td><input type="radio" name="subsector_permission" value="read" id="subsector_permission_r"> </td>
                                                    <td><input type="radio" name="subsector_permission" value="write" id="subsector_permission_w"> </td>
                                                    <td><input type="radio" name="subsector_permission" value="all" id="subsector_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Os</td>
                                                    <td><input type="radio" name="os_permission" value="read" id="os_permission_r"> </td>
                                                    <td><input type="radio" name="os_permission" value="write" id="os_permission_w"> </td>
                                                    <td><input type="radio" name="os_permission" value="all" id="os_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Level</td>
                                                    <td><input type="radio" name="level_permission" value="read" id="level_permission_r"> </td>
                                                    <td><input type="radio" name="level_permission" value="write" id="level_permission_w"> </td>
                                                    <td><input type="radio" name="level_permission" value="all" id="level_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Region</td>
                                                    <td><input type="radio" name="region_permission" value="read" id="region_permission_r"> </td>
                                                    <td><input type="radio" name="region_permission" value="write" id="region_permission_w"> </td>
                                                    <td><input type="radio" name="region_permission" value="all" id="region_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Item Doc</td>
                                                    <td><input type="radio" name="itemdoc_permission" value="read" id="itemdoc_permission_r"> </td>
                                                    <td><input type="radio" name="itemdoc_permission" value="write" id="itemdoc_permission_w"> </td>
                                                    <td><input type="radio" name="itemdoc_permission" value="all" id="itemdoc_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Package</td>
                                                    <td><input type="radio" name="package_permission" value="read" id="package_permission_r"> </td>
                                                    <td><input type="radio" name="package_permission" value="write" id="package_permission_w"> </td>
                                                    <td><input type="radio" name="package_permission" value="all" id="package_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Assesor</td>
                                                    <td><input type="radio" name="assesor_permission" value="read" id="assesor_permission_r"> </td>
                                                    <td><input type="radio" name="assesor_permission" value="write" id="assesor_permission_w"> </td>
                                                    <td><input type="radio" name="assesor_permission" value="all" id="assesor_permission_a"> </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>

                            <td>

                                <table class="table table-striped table-bordered table-info">
                                    <thead class="">
                                    <tr>
                                        <th scope="col">Permission</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <table  class="table table-striped table-bordered table-info">
                                                <thead class="">
                                                <tr>
                                                    <th></th>
                                                    <th scope="col">R</th>
                                                    <th scope="col">W</th>
                                                    <th scope="col">All</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Sector summary</td>
                                                    <td><input type="radio" name="sector_summary_permission" value="read" id="sector_summary_permission_r"> </td>
                                                    <td><input type="radio" name="sector_summary_permission" value="write" id="sector_summary_permission_w"> </td>
                                                    <td><input type="radio" name="sector_summary_permission" value="all" id="sector_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Sub sector summary</td>
                                                    <td><input type="radio" name="subsector_summary_permission" value="read" id="subsector_summary_permission_r"> </td>
                                                    <td><input type="radio" name="subsector_summary_permission" value="write" id="subsector_summary_permission_w"> </td>
                                                    <td><input type="radio" name="subsector_summary_permission" value="all" id="subsector_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Os summary</td>
                                                    <td><input type="radio" name="os_summary_permission" value="read" id="os_summary_permission_r"> </td>
                                                    <td><input type="radio" name="os_summary_permission" value="write" id="os_summary_permission_w"> </td>
                                                    <td><input type="radio" name="os_summary_permission" value="all" id="os_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Level summary</td>
                                                    <td><input type="radio" name="level_summary_permission" value="read" id="level_summary_permission_r"> </td>
                                                    <td><input type="radio" name="level_summary_permission" value="write" id="level_summary_permission_w"> </td>
                                                    <td><input type="radio" name="level_summary_permission" value="all" id="level_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Region summary</td>
                                                    <td><input type="radio" name="region_summary_permission" value="read" id="region_summary_permission_r"> </td>
                                                    <td><input type="radio" name="region_summary_permission" value="write" id="region_summary_permission_w"> </td>
                                                    <td><input type="radio" name="region_summary_permission" value="all" id="region_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Item Doc summary</td>
                                                    <td><input type="radio" name="itemdoc_summary_permission" value="read" id="itemdoc_summary_permission_r"> </td>
                                                    <td><input type="radio" name="itemdoc_summary_permission" value="write" id="itemdoc_summary_permission_w"> </td>
                                                    <td><input type="radio" name="itemdoc_summary_permission" value="all" id="itemdoc_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Package summary</td>
                                                    <td><input type="radio" name="package_summary_permission" value="read" id="package_summary_permission_r"> </td>
                                                    <td><input type="radio" name="package_summary_permission" value="write" id="package_summary_permission_w"> </td>
                                                    <td><input type="radio" name="package_summary_permission" value="all" id="package_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Assesor</td>
                                                    <td><input type="radio" name="assesor_summary_permission" value="read" id="assesor_summary_permission_r"> </td>
                                                    <td><input type="radio" name="assesor_summary_permission" value="write" id="assesor_summary_permission_w"> </td>
                                                    <td><input type="radio" name="assesor_summary_permission" value="all" id="assesor_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Create Package summary</td>
                                                    <td><input type="radio" name="create_package_summary_permission" value="read" id="create_summary_package_permission_r"> </td>
                                                    <td><input type="radio" name="create_package_summary_permission" value="write" id="create_summary_package_permission_w"> </td>
                                                    <td><input type="radio" name="create_package_summary_permission" value="all" id="create_summary_package_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Open Package summary</td>
                                                    <td><input type="radio" name="open_package_summary_permission" value="read" id="open_package_summary_permission_r"> </td>
                                                    <td><input type="radio" name="open_package_summary_permission" value="write" id="open_package_summary_permission_w"> </td>
                                                    <td><input type="radio" name="open_package_summary_permission" value="all" id="open_package_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Post Package summary</td>
                                                    <td><input type="radio" name="post_package_summary_permission" value="read" id="post_package_summary_permission_r"> </td>
                                                    <td><input type="radio" name="post_package_summary_permission" value="write" id="post_package_summary_permission_w"> </td>
                                                    <td><input type="radio" name="post_package_summary_permission" value="all" id="post_package_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Approve Package summary</td>
                                                    <td><input type="radio" name="approve_package_summary_permission" value="read" id="approve_package_summary_permission_r"> </td>
                                                    <td><input type="radio" name="approve_package_summary_permission" value="write" id="approve_package_summary_permission_w"> </td>
                                                    <td><input type="radio" name="approve_package_summary_permission" value="all" id="approve_package_summary_permission_a"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Assesor Info summary</td>
                                                    <td><input type="radio" name="assesor_info_summary_permission" value="read" id="assesor_info_summary_permission_r"> </td>
                                                    <td><input type="radio" name="assesor_info_summary_permission" value="write" id="assesor_info_summary_permission_w"> </td>
                                                    <td><input type="radio" name="assesor_info_summary_permission" value="all" id="assesor_info_summary_permission_a"> </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="form-group col-sm-2">
                <button class="form-control col-sm-8 btn btn-primary" style="margin-left: 1020px;" name="save" value="save" type="submit">Save</button>
            </div>

        </form>
    </div>

    @include('layouts.errors')

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
                    console.log(responseObject);
                    first_name=responseObject.employee.first_name;
                    middle_name=responseObject.employee.middle_name;
                    last_name=responseObject.employee.last_name;
                    sector=responseObject.employee.sector_code;
                    subsector=responseObject.employee.subsector_code;
                    region=responseObject.employee.region_code;
                    department=responseObject.employee.department;
                    position=responseObject.employee.position;
                    src=responseObject.employee.image_dir;
                    var test='{{asset('storage/')}}'+'/'+src;
                    var img="<img src='{{asset('storage/')}}"+"/"+src+"' id='picture'>";
                   
                    //document.getElementById("image").appendChild("");
                   

                    document.getElementById("first_name").value = first_name;
                    document.getElementById("middle_name").value = middle_name;
                    document.getElementById("last_name").value = last_name;
                    document.getElementById("sector").value = sector;
                    document.getElementById("subsector").value = subsector;
                    document.getElementById("department").value = department;
                    document.getElementById("position").value = position;
                    document.getElementById("region").value = region;
                    document.getElementById('picture').src="{{asset('storage/')}}"+"/"+src;
                    if(responseObject.maintenance){
                        if(responseObject.maintenance.sector.toString()=="all"){
                            document.getElementById('sector_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.sector.toString()=="read"){
                            document.getElementById('sector_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.sector.toString()=="write"){
                            document.getElementById('sector_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.maintenance.sub_sector.toString()=="all"){
                            document.getElementById('subsector_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.sub_sector.toString()=="read"){
                            document.getElementById('subsector_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.sub_sector.toString()=="write"){
                            document.getElementById('subsector_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.maintenance.os.toString()=="all"){
                            document.getElementById('os_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.os.toString()=="read"){
                            document.getElementById('os_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.os.toString()=="write"){
                            document.getElementById('os_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.maintenance.level.toString()=="all"){
                            document.getElementById('level_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.level.toString()=="read"){
                            document.getElementById('level_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.level.toString()=="write"){
                            document.getElementById('level_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.maintenance.region.toString()=="all"){
                            document.getElementById('region_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.region.toString()=="read"){
                            document.getElementById('region_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.region.toString()=="write"){
                            document.getElementById('region_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.maintenance.item_doc.toString()=="all"){
                            document.getElementById('itemdoc_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.item_doc.toString()=="read"){
                            document.getElementById('itemdoc_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.item_doc.toString()=="write"){
                            document.getElementById('itemdoc_permission_w').setAttribute('checked','checked');
                        }
                        
                        if(responseObject.maintenance.package.toString()=="all"){
                            document.getElementById('package_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.package.toString()=="read"){
                            document.getElementById('package_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.package.toString()=="write"){
                            document.getElementById('package_permission_w').setAttribute('checked','checked');
                        }
                        
                        if(responseObject.maintenance.assesor.toString()=="all"){
                            document.getElementById('assesor_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.assesor.toString()=="read"){
                            document.getElementById('assesor_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.maintenance.assesor.toString()=="write"){
                            document.getElementById('assesor_permission_w').setAttribute('checked','checked');
                        }
                    }

                    if(responseObject.transaction){
                        if(responseObject.transaction.create_package.toString()=="all"){
                            document.getElementById('create_package_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.create_package.toString()=="read"){
                            document.getElementById('create_package_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.create_package.toString()=="write"){
                            document.getElementById('create_package_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.transaction.open_package.toString()=="all"){
                            document.getElementById('open_package_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.open_package.toString()=="read"){
                            document.getElementById('open_package_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.open_package.toString()=="write"){
                            document.getElementById('open_package_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.transaction.post_package.toString()=="all"){
                            document.getElementById('post_package_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.post_package.toString()=="read"){
                            document.getElementById('post_package_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.post_package.toString()=="write"){
                            document.getElementById('post_package_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.transaction.approve_package.toString()=="all"){
                            document.getElementById('approve_package_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.approve_package.toString()=="read"){
                            document.getElementById('approve_package_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.approve_package.toString()=="write"){
                            document.getElementById('approve_package_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.transaction.assesor_info.toString()=="all"){
                            document.getElementById('assesor_info_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.assesor_info.toString()=="read"){
                            document.getElementById('assesor_info_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.transaction.assesor_info.toString()=="write"){
                            document.getElementById('assesor_info_permission_w').setAttribute('checked','checked');
                        }
                    }

                    if(responseObject.report){
                        if(responseObject.report.sector_summary.toString()=="all"){
                            document.getElementById('sector_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.sector_summary.toString()=="read"){
                            document.getElementById('sector_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.sector_summary.toString()=="write"){
                            document.getElementById('sector_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.sub_sector_summary.toString()=="all"){
                            document.getElementById('subsector_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.sub_sector_summary.toString()=="read"){
                            document.getElementById('subsector_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.sub_sector_summary.toString()=="write"){
                            document.getElementById('subsector_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.os_summary.toString()=="all"){
                            document.getElementById('os_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.os_summary.toString()=="read"){
                            document.getElementById('os_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.os_summary.toString()=="write"){
                            document.getElementById('os_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.level_summary.toString()=="all"){
                            document.getElementById('level_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.level_summary.toString()=="read"){
                            document.getElementById('level_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.level_summary.toString()=="write"){
                            document.getElementById('level_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.region_summary.toString()=="all"){
                            document.getElementById('region_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.region_summary.toString()=="read"){
                            document.getElementById('region_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.region_summary.toString()=="write"){
                            document.getElementById('region_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.item_doc_summary.toString()=="all"){
                            document.getElementById('itemdoc_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.item_doc_summary.toString()=="read"){
                            document.getElementById('itemdoc_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.item_doc_summary.toString()=="write"){
                            document.getElementById('itemdoc_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.package_summary.toString()=="all"){
                            document.getElementById('package_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.package_summary.toString()=="read"){
                            document.getElementById('package_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.package_summary.toString()=="write"){
                            document.getElementById('package_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.assesor_summary.toString()=="all"){
                            document.getElementById('assesor_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.assesor_summary.toString()=="read"){
                            document.getElementById('assesor_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.assesor_summary.toString()=="write"){
                            document.getElementById('assesor_summary_permission_w').setAttribute('checked','checked');
                        }
                        
                        if(responseObject.report.created_packages_summary.toString()=="all"){
                            document.getElementById('create_summary_package_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.created_packages_summary.toString()=="read"){
                            document.getElementById('create_summary_package_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.created_packages_summary.toString()=="write"){
                            document.getElementById('create_summary_package_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.open_packages_summary.toString()=="all"){
                            document.getElementById('open_package_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.open_packages_summary.toString()=="read"){
                            document.getElementById('open_package_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.open_packages_summary.toString()=="write"){
                            document.getElementById('open_package_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.post_packages_summary.toString()=="all"){
                            document.getElementById('post_package_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.post_packages_summary.toString()=="read"){
                            document.getElementById('post_package_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.post_packages_summary.toString()=="write"){
                            document.getElementById('post_package_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.approve_package_summary.toString()=="all"){
                            document.getElementById('approve_package_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.approve_package_summary.toString()=="read"){
                            document.getElementById('approve_package_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.approve_package_summary.toString()=="write"){
                            document.getElementById('approve_package_summary_permission_w').setAttribute('checked','checked');
                        }

                        if(responseObject.report.assesor_info_summary.toString()=="all"){
                            document.getElementById('assesor_info_summary_permission_a').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.assesor_info_summary.toString()=="read"){
                            document.getElementById('assesor_info_summary_permission_r').setAttribute('checked','checked');
                        }
                        else if(responseObject.report.assesor_info_summary.toString()=="write"){
                            document.getElementById('assesor_info_summary_permission_w').setAttribute('checked','checked');
                        }
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