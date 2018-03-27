@extends('layouts.layout')

@section('content')
    @if(Auth::check())
        @if(\App\Http\Controllers\UserControlPermissionController::hasSectorPermission( Auth::user()))
            <div class="container">
                <h1><a href="/item/create" title="Add new"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></h1>
                <div class="form-group col-md-12 table-responsive">
                    <table class="table ">
                        <thead class="">
                        <tr>
                            <th scope="col">Item code</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item description</th>
                            <th scope="col">Package</th>
                            <th scope="col" colspan="2">&nbsp;</th>

                        </tr>
                        </thead>

                        <tbody>
                        @if(!$items->isEmpty())
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->Itemcode}}</td>
                                <td>{{$item->Itemname}}</td>
                                <td>{{$item->Itemdesc}}</td>
                                <td>{{\App\Package::get()->where('id',$item->package_id)->pluck('Packagename')}}</td>
                                <td>
                                    <a href="/item/edit/{{$item->id}}"><button type="submit" class="btn btn-primary " >Update</button></a>
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
                            <form method="POST" action="/item/delete/{{$item->id}}">
                                <div class="modal-body">
                                    <p>Are you sure to delete the occupational standard {{$item->Itemname}}?</p>
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

