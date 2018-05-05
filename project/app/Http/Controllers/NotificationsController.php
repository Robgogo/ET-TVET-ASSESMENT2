<?php

namespace App\Http\Controllers;
use App\Notifications;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function show($id){
        $notifs=Notifications::where('user_id',$id)->get();

        return view('notifications')->with(compact('notifs'));
    }

    public static function notify($notification,$user_id,$from){
        $notifs=new Notifications;

        $notifs->user_id=$user_id;
        $notifs->notification=$notification;
        $notifs->from_user=$from;

        if($notifs->save()){
            return true;
        }else{
            return false;
        }

    }
}
