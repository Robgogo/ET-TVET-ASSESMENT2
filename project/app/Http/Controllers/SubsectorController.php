<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsector;
use App\Sector;
use DB;
use Illuminate\Support\Facades\Auth;

class SubsectorController extends Controller
{
    public function index(){

        $sector=Sector::all();
    	return view('maintenance.subsector.subsector')->with(compact('sector'));
    }

    public function store(){
        $subsector=new Subsector;
    		
        $this->validate(request(),[

            //code to validate the choosen sector
            'subsector_code'=>'required',
            'subsector_name'=>'required',
            'sector_id'=>'required',
            'subsector_description'=>'required'

        ]);

        $subsec=Subsector::where('Subsectorcode',request('subsector_code'))->get();
        if(!$subsec->isEmpty()){
            request()->session()->flash("alert-danger","Sub-sector with this sub-sector code exists,try again with different input!");
            return redirect('/subsector/show');
        }
        else{
            $subsector->sector_id=request('sector_id');
            $subsector->Subsectorcode=request('subsector_code');
            $subsector->Subsectorname=request('subsector_name');
            $subsector->Subsectordesc=request('subsector_description');

            if($subsector->save()){

                $sec_id=$subsector->id;
                $secs=Subsector::find($sec_id);
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created sub-sector ".$secs->Subsectorname.".");
                request()->session()->flash("alert-success","Subsector added successfully.");
            }
            else{
                request()->session()->flash("alert-danger","Could not add sub-sector due to an error,try again later. We will fix it ASAP.");
            }
            return redirect('/subsector/show');
        }

    }

    public function show(){
        $subsectors=Subsector::orderBy('id','desc')->paginate(20);
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

        if(DB::table('subsectors')
            ->where('Subsectorcode',request('subsector_code'))
            ->update([
                'sector_id'=>request('sector_id'),
                'Subsectorname'=>request('subsector_name'),
                'Subsectordesc'=>request('subsector_description')

            ])){
            $sec=Subsector::where('Subsectorcode',request('subsector_code'))->get();
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Updated sector ".$sec[0]->Sunsectorname.".");
            request()->session()->flash("alert-success","Updated successfully");
        }
        else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }
        return redirect('/subsector/show');
    }

    public function delete($id){
        $sec=Subsector::find($id);
        $sec_name=$sec->Subsectorname;
       if(DB::table('subsectors')
            ->where('id',$id)
            ->delete()){
           $id=Auth::user()->employee_id;
           UserActivityController::store($id,"Deleted sub-sector ".$sec_name.".");
           request()->session()->flash("alert-success","Deleted sub-sector successfully!");
       }
       else{
           request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
       }
        return redirect('/subsector/show');
    }
}
