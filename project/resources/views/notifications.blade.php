@extends('layouts.layout')

@section('content')

    <div class="container">
        <div>
            <p class="h3">Notifications</p>
        </div>

        <div class="form-group col-md-12 table-responsive">
            <table class="table table-striped table-info">
                <thead class="">
                <tr>
                    <th scope="col">Notification</th>
                    <th scope="col">From</th>
                    <th scope="col">Time</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($notifs as $notif)
                        <tr>
                            <td>{{$notif->notification}}</td>
                            <td>{{$notif->from_user}}</td>
                            <td>{{$notif->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach

                    <?php
                        use Illuminate\Support\Facades\DB;
                        DB::table('users')->where('id',Auth::user()->id)->update(['new_notif_count'=>0]);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    


@endsection