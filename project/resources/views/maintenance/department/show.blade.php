@extends('layouts.layout')

@section('content')
    @if(Auth::check())
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
            <h1><a href="/department/create" title="Add new"><button class="btn btn-info">Add Department</button> </a></h1>
            <hr>
            <div class="form-group col-md-12 table-responsive">
                <table class="table ">
                    <thead class="">
                    <tr>
                        <th scope="col">Department code</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Department description</th>
                        <th scope="col" colspan="3">&nbsp;</th>

                    </tr>
                    </thead>

                    <tbody>
                    @if(!$depts->isEmpty())
                        <?php $i=0; ?>
                    @foreach($depts as $dept)
                        <tr>
                            <td>{{$dept->Deptcode}}</td>
                            <td>{{$dept->Deptname}}</td>
                            <td>{{$dept->Deptdesc}}</td>
                            <td>
                                <a href="/department/edit/{{$dept->id}}"><button type="submit" class="btn btn-primary " >Update</button></a>

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
            @for($i=0;$i<$depts->count();$i++)
            <div class="modal fade" id="myDeleteModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <form method="POST" action="/department/delete/{{$depts[$i]->id}}">
                            <div class="modal-body">
                                <p>Are you sure to delete the department {{$depts[$i]->pluck('Deptname')[$i]}}?</p>
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
        <h1>You re not logged in!</h1>
        @if (Auth::guest())
            {{ view('Auth.login')}}
        @endif
    @endif


@endsection

