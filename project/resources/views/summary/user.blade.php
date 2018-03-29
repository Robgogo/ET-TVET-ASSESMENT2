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
                    <option value="{{ $field->employee_id }}">{{ $field->employee_id }}</option>
                  @endforeach
                </select>
              </div>
              &nbsp;&nbsp;&nbsp;
              <div class="form-group">
                <label for="datefrom" style="font-size: 1.2em" class="control-label">
                  Date From&nbsp;&nbsp;</label>
                <input type="date" name="datefrom" id="datefrom" class="form-control" placeholder="mm/dd/yyyy">
              </div>
              <div class="form-group">
                <label for="dateto" style="font-size: 1.2em" class="control-label">
                  Date To&nbsp;</label>
                <input type="date" name="dateto" id="dateto" class="form-control" placeholder="mm/dd/yyyy">
              </div>
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
                <th scope="col">Date</th>
                <th scope="col">Full Name</th>
                <th scope="col">Position</th>
                <th scope="col">Department</th>
                <th scope="col" >Sector</th>
                <th scope="col" >Sub-sector</th>
                <th scope="col" >Region</th>
                <th scope="col" >Email</th>
                <th scope="col" >Mobile</th>
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
          $('#selectfield, #datefrom,#dateto').change(function(){
              var select_value = $(selectfield).val();
              var date_from = $('#datefrom').val();
              var date_to= $('#dateto').val();
              var url_path = "/summary/user-summary/get-user/" + select_value;
              if (date_from != "" && date_to != "") {
                  url_path += "/" + date_from + "/" + date_to;
                  console.log(url_path);
              }


              if (select_value != "") {
                  $.ajax({
                      type: 'GET',
                      url: url_path,
                      success: function(data) {
                          var table_value = '';
                          var result = data.result;
                          var info=data.infos;


                          if (result.length == 0)
                              table_value += '<th>No Opened Packages Found</th>';

                          //console.log(pack);
                          for (var i=0; i<result.length; i++)
                          {
                              var cur_result = result[i];
                              var cur_info=info[i];
                              console.log(cur_info);
                              console.log(cur_result);
                              table_value += '<tr><td>' + cur_result.employee_id + '</td>' +
                                  '<td>' + cur_result.created_at + '</td>' +
                                  '<td>' + cur_result.first_name + ' ' + cur_result.middle_name + ' ' +  cur_result.last_name + '</td>' +
                                  '<td>' + cur_result.position + '</td>' +
                                  '<td>' + cur_result.department + '</td>' +
                                  '<td>' + cur_result.sector_code + '</td>' +
                                  '<td>' + cur_result.subsector_code + '</td>' +
                                  '<td>' + cur_result.region_code + '</td>' +
                                  '<td>' + cur_info[0].email + '</td>' +
                                  '<td>' + cur_result.mobile + '</td>';
                              table_value += '</tr>';
                          }

                          $('#tablebody').html(table_value);
                      }
                  })
              }

          });
      });
  </script>

@endsection