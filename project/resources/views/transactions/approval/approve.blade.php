@extends('layouts.layout')
@section('content')

    <form role="form" method="POST" action="/approve" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group col-md-3">
            <label for="apackno">Post Package No:</label>
            <input type="text" class="form-control " name="apackno" id="apackno" readonly="true" value="{{$posted_pack_no}}">
        </div>
        <div class="form-group col-md-3">
            <label for="date">Date:</label>
            <input type="text" class="form-control" name="date" id="date" value="{{$date}}" readonly="true">
        </div>
        <div class="form-group col-md-3">
            <label for="created_by">Posted By:</label>
            <input type="text" class="form-control" name="created_by" id="created_by" readonly="true" value="{{$posted_by}}">
        </div>
        <br>

        <div class="form-group col-md-12 table-responsive">
            <table class="table table-striped table-bordered table-info">
                <thead class="">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Download a document</th>
                    <th scope="col">Old comments</th>

                </tr>
                </thead>

                <tbody>
                @for($i=0;$i<$val->count();$i++)
                    <tr>
                        <input type="hidden" value="{{$i+1}}" name="item_no">
                        <td>Item {{$i+1}}</td>
                        <td>
                            <input type="text" class="form-control" readonly="true" value="{{$items[$i]->item_name}}">
                        </td>
                        <td>
                            <a href="/download_for_approve/{{$val[$i]->id}}" class="btn btn-primary " role="button">Download Files</a>
                        </td>

                        <td>
                            <input type="text" class="form-control" name="comments" id="comments" readonly="true" value="{{$val[$i]->post_item_comment}}">
                        </td>

                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
        <br>
        <div class="form-group col-md-3"  style="margin-left:1100px;">
            <button name="disapprove" class="form-control col-md-5 btn btn-danger" value="Disapprove" type="submit">Disapprove</button>
            <button name="approve" class="form-control col-md-5 btn btn-primary" style="margin-left:10px;" value="approve" type="submit">Approve</button>

        </div>
        @include('layouts.errors')
    </form>


@endsection