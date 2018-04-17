<?php

namespace App\Http\Controllers;

use App\Approve;
use App\CreatePackage;
use Illuminate\Http\Request;
use App\Sector;
use App\Subsector;
use App\OccupationalStandard;
use App\Level;
use App\Region;
use App\OpenPackage;
use App\PostPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function storeStat(){

        if(null!==request('approve')){
            $app=Approve::all()->last();
            if(DB::table('approves')
                ->where('id',$app->id)
                ->update([
                    'approval_status'=>'approved'
                ])){

                ApprovedDocumentsController::store($app);

                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Approved package ".$app->app_pack_no.".");
                request()->session()->flash("alert-success","Approved Package");
            }
            else{
                request()->session()->flash("alert-danger","An error occured while trying to approve,try again later.");
            }

            return redirect('/approve_package/show');
        }
        else{
            //request()->session()->flash("alert-danger","Disapproved the package");
            return view('transactions.approval.dissaprove');
        }
    }

    public function disapprove(){
        //code to send mail and notifs with comment
        request()->session()->flash("alert-danger","Disapproved the package");
        return redirect('/approve_package/show');
    }

    public function download($post_package_id){
        $val=DB::table('post_package_infos')
            ->where('id',$post_package_id)
            ->first();
        $path = storage_path().'/'.'app'.'/'.$val->post_items_dir;
        if (file_exists($path)) {
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Downloaded post package files for post package number of ".
                PostPackage::where('id',$post_package_id)->get()->pluck("post_pack_no").".");
            return response()->download($path);
        }
        else
            return "File Not found";
    }

    public function getPackageName($id){
        $post_package=PostPackage::get()->where('post_pack_no',$id);
        $opened_package_id=$post_package->pluck('id');
        $opened_package=OpenPackage::get()->where('id',$opened_package_id[0]);
        $created_package_id=$opened_package->pluck('id');
        $created_package=CreatePackage::get()->where('id',$created_package_id[0]);
        $package_code=$created_package->pluck('package_code');
        $package=Package::get()->where('Packagecode',$package_code[0]);
        return response()->json($package);
    }

    public function show(){
        $approved=Approve::all();

        return view("transactions.approval.show")->with(compact("approved"));
    }
}
