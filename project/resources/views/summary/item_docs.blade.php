@extends('layouts.layout')

@section('content')
  @if(Auth::check())
    <div class="row">
      <div class="offset-sm-1 col-sm-7">
        <form action="" method="GET" class="form-horizontal">
          <div class="form-group">
            <label for="lastname" style="font-size: 1.2em" class="col-sm-2 control-label">
            Item Code&nbsp;&nbsp;</label>
            <div class="col-sm-2">
              <select class="form-control"
                  id="selectfield" name="selectfield">
                    <option value=""></option>
                    <option value="all">All</option>
                    @foreach ($item_docs as $field)
                      <option value="{{ $field->Itemcode }}">{{ $field->Itemcode }}</option>
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
              <th scope="col">Item Code</th>
              <th scope="col">Item Name</th>
              <th scope="col">Item Description</th>
            </tr>
          </thead>
          <tbody id="tablebody">

          </tbody>
        </table>
      </div>
    </div>
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
        var url_path = "/summary/item/get-item/" + select_value;

        if (select_value != "") {
          $.ajax({
            type: 'GET',
            url: url_path,
            success: function(data) {
              var table_value = '';
              var result = data.result;

              if (result.length == 0)
                table_value += '<th>No Item added yet</th>';

              for (var i=0; i<result.length; i++) 
              {
                var cur_result = result[i];
                table_value += '<tr><td>' + cur_result.Itemcode + '</td>' +
                            '<td>' + cur_result.Itemname + '</td>' +
                            '<td>' + cur_result.Itemdesc + '</td></tr>';
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