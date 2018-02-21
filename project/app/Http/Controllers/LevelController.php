<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    public function index(){
    	return view('maintenance.level');
    }

    public function store(){
    	$level=new Level;
    	if(null!==request('save')){
    		
    		$level->Levelcode=request('level_code');
    		$level->Levelname=request('level_name');
    		$level->Leveldesc=request('level_description');
    		$level->save();
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
