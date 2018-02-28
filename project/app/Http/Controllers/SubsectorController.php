<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsector;
use DB;

class SubsectorController extends Controller
{
    public function index(){
    	return view('maintenance.subsector');
    }

    public function store(){
        $subsector=new Subsector;
    	if(null!==request('save')){
    		
            $this->validate(request(),[

                //code to validate the choosen sector
                'subsector_code'=>'required',
                'subsector_name'=>'required',
                'subsector_description'=>'required'

            ]);

            $subsector->sector_id=request('sector_id');
    		$subsector->Subsectorcode=request('subsector_code');
    		$subsector->Subsectorname=request('subsector_name');
    		$subsector->Subsectordesc=request('subsector_description');
    		$subsector->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){

            $this->validate(request(),[

                //code to validate the choosen sector
                'subsector_code'=>'required',
                'subsector_name'=>'required',
                'subsector_description'=>'required'

            ]);

            DB::table('subsectors')
                ->where('Subsectorcode',request('subsector_code'))
                ->update([
                    'sector_id'=>request('sector_id'),
                    'Subsectorname'=>request('subsector_name'),
                    'Subsectordesc'=>request('subsector_description')

                ]);

    	}

    	else if(null!==request('delete')){

            $this->validate(request(),[

                'subsector_code'=>'required'
            ]);

             DB::table('subsectors')
                ->where('Subsectorcode',request('sector_code'))
                ->delete();

    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
