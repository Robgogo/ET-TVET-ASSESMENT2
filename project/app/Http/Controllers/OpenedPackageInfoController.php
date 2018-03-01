<?php

namespace App\Http\Controllers;

use App\CreatePackage;
use App\Package;
use Illuminate\Http\Request;
use App\OpenedPackageInfo;
use App\OpenPackage;
use DB;

class OpenedPackageInfoController extends Controller
{
    public function store(){
        $pack=new OpenedPackageInfo;

        $this->validate(request(),[
            'new_comments'=>'required',
            'upload'=>'required'
        ]);

        $val=OpenPackage::get()->where('open_pack_no',request('opackno'))->first();
        $id=$val->pluck('id');

        $package_id=$val->pluck('created_package_id');
        $pack_code=CreatePackage::get()->where('id',$val->pluck('created_package_id')[0])->first();

        $package=Package::get()->where('Packagecode',$pack_code->pluck('package_code')[0]);

        $pack->open_package_id=$id[0];
        $pack->item_no=request('item_no');

        $pac_name=$package->pluck('Packagename');
        $dir="public/files/opened/".$pac_name[0];
        $file_name=request()->upload->getClientOriginalName();

        if(request()->hasFile('upload')){
            request()->upload->storeAs($dir,$file_name);
        }


        $pack->opened_items_dir=$dir."/".$file_name;
        $pack->opened_item_comment=request('new_comments');
        $pack->save();

        return view('/');


    }
}
