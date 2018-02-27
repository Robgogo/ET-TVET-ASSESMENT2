<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Region;
use App\Sector;
use App\Subsector;
use App\OccupationalStandard;
use App\CreatePackage;
use App\OpenPackage;
use DB;

class OpenPackageController extends Controller
{
    public function index(){
        $level=Level::all();
        $region=Region::all();
        $os=OccupationalStandard::all();
        $subsector=Subsector::all();
        $sector=Sector::all();
        $package=CreatePackage::all();

        return view('transactions.open_package.open_package_filter')->with(compact('sector','subsector','os','level','region','package'));
    }

    public function store(){
        $open_pack=new OpenPackage;

        $this->validate(request(),[
            'opackno'=>'required',
            'date'=>'required',
            'opened_by'=>'required',
            'sector_code'=>'required',
            'sector_name'=>'required',
            'subsector_code'=>'required',
            'subsector_name'=>'required',
            'os_code'=>'required',
            'os_name'=>'required',
            'level_code'=>'required',
            'level_name'=>'required',
            'region_code'=>'required',
            'region_name'=>'required',
            'package_code'=>'required'
        ]);
        $open_pack_no=request('package_code');

        $att=DB::table('create_packages')
            ->where('cpack_no',$open_pack_no)
            ->first();
        $created_package_id=$att->id;
        $date=$att->created_at;
        $by=$att->creatd_by;

        $val=DB::table('created_package_infos')
                ->where('created_package_id',$created_package_id)
                ->get();



        $open_pack->open_pack_no=$open_pack_no;
        $open_pack->opened_by=request('opened_by');
        $open_pack->created_package_id=$created_package_id;
        $open_pack->sector_code=request('sector_code');
        $open_pack->subsector_code=request('subsector_code');
        $open_pack->os_code=request('os_code');
        $open_pack->level_code=request('level_code');
        $open_pack->region_code=request('region_code');
        $open_pack->save();

        return view('transactions.open_package.open_package')->with(compact('open_pack_no','date','by','val'));
    }
}
