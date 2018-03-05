<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use DB;

class PackageController extends Controller
{
    public function index(){


    	return view('maintenance.package');
    }

    public function store(){
        $package=new Package;
    	if(null!==request('save')){
    		
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
    	}
    	else if(null!==request('edit')){

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

    	}

    	else if(null!==request('delete')){
            $this->validate(request(),[

                'package_code'=>'required'
            ]);

            DB::table('packages')
                ->where('Packagecode',request('package_code'))
                ->delete();
    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
