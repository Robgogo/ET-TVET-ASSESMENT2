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
                <tr>
                    <input type="hidden" value="1" name="item_no">
                    <td>Item 1</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[0]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[0]->id}}" class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="comments" id="comments" readonly="true" value="{{$val[0]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="2" name="item_no2">
                    <td>Item 2</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[1]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[1]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="comments2" id="comments2" readonly="true" value="{{$val[1]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="3" name="item_no3">
                    <td>Item 3</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[2]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[2]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="comments3" id="comments3" readonly="true" value="{{$val[2]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="4" name="item_no4">
                    <td>Item 4</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[3]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[3]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="comments4" id="comments4" readonly="true" value="{{$val[3]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="5" name="item_no5">
                    <td>Item 5</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[4]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[4]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="comments5" id="comments5" readonly="true" value="{{$val[4]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="6" name="item_no6">
                    <td>Item 6</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[5]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[5]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="comments6" id="comments6" readonly="true" value="{{$val[5]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="7" name="item_no7">
                    <td>Item 7</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[6]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[6]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control"  name="comments7" id="comments7" readonly="true" value="{{$val[6]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="8" name="item_no8">
                    <td>Item 8</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[7]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[7]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="comments8" id="comments8" readonly="true" value="{{$val[7]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="9" name="item_no9">
                    <td>Item 9</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[8]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[8]->id}}"  class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                        <input type="text" class="form-control" name="comments9" id="comments9" readonly="true" value="{{$val[8]->post_item_comment}}">
                    </td>

                </tr>
                <tr>
                    <input type="hidden" value="10" name="item_no10">
                    <td>Item 10</td>
                    <td>
                        <input type="text" class="form-control" readonly="true" value="{{$items[9]->item_name}}">
                    </td>
                    <td>
                        <a href="/download_for_approve/{{$val[9]->id}}" class="btn btn-primary " role="button">Download Files</a>
                    </td>

                    <td>
                            <input type="text" class="form-control" name="comments10" id="comments10" readonly="true" value="{{$val[9]->post_item_comment}}">
                    </td>

                </tr>
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