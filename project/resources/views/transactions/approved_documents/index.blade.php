@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\EmployeeInfoController::isUserActive(Auth::user()))
            <div class="panel" style="text-align: center">

                <div class="panel panel-heading">
                    <h3>Select document to download</h3>
                </div>
                <div>
                    <form role="form" action="/searchdoc" method="POST">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label" for="package">Package:</label>
                            <select id="package" name="package">
                                <option>select a package</option>
                                @foreach($package as $pack)
                                    <option value="{{$pack->Packagecode}}">{{$pack->Packagename}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="items">Item:</label>
                            <select id="items" name="items">
                                <option value="">select  item</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>


    @else
        <h2>Your account has been set to in active. contact your system adminstrator!</h2>
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
        var packageNumber = document.getElementById('package');
        packageNumber.onchange=  function (){
            console.log("adfasfda");
            var package_name='';
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    responseObject = JSON.parse(xhttp.responseText);
                    console.log(responseObject.items[0].Itemname);
                    var newcontent = '';
                    //items is part of the response
                    console.log(responseObject.items.length);
                    $('#items').empty();
                    for (var i = 0; i < responseObject.items.length; i++) {
                        newcontent += '<option value="' + responseObject.items[i].Itemname + '">' + responseObject.items[i].Itemname + '</option>';
                    }
                    document.getElementById("items").innerHTML = newcontent;
                }
            };
            xhttp.open("GET", "get_package_id/" + packageNumber.value, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.send();
        }

    </script>

@endsection

