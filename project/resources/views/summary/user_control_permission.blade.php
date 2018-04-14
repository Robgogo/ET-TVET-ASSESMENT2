@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\EmployeeInfoController::isUserAdmin(Auth::user()))
            <div class="row">
                <div class="offset-sm-1 col-sm-11">
                    <form action="" method="GET" class="form-inline">

                        <div class="form-group">
                            <label for="selectfield" style="font-size: 1.2em" class="control-label">
                                Employee Id:&nbsp;&nbsp;</label>
                            <select class="form-control"
                                    id="selectfield" name="selectfield">
                                <option value=""></option>
                                <option value="all">All</option>
                                @foreach ($users as $field)
                                    <option value="{{ $field->id }}">{{ $field->employee_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        &nbsp;

                    </form>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Employee Id</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Sector</th>
                            <th scope="col">Sub-sector</th>
                            <th scope="col">Region</th>
                            <th scope="col">Package</th>
                            <th scope="col" >Os</th>
                            <th scope="col" >Level</th>
                            <th scope="col" >Items</th>
                            <th scope="col" >Assessor</th>
                            <th scope="col">Create</th>
                            <th scope="col">Open</th>
                            <th scope="col">Post</th>
                            <th scope="col">Approve</th>
                            <th scope="col" >Assessor Info</th>
                            <th scope="col">Sector Summary</th>
                            <th scope="col">Sub-sector Summary</th>
                            <th scope="col">Region Summary</th>
                            <th scope="col">Package Summary</th>
                            <th scope="col" >Os Summary</th>
                            <th scope="col" >Level Summary</th>
                            <th scope="col" >Items Summary</th>
                            <th scope="col" >Assessor Summary</th>
                            <th scope="col">Create Summary</th>
                            <th scope="col">Open Summary</th>
                            <th scope="col">Post Summary</th>
                            <th scope="col">Approve Summary</th>
                            <th scope="col" >Assessor Info Summary</th>
                        </tr>
                        </thead>
                        <tbody id="tablebody">

                        </tbody>
                    </table>
                </div>
            </div>
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

@section('ajax')

    <script>
        $(document).ready(function() {
            $('#selectfield, #maintenance,#transaction,#report').change(function(){
                var select_value = $(selectfield).val();
                var url_path = "/summary/user-permission-summary/get-user/" + select_value;


                if (select_value != "") {
                    $.ajax({
                        type: 'GET',
                        url: url_path,
                        success: function(data) {
                            var table_value = '';

                            var maintenacePermission=data.maintenance;
                            var transactionPermission=data.transaction;
                            var reportPermission=data.report;
                            var result = data.result;

                            if (result.length == 0)
                                table_value += '<th>No Users could be Found</th>';

                            //console.log(pack);
                            for (var i=0; i<result.length; i++)
                            {
                                var cur_result = result[i];
                                var cur_main=maintenacePermission[i];
                                var cur_tran=transactionPermission[i];
                                var cur_repo=reportPermission[i];

                                console.log(cur_result);
                                table_value+='';
                                table_value += '<tr><td>' + cur_result.employee_id + '</td>' +
                                    '<td>' + cur_result.first_name + ' ' + cur_result.middle_name + ' ' +  cur_result.last_name + '</td>' ;

                                table_value+='<td>' + cur_main[0].sector + '</td>' +
                                        '<td>' + cur_main[0].sub_sector + '</td>' +
                                        '<td>' + cur_main[0].region + '</td>' +
                                        '<td>' + cur_main[0].package + '</td>' +
                                        '<td>' + cur_main[0].os + '</td>' +
                                        '<td>' + cur_main[0].level + '</td>' +
                                        '<td>' + cur_main[0].item_doc + '</td>' +
                                        '<td>' + cur_main[0].assesor + '</td>' ;
                                table_value+='<td>'+ cur_tran[0].create_package + '</td>' +
                                            '<td>' + cur_tran[0].open_package + '</td>' +
                                            '<td>' + cur_tran[0].post_package + '</td>' +
                                            '<td>' + cur_tran[0].approve_package + '</td>' +
                                            '<td>' + cur_tran[0].assesor_info + '</td>' ;

                                table_value+='<td>'+ cur_repo[0].sector_summary + '</td>' +
                                            '<td>' + cur_repo[0].sub_sector_summary + '</td>' +
                                            '<td>' + cur_repo[0].region_summary + '</td>' +
                                            '<td>' + cur_repo[0].package_summary + '</td>' +
                                            '<td>' + cur_repo[0].os_summary + '</td>' +
                                            '<td>' + cur_repo[0].level_summary + '</td>' +
                                            '<td>' + cur_repo[0].item_doc_summary + '</td>' +
                                            '<td>' + cur_repo[0].assesor_summary + '</td>' +
                                            '<td>' + cur_repo[0].created_packages_summary + '</td>' +
                                            '<td>' + cur_repo[0].open_packages_summary + '</td>' +
                                            '<td>' + cur_repo[0].post_packages_summary + '</td>' +
                                            '<td>' + cur_repo[0].approve_package_summary + '</td>' +
                                            '<td>' + cur_repo[0].assesor_info_summary + '</td>';
                                table_value += '</tr>';
                            }


                            $('#tablebody').html(table_value);
//                          console.log( document.getElementById('tablebody').innerHTML);
  //                        console.log( document.getElementById('tablebody'));

//                            document.getElementById('tablebody').innerHTML = table_value + document.getElementById('tablebody');
                        }


                    })
                }

            });
        });
    </script>

@endsection