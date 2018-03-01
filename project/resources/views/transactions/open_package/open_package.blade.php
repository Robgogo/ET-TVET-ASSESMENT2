@extends('layouts.layout')
    @section('content')

        <form method="POST" action="/open" enctype="multipart/form-data">
            {{csrf_field()}}

            <div>
                <label for="opackno">Package No:</label>
                <input type="text" name="opackno" id="opackno" readonly="true" value="{{$open_pack_no}}">
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="text" name="date" id="date" value="{{$date}}" readonly="true">
            </div>
            <div>
                <label for="created_by">Created By:</label>
                <input type="text" name="created_by" id="created_by" readonly="true" value="by">
            </div>
            <div>
                <table>
                    <tr>
                        <th></th>
                        <th>Item Name</th>
                        <th>Download a document</th>
                        <th>Upload new document</th>
                        <th>Old comments</th>
                        <th>New comments</th>
                    </tr>
                    <tbody>
                        <tr>
                            <input type="hidden" value="1" name="item_no">
                            <td>Item 1</td>
                            <td>
                                <input type="text" readonly="true" value="{{$val->item_name}}">
                            </td>
                            <td>
                                <a href="/download/{{$created_package_id}}">Download Files</a>
                            </td>
                            <td>
                                <input type="file" name="upload" id="upload">
                            </td>
                            <td>
                                <input type="text" name="comments" id="comments" readonly="true" value="{{$val->comments}}">
                            </td>
                            <td>
                                <input type="text" name="new_comments" id="comments">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div>
                <button name="save" style="margin-left: 600px;" type="submit">Save</button>
            </div>
        </form>


    @endsection