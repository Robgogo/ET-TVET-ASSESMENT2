@extends('layouts.layout')
@section('content')

    <form role="form" method="POST" action="/post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group col-md-3">
            <label for="opackno">Package No:</label>
            <input type="text" class="form-control " name="opackno" id="opackno" readonly="true" value="{{$opened_pack_no}}">
        </div>
        <div class="form-group col-md-3">
            <label for="date">Date:</label>
            <input type="text" class="form-control" name="date" id="date" value="{{$date}}" readonly="true">
        </div>
        <div class="form-group col-md-3">
            <label for="created_by">Created By:</label>
            <input type="text" class="form-control" name="created_by" id="created_by" readonly="true" value="{{$opened_by}}">
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
                <tr>
                    <input type="hidden" value="1" name="item_no">
                    <td>Item 1</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[0]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[0]->id}}" class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload" id="upload">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments" id="comments" readonly="true" value="{{$val[0]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments" id="new_comments">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="2" name="item_no2">
                    <td>Item 2</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[1]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[1]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload2" id="upload2">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments2" id="comments2" readonly="true" value="{{$val[1]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments2" id="new_comments2">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="3" name="item_no3">
                    <td>Item 3</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[2]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[2]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload3" id="upload3">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments3" id="comments3" readonly="true" value="{{$val[2]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments3" id="new_comments3">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="4" name="item_no4">
                    <td>Item 4</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[3]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[3]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload4" id="upload4">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments4" id="comments4" readonly="true" value="{{$val[3]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments4" id="new_comments4">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="5" name="item_no5">
                    <td>Item 5</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[4]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[4]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload5" id="upload5">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments5" id="comments5" readonly="true" value="{{$val[4]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments5" id="new_comments5">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="6" name="item_no6">
                    <td>Item 6</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[5]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[5]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload6" id="upload6">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments6" id="comments6" readonly="true" value="{{$val[5]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments6" id="new_comments6">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="7" name="item_no7">
                    <td>Item 7</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[6]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[6]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload7" id="upload7">
                    </td>
                    <td>
                        <input type="text" class="form-control"  name="comments7" id="comments7" readonly="true" value="{{$val[6]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments7" id="new_comments7">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="8" name="item_no8">
                    <td>Item 8</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[7]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[7]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload8" id="upload8">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments8" id="comments8" readonly="true" value="{{$val[7]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments8" id="new_comments8">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="9" name="item_no9">
                    <td>Item 9</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[8]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[8]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload9" id="upload9">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments9" id="comments9" readonly="true" value="{{$val[8]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments9" id="new_comments9">
                    </td>
                </tr>
                <tr>
                    <input type="hidden" value="10" name="item_no10">
                    <td>Item 10</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[9]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_post/{{$val[9]->id}}" class="btn btn-primary " role="button">Download Files</a>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="upload10" id="upload10">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="comments10" id="comments10" readonly="true" value="{{$val[9]->opened_item_comment}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_comments10" id="new_comments10">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="form-group col-md-3">
            <button name="save" class="form-control col-md-5 btn btn-primary" style="margin-left:1250px;" type="submit">Save</button>
        </div>
    </form>


@endsection