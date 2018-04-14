<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use DB;
use Illuminate\Support\Facades\Auth;

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

        $reg=Region::where("Regioncode",request('region_code'))->get();
        if(!$reg->isEmpty()){
            request()->session()->flash("alert-danger","Region already exists,try again with different input!");
            return redirect('/sector/show');
        }
        else{
            $region->Regioncode=request('region_code');
            $region->Regionname=request('region_name');
            $region->Regiondesc=request('region_description');

            if($region->save()){
                $reg_id=$region->id;
                $regs=Region::find($reg_id);
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created sector ".$regs->Regionname.".");
                request()->session()->flash("alert-success","Region added successfully.");
            }
            else{
                request()->session()->flash("alert-danger","Could not Add region dueto a problem.");
            }
            //dd(request()->all());
            return redirect('/region/show');
        }
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

        if(DB::table('regions')
            ->where('Regioncode',request('region_code'))
            ->update([

                'Regioncode'=>request('region_code'),
                'Regionname'=>request('region_name'),
                'Regiondesc'=>request('region_description'),

            ])){
            $reg=Region::where('Regioncode',request('region_code'))->get();
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Updated sector ".$reg[0]->Regionname.".");
            request()->session()->flash("alert-success","Updated successfully");
        }
        else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }
        return redirect('/region/show');
    }

    public function delete($id){
        $reg=Region::find($id);
        $reg_name=$reg->Regionnmae;
        if(DB::table('regions')
            ->where('id',$id)
            ->delete()){
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Deleted region ".$reg_name.".");
            request()->session()->flash("alert-success","Deleted region successfully!");
        }else{
            request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
        }
        return redirect('/region/show');
    }
}
