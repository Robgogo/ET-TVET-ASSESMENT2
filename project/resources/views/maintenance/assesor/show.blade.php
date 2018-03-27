@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasSectorPermission( Auth::user()))
            <div class="container">
                <h1><a href="/assesor/create" title="Add new"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></h1>
                <div class="form-group col-md-12 table-responsive">
                    <table class="table ">
                        <thead class="">
                        <tr>
                            <th scope="col">Assesor code</th>
                            <th scope="col">Assesor Name</th>
                            <th scope="col">Assesor description</th>
                            <th scope="col" colspan="2">&nbsp;</th>

                        </tr>
                        </thead>

                        <tbody>
                        @if(!$assesors->isEmpty())
                        @foreach($assesors as $assesor)
                            <tr>
                                <td>{{$assesor->AScode}}</td>
                                <td>{{$assesor->ASname}}</td>
                                <td>{{$assesor->ASdesc}}</td>
                                <td>
                                    <a href="/assesor/edit/{{$assesor->id}}"><button type="submit" class="btn btn-primary " >Update</button></a>
                                </td>
                                <td>
                                    <button class="btn btn-danger " data-toggle="modal" data-target="#myDeleteModal">
                                        Delete
                                    </button>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="myDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <form method="POST" action="/assesor/delete/{{$assesor->id}}">
                                <div class="modal-body">
                                    <p>Are you sure to delete the level {{$assesor->Asname}}?</p>
                                </div>
                                <div class="modal-footer">

                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger" >Delete</button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        @else
            <tr><th>No records found</th></tr>
        @endif
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

