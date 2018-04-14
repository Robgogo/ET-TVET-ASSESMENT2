<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sector;
use Illuminate\Support\Facades\Auth;

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

        $sec=Sector::where('Sectorcode',request('sector_code'))->get();
        if(!$sec->isEmpty()){
            request()->session()->flash("alert-danger","Sector with this sector code exists,try again with different input!");
            return redirect('/sector/show');
        }
        else{

            $sector->Sectorcode=request('sector_code');
            $sector->Sectorname=request('sector_name');
            $sector->Sectordesc=request('sector_description');

            if($sector->save()){

                $sec_id=$sector->id;
                $secs=Sector::find($sec_id);
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created sector ".$secs->Sectorname.".");
                request()->session()->flash("alert-success","Sector added successfully.");
            }
            else{
                request()->session()->flash("alert-success","Could not add sector due to an error,try again later. We will fix it ASAP.");
            }
            return redirect('/sector/show');
        }
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

        if(DB::table('sectors')
            ->where('Sectorcode',request('sector_code'))
            ->update([
                'Sectorname'=>request('sector_name'),
                'Sectordesc'=>request('sector_description')

            ])){
            $sec=Sector::where('Sectorcode',request('sector_code'))->get();
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Updated sector ".$sec[0]->Sectorname.".");
            request()->session()->flash("alert-success","Updated successfully");
        }
        else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }

        return redirect('/sector/show');
    }

    public function delete($id){
        $sec=Sector::find($id);
        $sec_name=$sec->Sectorname;
        if(DB::table('sectors')
            ->where('id',$id)
            ->delete()){
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Deleted sector ".$sec_name.".");
            request()->session()->flash("alert-success","Deleted sector successfully!");
        }else{
            request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
        }
        return redirect('/sector/show');
    }

}
