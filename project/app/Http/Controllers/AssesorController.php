<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Assesor;
use Illuminate\Support\Facades\Auth;

class AssesorController extends Controller
{
    public function index(){
    	return view('maintenance.assesor.assesor');
    }

    public function store(){

        $assesor=new Assesor;

        $this->validate(request(),[

            'assesor_code'=>'required',
            'assesor_name'=>'required',
            'assesor_description'=>'required'
        ]);

        $ass=Assesor::where('AScode',request('assesor_code'))->get();
        if(!$ass->isEmpty()){
            request()->session()->flash("alert-danger","Assesor with this assesor code exists,try again with different input!");
            return redirect('/assesor/show');
        }
        else{
            $assesor->AScode=request('assesor_code');
            $assesor->ASname=request('assesor_name');
            $assesor->ASdesc=request('assesor_description');

            if($assesor->save()){
                $ass_id=$assesor->id;
                $assesors=Assesor::find($ass_id);
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created assesor ".$assesors->ASname.".");
                request()->session()->flash("alert-success","Assesor added successfully.");
            }
            else{
                request()->session()->flash("alert-danger","Could not add assesor due to an error,try again later. We will fix it ASAP.");
            }

            return redirect('/assesor/show');
        }

    }

    public function show(){
        $assesors=Assesor::all();
        //dd($assesors);
        return view('maintenance.assesor.show')->with(compact('assesors'));
    }

    public function showEdit($id){
        $assesor=Assesor::findorfail($id);
        //dd($subsector);
        return view('maintenance.assesor.edit')->with(compact('assesor'));
    }

    public function edit(){

        $this->validate(request(),[

            'assesor_code'=>'required',
            'assesor_name'=>'required',
            'assesor_description'=>'required'
        ]);

        if(DB::table('assesors')
            ->where('AScode',request('assesor_code'))
            ->update([
                'ASname'=>request('assesor_name'),
                'ASdesc'=>request('assesor_description')
            ])){
            $ass=Assesor::where('AScode',request('assesor_code'))->get();
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Updated assesor ".$ass[0]->ASname.".");
            request()->session()->flash("alert-success","Updated successfully");
        } else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }
        return redirect('/assesor/show');
    }

    public function delete($id){
        $ass=Assesor::find($id);
        $ass_name=$ass->ASname;
        if(DB::table('assesors')
            ->where('id',$id)
            ->delete()){
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Deleted assesor ".$ass_name.".");
            request()->session()->flash("alert-success","Deleted assesor successfully!");
        }else{
            request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
        }
        return redirect('/assesor/show');
    }
}
