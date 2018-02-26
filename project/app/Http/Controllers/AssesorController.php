<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Assesor;

class AssesorController extends Controller
{
    public function index(){
    	return view('maintenance.assesor');
    }

    public function store(){

        $assesor=new Assesor;

    	if(null!==request('save')){

            $this->validate(request(),[

                'assesor_code'=>'required',
                'assesor_name'=>'required',
                'assesor_description'=>'required'
            ]);

    		
    		$assesor->AScode=request('assesor_code');
    		$assesor->ASname=request('assesor_name');
    		$assesor->ASdesc=request('assesor_description');
    		$assesor->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){
            $this->validate(request(),[

                'assesor_code'=>'required',
                'assesor_name'=>'required',
                'assesor_description'=>'required'
            ]);

            DB::table('assesors')
                ->where('AScode',request('assesor_code'))
                ->update([
                    'ASname'=>request('assesor_name'),
                    'ASdesc'=>request('assesor_description')
                ]);

    	}

    	else if(null!==request('delete')){
            $this->validate(request(),[
                'assesor_code'=>'required',
            ]);

            DB::table('assesors')
                ->where('AScode',request('assesor_code'))
                ->delete();

    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
