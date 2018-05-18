@extends('layouts.layout')
    @section('content')

        <form role="form" method="POST" action="/openPackages" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group col-md-3">
                <label for="opackno">Package No:</label>
                <input type="text" class="form-control " name="opackno" id="opackno" readonly="true" value="{{$cpack_no}}">
            </div>
            <div class="form-group col-md-3">
                <label for="date">Date:</label>
                <input type="text" class="form-control" name="date" id="date" value="{{$date}}" readonly="true">
            </div>
            <div class="form-group col-md-3">
                <label for="created_by">Created By:</label>
                <input type="text" class="form-control" name="created_by" id="created_by" readonly="true" value="{{$created_by}}">
            </div>
            <br>
            <div class="form-group col-md-12 table-responsive">
                <table class="table table-striped table-bordered table-info">
                    <thead class="">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Download a document</th>
                        <th scope="col">Upload new document</th>
                        <th scope="col">Old comments</th>
                        <th scope="col">New comments</th>
                    </tr>
                    </thead>

                    <tbody>
                    @for($i=0;$i<$count;$i++)
                        <tr>
                            <input type="hidden" value="{{$i+1}}" name="item_no[]">
                            <td>Item {{$i+1}}</td>
                            <td>
                                <input type="text" class="form-control" readonly="true" value="{{$val[$i]->item_name}}">
                            </td>
                            <td>
                                <a href="/download/{{$val[$i]->id}}" class="btn btn-primary " role="button">Download Files</a>
                            </td>
                            <td>
                                <input type="file" class="form-control" name="upload[]" id="upload" accept="application/pdf">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="comments[]" id="comments" readonly="true" value="{{$val[$i]->comments}}">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="new_comments[]" id="new_comments">
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
            <br>
            <div class="form-group col-md-3">
                <button name="save" class="form-control col-md-5 btn btn-primary" style="margin-left:1250px;" type="submit">Save</button>
            </div>
            @include('layouts.errors')
        </form>
    @endsection