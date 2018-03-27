<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\OccupationalStandard;

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

        $os->OScode=request('os_code');
        $os->OSname=request('os_name');
        $os->OSdesc=request('os_description');
        $os->save();
        //dd(request()->all());

    	return redirect('/os/show');
    }

    public function show(){
        $occupationalStandards=OccupationalStandard::all();
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

        DB::table('occupational_standards')
            ->where('OScode',request('os_code'))
            ->update([
                'OSname'=>request('os_name'),
                'OSdesc'=>request('os_description')
            ]);
        return redirect('/os/show');
    }

    public function delete($id){
        DB::table('occupational_standards')
            ->where('id',$id)
            ->delete();
        return redirect('/os/show');
    }
}
