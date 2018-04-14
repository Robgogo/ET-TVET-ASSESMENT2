<?php

namespace App\Http\Controllers;

use App\UserActivity;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public static function store($id,$activity){

        $user_activity=new UserActivity;

        $user_activity->employee_id=$id;
        $user_activity->activity=$activity;
        $user_activity->save();
    }
}
