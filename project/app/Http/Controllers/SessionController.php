<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
//use App\Http\Controllers\UserActivityController;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('showPassword','changePassword');
    }


    public function index(){
        return view('Auth.login');
    }

    public function showPassword(){
        return view('Auth.change_password');
    }

    public function changePassword(){

        $validator=\Validator::make(request()->all(),[
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $user=\Auth::user();

        if(Hash::check(request()->get('old_password'),$user->password)){
            $user->password=bcrypt(request()->get('password'));
            $user->update();
            $id=$user->employee_id;
            UserActivityController::store($id,"Changed password.");
            request()->session()->flash('alert-success','Updated succesfully');
            return redirect('/');
        }
        else{
            $id=$user->employee_id;
            UserActivityController::store($id,"Failed to change password.");
            request()->session()->flash('alert-danger','Old password incorrect');
            return redirect()->back();
        }

    }
}
