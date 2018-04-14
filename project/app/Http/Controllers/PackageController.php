<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use DB;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function index(){


    	return view('maintenance.package.package');
    }

    public function store(){
        $package=new Package;
    		
        $this->validate(request(),[

            'package_code'=>'required',
            'package_name'=>'required',
            'package_description'=>'required'

        ]);
        $pack=Package::where('Packagecode',request('package_code'))->get();
        if(!$pack->isEmpty()){
            request()->session()->flash("alert-danger","Package with this package code exists,try again with different input!");
            return redirect('/package/show');
        }
        else{
            $package->Packagecode=request('package_code');
            $package->Packagename=request('package_name');
            $package->Packagedesc=request('package_description');

            if($package->save()){
                $pack_id=$package->id;
                $packs=Package::find($pack_id);

                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created package ".$packs->Packagename.".");
                request()->session()->flash("alert-success","Package added successfully.");
            }
            else{
                request()->session()->flash("alert-danger","Could not add package due to an error,try again later. We will fix it ASAP.");
            }
            //dd(request()->all());
            return redirect('/package/show');
        }
    }

    public function show(){
        $Packages=Package::all();
        //dd($sectors);
        return view('maintenance.package.show')->with(compact('Packages'));
    }

    public function showEdit($id){
        $package=Package::findorfail($id);
        //dd($subsector);
        return view('maintenance.package.edit')->with(compact('package'));
    }

    public function edit(){
        $this->validate(request(),[

            'package_code'=>'required',
            'package_name'=>'required',
            'package_description'=>'required'

        ]);

        if(DB::table('packages')
            ->where('Packagecode',request('package_code'))
            ->update([

                'Packagename'=>request('package_name'),
                'Packagedesc'=>request('package_description')

            ])){
            $pack=Package::where('Packagecode',request('package_code'))->get();
            $id=\Auth::user()->employee_id;
            UserActivityController::store($id,"Updated sector ".$pack[0]->Packagename.".");
            request()->session()->flash("alert-success","Updated successfully");
        }
        else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }
        return redirect('/package/show');
    }

    public function delete($id){
        $pack=Package::find($id);
        $pack_name=$pack->Packagename;
        if(DB::table('packages')
            ->where('id',$id)
            ->delete()){
            $id=\Auth::user()->employee_id;
            UserActivityController::store($id,"Deleted sector ".$pack_name.".");
            request()->session()->flash("alert-success","Deleted sector successfully!");
        }else{
            request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
        }
        return redirect('/package/show');
    }
}
