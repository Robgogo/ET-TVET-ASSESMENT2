<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreatedPackageInfo;

class CreatedPackageInfoController extends Controller
{
    public function store($id,$dir,$filename){
        $packageInfo=new CreatedPackageInfo;
        $packageInfo->created_package_id=$id;
        $packageInfo->item_name=request('item_name');
        $packageInfo->file_dir=$dir."/".$filename;
        $packageInfo->comments=request('comments');
        $packageInfo->save();
    }
}
