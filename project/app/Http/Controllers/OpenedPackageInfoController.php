<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OpenedPackageInfo;
use DB;

class OpenedPackageInfoController extends Controller
{
    public function store(){
        $pack=new OpenedPackageInfo;

        $this->validate(request(),[
            'new_comments'=>'required',
            'upload'=>'required'
        ]);

        $val=DB::table('open_packages')
                ->where('')


    }
}
