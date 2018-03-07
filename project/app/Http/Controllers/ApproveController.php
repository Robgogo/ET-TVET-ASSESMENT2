<?php

namespace App\Http\Controllers;

use App\Approve;
use Illuminate\Http\Request;
use App\Sector;
use App\Subsector;
use App\OccupationalStandard;
use App\Level;
use App\Region;
use App\OpenPackage;
use App\PostPackage;
use Illuminate\Support\Facades\DB;

class ApproveController extends Controller
{
    public function index(){

        $sector=Sector::all();
        $subsector=Subsector::all();
        $os=OccupationalStandard::all();
        $level=Level::all();
        $region=Region::all();
        $post_package=PostPackage::all();

        return view('transactions.approval.aprroval_filter')->with(compact('sector','subsector','os','level','region','post_package'));
    }

    public function store(){

        $approve_pack=new Approve;

        $this->validate(request(),[
            'approve_packno'=>'required',
            'date'=>'required',
            'approved_by'=>'required',
            'sector_code'=>'required',

            'subsector_code'=>'required',

            'os_code'=>'required',

            'level_code'=>'required',

            'region_code'=>'required',

            'post_package_no'=>'required'
        ]);

        $approve_pack_no=request('approve_packno');
        $posted_pack_no=request('post_package_no');

        $att=DB::table('post_packages')
                ->where('post_pack_no',$posted_pack_no)
                ->get();
        $posted_by=$att[0]->created_by;
        $date=$att[0]->created_at;
        $posted_pack_id=$att[0]->id;

        $val=DB::table('post_package_infos')
                ->where('post_package_id',$posted_pack_id)
                ->get();
        $open_packages=DB::table('open_packages')
                        ->where('id',$att[0]->opened_package_id)
                        ->get();

        $items=DB::table('created_package_infos')
            ->where('created_package_id',$open_packages[0]->created_package_id)
            ->get();

        $approve_pack->app_pack_no=$approve_pack_no;
        $approve_pack->post_package_id=$posted_pack_id;
        $approve_pack->approved_by=request('approved_by');
        $approve_pack->sector_code=request('sector_code');
        $approve_pack->subsector_code=request('subsector_code');
        $approve_pack->os_code=request('os_code');
        $approve_pack->level_code=request('level_code');
        $approve_pack->region_code=request('region_code');
        $approve_pack->approval_status="not approved";
        $approve_pack->save();

        return view('transactions.approval.approve_package')->with(compact('posted_pack_no','date','posted_by','val','items'));


    }
}
