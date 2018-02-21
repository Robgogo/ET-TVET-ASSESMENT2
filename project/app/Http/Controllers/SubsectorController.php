<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsector;

class SubsectorController extends Controller
{
    public function index(){
    	return view('maintenance.subsector');
    }

    public function store(){
        $subsector=new Subsector;
    	if(null!==request('save')){
    		
            $subsector->sector_id=request('sector_id');
    		$subsector->Subsectorcode=request('subsector_code');
    		$subsector->Subsectorname=request('subsector_name');
    		$subsector->Subsectordesc=request('subsector_description');
    		$subsector->save();
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
