<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OccupationalStandard;
class OccupationalStandardController extends Controller
{
    public function index(){
    	return view('maintenance.occupational_standard');
    }

    public function store(){
        $os=new OccupationalStandard;
    	if(null!==request('save')){
    		
    		$os->OScode=request('os_code');
    		$os->OSname=request('os_name');
    		$os->OSdesc=request('os_description');
    		$os->save();
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
