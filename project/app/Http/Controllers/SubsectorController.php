<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsector;
use App\Sector;
use DB;

class SubsectorController extends Controller
{
    public function index(){

        $sector=Sector::all();
    	return view('maintenance.subsector.subsector')->with(compact('sector'));
    }

    public function store(){
        $subsector=new Subsector;
    	if(null!==request('save')){
    		
            $this->validate(request(),[

                //code to validate the choosen sector
                'subsector_code'=>'required',
                'subsector_name'=>'required',
                'sector_id'=>'required',
                'subsector_description'=>'required'

            ]);

            $subsector->sector_id=request('sector_id');
    		$subsector->Subsectorcode=request('subsector_code');
    		$subsector->Subsectorname=request('subsector_name');
    		$subsector->Subsectordesc=request('subsector_description');
    		$subsector->save();
    		//dd(request()->all());
    	}
    	
    	return redirect('/subsector/show');
    }

    public function show(){
        $subsectors=Subsector::all();
        //dd($sectors);
        return view('maintenance.subsector.show')->with(compact('subsectors'));
    }

    public function showEdit($id){
        $subsector=Subsector::findorfail($id);
        $sector=Sector::all();
        //dd($subsector);
        return view('maintenance.subsector.edit')->with(compact('subsector','sector'));
    }

    public function edit(){
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
        return redirect('/subsector/show');
    }

    public function delete($id){
        DB::table('subsectors')
            ->where('id',$id)
            ->delete();
        return redirect('/subsector/show');
    }
}
