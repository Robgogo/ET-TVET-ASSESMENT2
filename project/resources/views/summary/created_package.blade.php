@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasCreateSummaryPermission(Auth::user()))
            <div class="row">
              <div class="offset-sm-1 col-sm-11">
                <form action="" method="GET" class="form-inline">
                  <div class="form-group">
                    <label for="selectfield" style="font-size: 1.2em" class="control-label">
                    Created Package Number&nbsp;&nbsp;</label>
                    <select class="form-control"
                        id="selectfield" name="selectfield">
                          <option value=""></option>
                          <option value="all">All</option>
                          @foreach ($packages as $field)
                            <option value="{{ $field->cpack_no }}">{{ $field->cpack_no }}</option>
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
                      Date To&nbsp;&nbsp;</label>
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
                      <th scope="col">Package Number</th>
                      <th scope="col">Date</th>
                      <th scope="col">Created By</th>
                      <th scope="col">Package Code</th>
                      <th scope="col">Package Name</th>
                      <th scope="col" colspan="3">Item </th>
                    </tr>
                  </thead>
                  <tbody id="tablebody">


                  </tbody>
                </table>
              </div>
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

  <script>
    $(document).ready(function() {
      $('#selectfield, #datefrom,#dateto').change(function(){
        var select_value = $(selectfield).val();
        var date_from = $('#datefrom').val();
        var date_to = $('#dateto').val();
        var url_path = "/summary/created-package/get-package/" + select_value;
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
              var items = data.items;
              var pack_name=data.name;


              if (result.length == 0)
                table_value += '<th>No Packages Found</th>';
              for (var i=0; i<result.length; i++) 
              {
                var cur_result = result[i];
                var cur_item = items[i];
                var cur_name=pack_name[i];
                console.log(cur_name[0].Packagename);
                table_value += '<tr><td>' + cur_result.cpack_no + '</td>' +
                            '<td>' + cur_result.created_at + '</td>' +
                            '<td>' + cur_result.creatd_by + '</td>' +
                            '<td>' + cur_result.package_code + '</td>' +
                            '<td>' + cur_name[0].Packagename + '</td>';
                table_value += '<td><table class="table table-hover "><tbody>';
                for (var j=0; j<cur_item.length; j++)
                {
                    table_value += '<tr><td>' + cur_item[j].item_name + '</td>' +
                                    '<td>' + cur_item[j].file_dir + '</td>' +
                                    '<td>' + cur_item[j].comments + '</td></tr>';
                }
                table_value += '</tbody></table></td></tr>';
              }
              table_value += '</tbody>'

              $('#tablebody').html(table_value);
            }
          })
        }
        
      });
    });
  </script>

@endsection