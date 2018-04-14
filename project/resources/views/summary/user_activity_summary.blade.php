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
                            <th scope="col">Activity</th>
                            <th scope="col">Date</th>
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
            $('#selectfield').change(function(){
                var select_value = $(selectfield).val();
                var url_path = "/summary/user-activity-summary/get-user/" + select_value;

                if (select_value != "") {
                    $.ajax({
                        type: 'GET',
                        url: url_path,
                        success: function(data) {
                            var table_value = '';
                            var result = data.result;

                            if (result.length == 0)
                                table_value += '<th>No Users could be Found</th>';

                            for (var i=0; i<result.length; i++)
                            {
                                var cur_result = result[i];

                                console.log(cur_result);
                                table_value+='';
                                table_value += '<tr><td>' + cur_result.employee_id + '</td>' +
                                    '<td>' + cur_result.activity + '</td>' +
                                    '<td>' + cur_result.created_at + '</td>';
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