<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\OccupationalStandard;
use Illuminate\Support\Facades\Auth;

class OccupationalStandardController extends Controller
{
    public function index(){
    	return view('maintenance.os.occupational_standard');
    }

    public function store(){
        $os=new OccupationalStandard;

        $this->validate(request(),[

            'os_code'=>'required',
            'os_name'=>'required',
            'os_description'=>'required'
        ]);

        $oss=OccupationalStandard::where('OScode',request('os_code'))->get();
        if(!$oss->isEmpty()){
            request()->session()->flash("alert-danger","OS with this os code exists,try again with different input!");
            return redirect('/os/show');
        }
        else{
            $os->OScode=request('os_code');
            $os->OSname=request('os_name');
            $os->OSdesc=request('os_description');

            if($os->save()){
                $os_id=$os->id;
                $osss=OccupationalStandard::find($os_id);
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created OS ".$osss->OSname.".");
                request()->session()->flash("alert-success","OS added successfully.");
            }else{
                request()->session()->flash("alert-success","Could not add OS due to an error,try again later. We will fix it ASAP.");
            }

            return redirect('/os/show');
        }

    }

    public function show(){
        $occupationalStandards=OccupationalStandard::orderBy('id','desc')->paginate(20);
        //dd($sectors);
        return view('maintenance.os.show')->with(compact('occupationalStandards'));
    }

    public function showEdit($id){
        $os=OccupationalStandard::findorfail($id);
        //dd($subsector);
        return view('maintenance.os.edit')->with(compact('os'));
    }

    public function edit(){
        $this->validate(request(),[

            'os_code'=>'required',
            'os_name'=>'required',
            'os_description'=>'required'
        ]);

        if(DB::table('occupational_standards')->where('OScode',request('os_code'))->update([
                'OSname'=>request('os_name'), 'OSdesc'=>request('os_description')])){
            $os=OccupationalStandard::where('OScode',request('os_code'))->get();
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Updated OS ".$os[0]->OSname.".");
            request()->session()->flash("alert-success","Updated successfully");
        } else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }
        return redirect('/os/show');
    }

    public function delete($id){
        $os=OccupationalStandard::find($id);
        $os_name=$os->OSname;
        if(DB::table('occupational_standards')->where('id',$id)->delete()){
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Deleted OS ".$os_name.".");
            request()->session()->flash("alert-success","Deleted OS successfully!");
        }else{
            request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
        }

        return redirect('/os/show');
    }
}
