<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Level;

class LevelController extends Controller
{
    public function index(){
    	return view('maintenance.level');
    }

    public function store(){
    	$level=new Level;
    	if(null!==request('save')){

            $this->validate(request(),[

                'level_code'=>'required',
                'level_name'=>'required',
                'level_description'=>'required'
            ]);
    		
    		$level->Levelcode=request('level_code');
    		$level->Levelname=request('level_name');
    		$level->Leveldesc=request('level_description');
    		$level->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){

             $this->validate(request(),[

                'level_code'=>'required',
                'level_name'=>'required',
                'level_description'=>'required'
            ]);

             DB::table('levels')
                ->where('Levelcode',request('level_code'))
                ->update([
                    'Levelname'=>request('level_name'),
                    'Leveldesc'=>request('level_description')
                ]);

    	}

    	else if(null!==request('delete')){

             $this->validate(request(),[
                'level_code'=>'required',
            ]);

             DB::table('levels')
                ->where('Levelcode',request('level_code'))
                ->delete();

    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
