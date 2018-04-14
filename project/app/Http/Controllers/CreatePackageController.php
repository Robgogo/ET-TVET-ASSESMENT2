<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\CreatePackage;
use Illuminate\Support\Facades\Auth;


class CreatePackageController extends Controller
{
    public function index(){
    	$package=Package::all();
    	return view('transactions.create.create_package',compact('package'));
    }
    //function to store the form values on to the database and upload a file.

    public function store(){

        $createPackage=new CreatePackage;
        $packageInfo=new CreatedPackageInfoController;

        $this->validate(request(),[
            'cpackno'=>'required',
            'date'=>'required',
            'package_code'=>'required',
            'package_name'=>'required',
            'created_by'=>'required',
            'item_name'=>'required',
            'upload'=>'required',
            'comments'=>'required',
            'item_name2'=>'required',
            'upload2'=>'required',
            'comments2'=>'required',
            'item_name3'=>'required',
            'upload3'=>'required',
            'comments3'=>'required',
            'item_name4'=>'required',
            'upload4'=>'required',
            'comments4'=>'required',
            'item_name5'=>'required',
            'upload5'=>'required',
            'comments5'=>'required',
            'item_name6'=>'required',
            'upload6'=>'required',
            'comments6'=>'required',
            'item_name7'=>'required',
            'upload7'=>'required',
            'comments7'=>'required',
            'item_name8'=>'required',
            'upload8'=>'required',
            'comments8'=>'required',
            'item_name9'=>'required',
            'upload9'=>'required',
            'comments9'=>'required',
            'item_name10'=>'required',
            'upload10'=>'required',
            'comments10'=>'required'

        ]);

        $cpack=CreatePackage::where('cpack_no',request('cpackno'))->get();
        if(!$cpack->isEmpty()){
            request()->session()->flash("alert-danger","A package with this package no already exists,try again with different input!");
            return redirect('/create_package/show');
        }
        else{
            $cpack2=CreatePackage::where('package_code',request('package_code'))->get();
            if(!$cpack2->isEmpty()){
                request()->session()->flash("alert-danger","A package with this package code already exists,try again with different input!");
                return redirect('/create_package/show');
            }
            else{

                $createPackage->cpack_no=request('cpackno');
                $createPackage->package_code=request('package_code');
                $createPackage->creatd_by=request('created_by');

                if($createPackage->save()){
                    $id=$createPackage->id;
                    $packagename=request('package_name');

                    $dir="public/files/create/".$packagename;
                    $filename=request()->upload->getClientOriginalName();

                    if(request()->hasFile('upload')){
                        request()->upload->storeAs($dir,$filename);
                    }
                    $packageInfo->store($id,$dir,$filename);
                    $id=Auth::user()->employee_id;
                    UserActivityController::store($id,"Created package ".$packagename.".");
                    request()->session()->flash("alert-success","Package created successfully.");
                }
                else{
                    request()->session()->flash("alert-danger","Could not create package due to an error,try again later. We will fix it ASAP.");
                }
            }
        }
        return redirect('/create_package/show');
    }
//this two functions process the request from ajax and return the response.
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

    public function show(){
        $created=CreatePackage::all();

        return view('transactions.create.show')->with(compact("created"));
    }
}
