<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\OccupationalStandard;

class OccupationalStandardController extends Controller
{
    public function index(){
    	return view('maintenance.occupational_standard');
    }

    public function store(){
        $os=new OccupationalStandard;
    	if(null!==request('save')){

            $this->validate(request(),[

                'os_code'=>'required',
                'os_name'=>'required',
                'os_description'=>'required'
            ]);
    		
    		$os->OScode=request('os_code');
    		$os->OSname=request('os_name');
    		$os->OSdesc=request('os_description');
    		$os->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){
            $this->validate(request(),[

                'os_code'=>'required',
                'os_name'=>'required',
                'os_description'=>'required'
            ]);

            DB::table('occupational_standards')
                ->where('OScode',request('os_code'))
                ->update([
                    'OSname'=>request('os_name'),
                    'OSdesc'=>request('os_description')
                ]);
    	}

    	else if(null!==request('delete')){

            $this->validate(request(),[
                'os_code'=>'required',
            ]);

            DB::table('occupational_standards')
                ->where('OScode',request('os_code'))
                ->delete();

    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
