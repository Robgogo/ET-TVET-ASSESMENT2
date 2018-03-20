<?php

namespace App\Http\Controllers;

use App\CreatedPackageInfo;
use App\Package;
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

            'subsector_code'=>'required',

            'os_code'=>'required',

            'level_code'=>'required',

            'region_code'=>'required',

            'package_code'=>'required'
        ]);
        $open_pack_no=request('opackno');
        $created_pack_no=request('package_code');

        $att=DB::table('create_packages')
            ->where('package_code',$created_pack_no)
            ->first();
        $created_package_id=$att->id;
        $created_by=$att->creatd_by;
        $date=$att->created_at;

        $cpack_no=$att->cpack_no;


        //$val=CreatedPackageInfo::get()->where('created_package_id',$created_package_id);
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
        //dd($val);
        return view('transactions.open_package.open_package')->with(compact('cpack_no','created_by','date','val','created_package_id'));

    }

    public function download($created_package_id){
        $val=DB::table('created_package_infos')
            ->where('id',$created_package_id)
            ->first();
        $path = storage_path().'/'.'app'.'/'.$val->file_dir;
        if (file_exists($path)) {
            return response()->download($path);
        }
        else
            return "File Not found";
    }

    public function getSectorName($id){
        $sector=Sector::get()->where('Sectorcode',$id);
        return response()->json($sector);
    }

    public function getSubsectorName($id){
        $subsector=Subsector::get()->where('Subsectorcode',$id);
        return response()->json($subsector);
    }

    public function getOsName($id){
        $os=OccupationalStandard::get()->where('OScode',$id);
        return response()->json($os);
    }

    public function getLevelName($id){
        $level=Level::get()->where('Levelcode',$id);
        return response()->json($level);
    }

    public function getRegionName($id){
        $region=Region::get()->where('Regioncode',$id);
        return response()->json($region);
    }

    public function getPackageName($id){
        $package=Package::get()->where('package_code',$id);
        return response()->json($package);
    }
}
