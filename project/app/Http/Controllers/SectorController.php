<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;

class SectorController extends Controller
{
    public function index(){
    	return view('maintenance.sector');
    }

    public function store(){
        $sector=new Sector;
    	if(null!==request('save')){
    		
    		$sector->Sectorcode=request('sector_code');
    		$sector->Sectorname=request('sector_name');
    		$sector->Sectordesc=request('sector_description');
    		$sector->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){

    	}

    	else if(null!==request('delete')){

    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
