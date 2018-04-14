<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Level;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function index(){
    	return view('maintenance.level.level');
    }

    public function store(){
    	$level=new Level;

        $this->validate(request(),[

            'level_code'=>'required',
            'level_name'=>'required',
            'level_description'=>'required'
        ]);

        $lev=Level::where("Levelcode",request('level_code'))->get();
        if(!$lev->isEmpty()){
            request()->session()->flash("alert-danger","Level with this level code exists,try again with different input!");
            return redirect('/level/show');
        }
        else{
            $level->Levelcode=request('level_code');
            $level->Levelname=request('level_name');
            $level->Leveldesc=request('level_description');

            if($level->save()){
                $lev_id=$level->id;
                $levs=Level::find($lev_id);
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created package ".$levs->Levelname.".");
                request()->session()->flash("alert-success","Package added successfully.");
            }
            else{
                request()->session()->flash("alert-danger","Could not add Level due to an error,try again later. We will fix it ASAP.");
            }

            return redirect('/level/show');
        }

    }

    public function show(){
        $levels=Level::all();
        //dd($levels);
        return view('maintenance.level.show')->with(compact('levels'));
    }

    public function showEdit($id){
        $level=Level::findorfail($id);
        //dd($subsector);
        return view('maintenance.level.edit')->with(compact('level'));
    }

    public function edit(){
        $this->validate(request(),[

            'level_code'=>'required',
            'level_name'=>'required',
            'level_description'=>'required'
        ]);

        if(DB::table('levels')
            ->where('Levelcode',request('level_code'))
            ->update([
                'Levelname'=>request('level_name'),
                'Leveldesc'=>request('level_description')
            ])){
            $level=Level::where("Levelcode",request('level_code'))->get();
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Updated sector ".$level[0]->Levelname.".");
            request()->session()->flash("alert-success","Updated successfully");
        }
        else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }

        return redirect('/level/show');
    }

    public function delete($id){
        $level=Level::find($id);
        $level_name=$level->Levelname;
        if(DB::table('levels')->where('id',$id)->delete()){
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Deleted level ".$level_name.".");
            request()->session()->flash("alert-success","Deleted level successfully!");
        } else{
            request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
        }

        return redirect('/level/show');
    }
}
