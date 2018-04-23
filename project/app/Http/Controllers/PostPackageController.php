<?php

namespace App\Http\Controllers;

use App\CreatePackage;
use App\Package;
use Illuminate\Http\Request;
use App\Sector;
use App\Subsector;
use App\OccupationalStandard;
use App\Level;
use App\Region;
use App\OpenPackage;
use App\PostPackage;
use DB;
use Illuminate\Support\Facades\Auth;

class PostPackageController extends Controller
{
    public function index(){
        $sector=Sector::all();
        $subsector=Subsector::all();
        $os=OccupationalStandard::all();
        $level=Level::all();
        $region=Region::all();
        $open_package=OpenPackage::all();

        return view('transactions.post_package.post_package_filter')->with(compact('sector','subsector','os','level','region','open_package'));
    }

    public function store(){

        $post_pack=new PostPackage;

        $this->validate(request(),[
            'postpackno'=>'required',
            'date'=>'required',
            'posted_by'=>'required',
            'sector_code'=>'required',

            'subsector_code'=>'required',

            'os_code'=>'required',

            'level_code'=>'required',

            'region_code'=>'required',

            'open_package_no'=>'required'
        ]);

        $ppack=PostPackage::where('post_pack_no',request('postpackno'))->get();
        if(!$ppack->isEmpty()){
            request()->session()->flash("alert-danger","Ap post package with this package no already exists,try again with different input!");
            return redirect('/post_package/show');
        }
        else{
            $post_pack_no=request('postpackno');
            $opened_pack_no=request('open_package_no');
            $att=DB::table('open_packages')
                ->where('open_pack_no',$opened_pack_no)
                ->get();
            //dd($att);
            $opened_by=$att[0]->opened_by;
            $date=$att[0]->created_at;
            $opened_pack_id=$att[0]->id;


            $val=DB::table('opened_package_infos')
                ->where('open_package_id',$opened_pack_id)
                ->get();

            $items=DB::table('created_package_infos')
                ->where('created_package_id',$att[0]->created_package_id)
                ->get();

            $post_pack->post_pack_no=$post_pack_no;
            $post_pack->opened_package_id=$opened_pack_id;
            $post_pack->created_by=request('posted_by');
            $post_pack->sector_code=request('sector_code');
            $post_pack->subsector_code=request('subsector_code');
            $post_pack->os_code=request('os_code');
            $post_pack->level_code=request('level_code');
            $post_pack->region_code=request('region_code');
            $post_pack->save();


            return view('transactions.post_package.post_package')->with(compact('opened_pack_no','date','opened_by','val','items'));
        }

    }

    public function download($opened_package_id){
        $val=DB::table('opened_package_infos')
            ->where('id',$opened_package_id)
            ->first();
        $path = storage_path().'/'.'app'.'/'.$val->opened_items_dir;
        if (file_exists($path)) {
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Downloaded post package files for post package number of ".
                OpenPackage::where('id',$opened_package_id)->get()->pluck("open_pack_no").".");
            return response()->file($path);
        }
        else
            return "File Not found";
    }

    public function getPackageName($id){
        $open_package=OpenPackage::get()->where('open_pack_no',$id);
        $created_package_id=$open_package->pluck('id');
        $created_package=CreatePackage::get()->where('id',$created_package_id[0]);
        $package_code=$created_package->pluck('package_code');
        $package=Package::get()->where('Packagecode',$package_code[0]);
        return response()->json($package);
    }

    public function show(){
        $posted=PostPackage::all();

        return view("transactions.post_package.show")->with(compact("posted"));
    }
}
