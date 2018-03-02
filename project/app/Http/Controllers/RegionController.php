<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use DB;

class RegionController extends Controller
{
    public function index(){
    	return view('maintenance.region');
    }

    public function store(){
        $region=new Region;
    	if(null!==request('save')){
    		
            $this->validate(request(),[

                'region_code'=>'required',
                'region_name'=>'required',
                'region_description'=>'required'
            ]);

    		$region->Regioncode=request('region_code');
    		$region->Regionname=request('region_name');
    		$region->Regiondesc=request('region_description');
    		$region->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){

            $this->validate(request(),[

                'region_code'=>'required',
                'region_name'=>'required',
                'region_description'=>'required'
            ]);

            DB::table('regions')
                ->where('Regioncode',request('region_code'))
                ->update([

                    'Regioncode'=>request('region_code'),
                    'Regionname'=>request('region_name'),
                    'Regiondesc'=>request('region_description'),

                ]);
    	}

    	else if(null!==request('delete')){

            $this->validate(request(),[

                'region_code'=>'required'
            ]);

            DB::table('regions')
            ->where('Regioncode',request('region_code'))
            ->delete();
    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
