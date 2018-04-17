@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasRegionPermission( Auth::user()))
            <div class="container">
                <div class="flash-message">
                    @foreach(['danger', 'warning', 'success', 'info'] as $msg)
                        @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">
                                {{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </p>
                        @endif
                    @endforeach
                </div>
                <hr>
                <h1><a href="/region/create" title="Add new"><button class="btn btn-info">Add Region</button></a></h1>
                <hr>
                <div class="form-group col-md-12 table-responsive">
                    <table class="table table-striped table-bordered table-info">
                        <thead class="">
                        <tr>
                            <th scope="col">Region code</th>
                            <th scope="col">Region Name</th>
                            <th scope="col">Region description</th>
                            <th scope="col" colspan="2">&nbsp;</th>

                        </tr>
                        </thead>

                        <tbody>
                        @if(!$regions->isEmpty())
                            <?php $i=0; ?>
                        @foreach($regions as $region)
                            <tr>
                                <td>{{$region->Regioncode}}</td>
                                <td>{{$region->Regionname}}</td>
                                <td>{{$region->Regiondesc}}</td>
                                <td>
                                    <a href="/region/edit/{{$region->id}}"><button type="submit" class="btn btn-primary " >Update</button></a>
                                </td>
                                <td>
                                    <button class="btn btn-danger " data-toggle="modal" data-target="#myDeleteModal{{$i}} <?php $i++; ?>">
                                        Delete
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @for($i=0;$i<$regions->count();$i++)
                <div class="modal fade" id="myDeleteModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <form method="POST" action="/region/delete/{{$regions[$i]->id}}">
                                <div class="modal-body">
                                    <p>Are you sure to delete the region {{$regions[$i]->pluck('Regionname')[$i]}}?</p>
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
                    @endfor
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

