<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use DB;

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

        $package->Packagecode=request('package_code');
        $package->Packagename=request('package_name');
        $package->Packagedesc=request('package_description');
        $package->save();
        //dd(request()->all());
    	return redirect('/package/show');
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

        DB::table('packages')
            ->where('Packagecode',request('package_code'))
            ->update([

                'Packagename'=>request('package_name'),
                'Packagedesc'=>request('package_description')

            ]);
        return redirect('/package/show');
    }

    public function delete($id){
        DB::table('packages')
            ->where('id',$id)
            ->delete();
        return redirect('/package/show');
    }
}
