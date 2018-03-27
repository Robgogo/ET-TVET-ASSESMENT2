<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sector;

class SectorController extends Controller
{

    public function index(){
    	return view('maintenance.sector.sector');
    }

    public function store(){
        $sector=new Sector;
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

    	
    	return redirect('/sector/show');
    }

    public function show(){
        $sectors=Sector::all();
        //dd($sectors);
        return view('maintenance.sector.show')->with(compact('sectors'));
    }

    public function showEdit($id){
        $sector=Sector::findorfail($id);
        return view('maintenance.sector.edit')->with(compact('sector'));
    }

    public function edit(){
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
        return redirect('/sector/show');
    }

    public function delete($id){
        DB::table('sectors')
            ->where('id',$id)
            ->delete();
        return redirect('/sector/show');
    }

}
