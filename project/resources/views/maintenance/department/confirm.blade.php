@extends('layouts.layout')

@section('content')
    <button class="btn btn-danger " name="delete" data-toggle="modal" data-target="#myDeleteModal">
        Delete
    </button>
    <div class="modal fade" id="myDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <form method="POST" action="/department/delete/{{$dep->id}}">
                    <div class="modal-body">
                        <p>Are you sure to delete the department {{$dep->Deptname}}?</p>
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
@endsection