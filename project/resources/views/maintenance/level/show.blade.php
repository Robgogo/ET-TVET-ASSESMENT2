@extends('layouts.layout')

@section('content')
    @if(Auth::check())
     @if(\App\Http\Controllers\EmployeeInfoController::isUserActive(Auth::user()))
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
            <h1><a href="/level/create" title="Add new"><button class="btn btn-info">Add Level</button></a></h1>
            <hr>
            <div class="form-group col-md-12 table-responsive">
                <table class="table ">
                    <thead class="">
                    <tr>
                        <th scope="col">Level code</th>
                        <th scope="col">Level Name</th>
                        <th scope="col">Level description</th>
                        <th scope="col" colspan="2">&nbsp;</th>

                    </tr>
                    </thead>

                    <tbody>
                    @if(!$levels->isEmpty())
                        <?php $i=0; ?>
                    @foreach($levels as $level)
                        <tr>
                            <td>{{$level->Levelcode}}</td>
                            <td>{{$level->Levelname}}</td>
                            <td>{{$level->Leveldesc}}</td>
                            <td>
                                <a href="/level/edit/{{$level->id}}"><button type="submit" class="btn btn-primary " >Update</button></a>
                            </td>
                            <td>
                                <button class="btn btn-danger " data-toggle="modal" data-target="#myDeleteModal{{$i}}<?php $i++; ?>">
                                    Delete
                                </button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @for($i=0;$i<$levels->count();$i++)
            <div class="modal fade" id="myDeleteModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <form method="POST" action="/level/delete/{{$levels[$i]->id}}">
                            <div class="modal-body">
                                <p>Are you sure to delete the level {{$levels[$i]->pluck('Levelname')[$i]}}?</p>
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
        </tbody>
        </table>
        </div>
        </div>
    @endif
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

