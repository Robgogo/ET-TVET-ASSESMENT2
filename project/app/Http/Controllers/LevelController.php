<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Level;

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

        $level->Levelcode=request('level_code');
        $level->Levelname=request('level_name');
        $level->Leveldesc=request('level_description');
        $level->save();
        //dd(request()->all());

    	return redirect('/level/show');
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

        DB::table('levels')
            ->where('Levelcode',request('level_code'))
            ->update([
                'Levelname'=>request('level_name'),
                'Leveldesc'=>request('level_description')
            ]);
        return redirect('/level/show');
    }

    public function delete($id){
        DB::table('levels')
            ->where('id',$id)
            ->delete();
        return redirect('/os/show');
    }
}
