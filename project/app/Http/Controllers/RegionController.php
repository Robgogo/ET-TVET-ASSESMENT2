<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

class RegionController extends Controller
{
    public function index(){
    	return view('maintenance.region');
    }

    public function store(){
        $region=new Region;
    	if(null!==request('save')){
    		
    		$region->Regioncode=request('region_code');
    		$region->Regionname=request('region_name');
    		$region->Regiondesc=request('region_description');
    		$region->save();
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
