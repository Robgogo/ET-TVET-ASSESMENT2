<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sector;

class SectorController extends Controller
{

    public function index(){
    	return view('maintenance.sector');
    }

    public function store(){
        $sector=new Sector;
    	if(null!==request('save')){

            $this->validate(request(),[

                'sector_code'=>'required',
                'sector_name'=>'required',
                'sector_description'=>'required'
            ]);
    	
    		$sector->Sectorcode=request('sector_code');
    		$sector->Sectorname=request('sector_name');
    		$sector->Sectordesc=request('sector_description');
    		$sector->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){
            $this->validate(request(),[

                'sector_code'=>'required',
                'sector_name'=>'required',
                'sector_description'=>'required'
            ]);

            DB::table('sectors')
                ->where('Sectorcode',request('sector_code'))
                ->update([
                    'Sectorname'=>request('sector_name'),
                    'Sectordesc'=>request('sector_description')

                ]);
    	}

    	else if(null!==request('delete')){
            $this->validate(request(),[
                'sector_code'=>'required'
            ]);
            DB::table('sectors')
                ->where('Sectorcode',request('sector_code'))
                ->delete();
    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
