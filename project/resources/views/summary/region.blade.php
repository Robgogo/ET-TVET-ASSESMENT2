@extends('layouts.layout')

@section('content')
  @if(Auth::check())
    @if(\App\Http\Controllers\UserControlPermissionController::hasRegionSummaryPermission(Auth::user()))
      <div class="row">
        <div class="offset-sm-1 col-sm-7">
          <form action="" method="GET" class="form-horizontal">
            <div class="form-group">
              <label for="lastname" style="font-size: 1.2em" class="col-sm-2 control-label">
              Level Code&nbsp;&nbsp;</label>
              <div class="col-sm-2">
                <select class="form-control"
                    id="selectfield" name="selectfield">
                      <option value=""></option>
                      <option value="all">All</option>
                      @foreach ($regions as $field)
                        <option value="{{ $field->Regioncode }}">{{ $field->Regioncode }}</option>
                      @endforeach
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="offset-sm-1 col-sm-8">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">Region Code</th>
                <th scope="col">Region Name</th>
                <th scope="col">Region Description</th>
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
      $('#selectfield').change(function(){
        var select_value = $(this).val();
        var url_path = "/summary/region/get-region/" + select_value;

        if (select_value != "") {
          $.ajax({
            type: 'GET',
            url: url_path,
            success: function(data) {
              var table_value = '';
              var result = data.result;

              if (result.length == 0)
                table_value += '<th>No Region added yet</th>';

              for (var i=0; i<result.length; i++) 
              {
                var cur_result = result[i];
                table_value += '<tr><td>' + cur_result.Regioncode + '</td>' +
                            '<td>' + cur_result.Regionname + '</td>' +
                            '<td>' + cur_result.Regiondesc + '</td></tr>';
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