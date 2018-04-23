<?php

namespace App\Http\Controllers;

use App\Approve;
use App\AssessorInfo;
use App\Level;
use App\OccupationalStandard;
use App\Region;
use App\Sector;
use App\Subsector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessorInfoController extends Controller
{
    public function index(){
        $sector=Sector::all();
        $sub_sector=Subsector::all();
        $os=OccupationalStandard::all();
        $level=Level::all();
        $region=Region::all();
        $package=Approve::all();

        return view('transactions.assessor_info.assessor_info')->with(compact('sector','sub_sector','os','level','region','package'));
    }

    public function show(){
        $assessor=AssessorInfo::all();
        $total=[];
        $i=0;
        foreach($assessor as $field){
            $total[$i]=$field->male_comp + $field->female_comp + $field->male_inc + $field->female_inc;
            $i++;
        }

        return view('transactions.assessor_info.show')->with(compact('assessor','total'));
    }

    public function getSubsector($id){
        $sector=Sector::where('Sectorcode',$id)->get();
        $subsector=Subsector::where('sector_id',$sector[0]->id)->get();
        //dd(response()->json(["subsector"=>$subsector,"sector"=>$sector]));
        return response()->json(["subsector"=>$subsector,"sector"=>$sector]);
    }

    public function store(){
        $this->validate(request(),[
            'ass_pack_no'=>'required',
            'created_by'=>'required',
            'exam_date'=>'required',
            'app_pack_no'=>'required',
            'sector'=>'required',
            'sub_sector'=>'required',
            'os'=>'required',
            'level'=>'required',
            'region'=>'required',
            'fname1'=>'required',
            'mname1'=>'required',
            'lname1'=>'required',
            'com_fem1'=>'required',
            'com_male1'=>'required',
            'incomp_fem1'=>'required',
            'incomp_male1'=>'required',
            'fname2'=>'required',
            'mname2'=>'required',
            'lname2'=>'required',
            'com_fem2'=>'required',
            'com_male2'=>'required',
            'incomp_fem2'=>'required',
            'incomp_male2'=>'required',
            'fname3'=>'required',
            'mname3'=>'required',
            'lname3'=>'required',
            'com_fem3'=>'required',
            'com_male3'=>'required',
            'incomp_fem3'=>'required',
            'incomp_male3'=>'required',
            'fname4'=>'required',
            'mname4'=>'required',
            'lname4'=>'required',
            'com_fem4'=>'required',
            'com_male4'=>'required',
            'incomp_fem4'=>'required',
            'incomp_male4'=>'required',
            'fname5'=>'required',
            'mname5'=>'required',
            'lname5'=>'required',
            'com_fem5'=>'required',
            'com_male5'=>'required',
            'incomp_fem5'=>'required',
            'incomp_male5'=>'required'
        ]);

        $ass_info=new AssessorInfo;
        $ass_info2=new AssessorInfo;
        $ass_info3=new AssessorInfo;
        $ass_info4=new AssessorInfo;
        $ass_info5=new AssessorInfo;

        if(!AssessorInfo::where('ass_pack_no',request('ass_pack_no'))->get()->isEmpty()){
            request()->session()->flash("alert-danger","A package with this package no already exists,try again with different input!");
            return redirect('/assessor_info/show');
        }
        else{
            $ass_info->ass_pack_no=request('ass_pack_no');
            $ass_info->full_name=request('fname1')." ".request('mname1')." ".request('lname1');
            $ass_info->created_by=request('created_by');
            $ass_info->date_of_exam=request('exam_date');
            $ass_info->app_pack_no=request('app_pack_no');
            $ass_info->sector=request('sector');
            $ass_info->sub_sector=request('sub_sector');
            $ass_info->os=request('os');
            $ass_info->level=request('level');
            $ass_info->region=request('region');
            $ass_info->male_comp=request('com_male1');
            $ass_info->female_comp=request('com_fem1');
            $ass_info->male_inc=request('incomp_male1');
            $ass_info->female_inc=request('incomp_fem1');


            $ass_info2->ass_pack_no=request('ass_pack_no');
            $ass_info2->full_name=request('fname2')." ".request('mname2')." ".request('lname2');
            $ass_info2->created_by=request('created_by');
            $ass_info2->date_of_exam=request('exam_date');
            $ass_info2->app_pack_no=request('app_pack_no');
            $ass_info2->sector=request('sector');
            $ass_info2->sub_sector=request('sub_sector');
            $ass_info2->os=request('os');
            $ass_info2->level=request('level');
            $ass_info2->region=request('region');
            $ass_info2->male_comp=request('com_male2');
            $ass_info2->female_comp=request('com_fem2');
            $ass_info2->male_inc=request('incomp_male2');
            $ass_info2->female_inc=request('incomp_fem2');

            $ass_info3->ass_pack_no=request('ass_pack_no');
            $ass_info3->full_name=request('fname3')." ".request('mname3')." ".request('lname3');
            $ass_info3->created_by=request('created_by');
            $ass_info3->date_of_exam=request('exam_date');
            $ass_info3->app_pack_no=request('app_pack_no');
            $ass_info3->sector=request('sector');
            $ass_info3->sub_sector=request('sub_sector');
            $ass_info3->os=request('os');
            $ass_info3->level=request('level');
            $ass_info3->region=request('region');
            $ass_info3->male_comp=request('com_male3');
            $ass_info3->female_comp=request('com_fem3');
            $ass_info3->male_inc=request('incomp_male3');
            $ass_info3->female_inc=request('incomp_fem3');

            $ass_info4->ass_pack_no=request('ass_pack_no');
            $ass_info4->full_name=request('fname4')." ".request('mname4')." ".request('lname4');
            $ass_info4->created_by=request('created_by');
            $ass_info4->date_of_exam=request('exam_date');
            $ass_info4->app_pack_no=request('app_pack_no');
            $ass_info4->sector=request('sector');
            $ass_info4->sub_sector=request('sub_sector');
            $ass_info4->os=request('os');
            $ass_info4->level=request('level');
            $ass_info4->region=request('region');
            $ass_info4->male_comp=request('com_male4');
            $ass_info4->female_comp=request('com_fem4');
            $ass_info4->male_inc=request('incomp_male4');
            $ass_info4->female_inc=request('incomp_fem4');

            $ass_info5->ass_pack_no=request('ass_pack_no');
            $ass_info5->full_name=request('fname5')." ".request('mname5')." ".request('lname5');
            $ass_info5->created_by=request('created_by');
            $ass_info5->date_of_exam=request('exam_date');
            $ass_info5->app_pack_no=request('app_pack_no');
            $ass_info5->sector=request('sector');
            $ass_info5->sub_sector=request('sub_sector');
            $ass_info5->os=request('os');
            $ass_info5->level=request('level');
            $ass_info5->region=request('region');
            $ass_info5->male_comp=request('com_male5');
            $ass_info5->female_comp=request('com_fem5');
            $ass_info5->male_inc=request('incomp_male5');
            $ass_info5->female_inc=request('incomp_fem5');


            if($ass_info->save() && $ass_info2->save() && $ass_info3->save() &&$ass_info4->save() && $ass_info5->save()){
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created assessor info.");
                request()->session()->flash("alert-success","Assessor info created successfully.");
            }
            else{
                request()->session()->flash("alert-danger","Could not create assessor info due to an error,try again later. We will fix it ASAP.");
            }
        }

        return redirect('/assessor_info/show');
    }

    public function getAppPack($id){
        $app=Approve::where('app_pack_no',$id)->get();
        //dd(response()->json($app));
        return response()->json($app);
    }

}
