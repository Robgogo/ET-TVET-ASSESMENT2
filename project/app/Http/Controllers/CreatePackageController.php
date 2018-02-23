<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\CreatePackage;
use App\CreatedPackageInfo;


class CreatePackageController extends Controller
{
    public function index(){
    	$package=Package::all();
    	return view('transactions.create_package',compact('package'));
    }

    public function store(){

        $createPackage=new CreatePackage;
        $packageInfo=new CreatedPackageInfo;

        $this->validate(request(),[
            'cpackno'=>'required',
            'date'=>'required',
            'package_code'=>'required',
            'package_name'=>'required',
            'created_by'=>'required',
            'item_name'=>'required',
            'upload'=>'required',
            'comments'=>'required'
        ]);
        $filename=request()->upload->getClientOriginalName();
        $packagename=request('package_name');

        $dir="public/files/".$packagename;
        if(request()->hasFile('upload')){
             request()->upload->storeAs($dir,$filename);
        }
        $createPackage->cpack_no=request('cpackno');
        $createPackage->package_code=request('package_code');
        $createPackage->creatd_by=request('created_by');
        $createPackage->save();
        $id=$createPackage->id;
        $packageInfo->created_package_id=$id;
        $packageInfo->item_name=request('item_name');
        $packageInfo->file_dir=$dir."/".$filename;
        $packageInfo->comments=request('comments');
        $packageInfo->save();

        return redirect('/');

    }

    public function getId($pack_no){
    	$pack=Package::get()->where('Packagecode',$pack_no);
    	$id=$pack->pluck('id')[0];
    	return $this->get($id);
    }

    public function get($id){
    	$package = Package::findOrFail($id);
    	$items = $package->items;
    	// dd(response()->json($items)->Itemnam;
    	return response()->json($package);
//    	return response()->json(['item_name'=>$package["items"]->pluck('Itemname')]);
    }
}
