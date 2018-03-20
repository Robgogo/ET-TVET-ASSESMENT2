<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('guest')->except('destroy');
//    }


    public function index(){
        return view('Auth.login');
    }

    public function store(){

        if(!auth()->attempt(request(['email','password']))){
            return back();
        }

        return redirect('/');
    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }

}
