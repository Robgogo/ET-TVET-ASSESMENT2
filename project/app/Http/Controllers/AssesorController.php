<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Assesor;

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
        $assesor->AScode=request('assesor_code');
        $assesor->ASname=request('assesor_name');
        $assesor->ASdesc=request('assesor_description');
        $assesor->save();
        //dd(request()->all());

    	return redirect('/assesor/show');
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

        DB::table('assesors')
            ->where('AScode',request('assesor_code'))
            ->update([
                'ASname'=>request('assesor_name'),
                'ASdesc'=>request('assesor_description')
            ]);
        return redirect('/assesor/show');
    }

    public function delete($id){
        DB::table('assesors')
            ->where('id',$id)
            ->delete();
        return redirect('/assesor/show');
    }
}
