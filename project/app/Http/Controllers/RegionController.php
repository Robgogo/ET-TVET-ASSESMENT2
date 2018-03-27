<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use DB;

class RegionController extends Controller
{
    public function index(){
    	return view('maintenance.region.region');
    }

    public function store(){
        $region=new Region;
    		
        $this->validate(request(),[

            'region_code'=>'required',
            'region_name'=>'required',
            'region_description'=>'required'
        ]);

        $region->Regioncode=request('region_code');
        $region->Regionname=request('region_name');
        $region->Regiondesc=request('region_description');
        $region->save();
        //dd(request()->all());
    	return redirect('/region/show');
    }

    public function show(){
        $regions=Region::all();
        //dd($sectors);
        return view('maintenance.region.show')->with(compact('regions'));
    }

    public function showEdit($id){
        $region=Region::findorfail($id);
        //dd($subsector);
        return view('maintenance.region.edit')->with(compact('region'));
    }

    public function edit(){
        $this->validate(request(),[

            'region_code'=>'required',
            'region_name'=>'required',
            'region_description'=>'required'
        ]);

        DB::table('regions')
            ->where('Regioncode',request('region_code'))
            ->update([

                'Regioncode'=>request('region_code'),
                'Regionname'=>request('region_name'),
                'Regiondesc'=>request('region_description'),

            ]);
        return redirect('/region/show');
    }

    public function delete($id){
        DB::table('regions')
            ->where('id',$id)
            ->delete();
        return redirect('/region/show');
    }
}
