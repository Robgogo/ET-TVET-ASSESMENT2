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
use App\Package;
use App\User;
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

        $ppack=Approve::where('app_pack_no',request('approve_packno'))->get();
        if(!$ppack->isEmpty()){
            request()->session()->flash("alert-danger","A package with this package no already exists,try again with different input!");
            return redirect('/approve_package/show');
        }
        else {
            $approve_pack_no = request('approve_packno');
            $posted_pack_no = request('post_package_no');

            $att = DB::table('post_packages')
                ->where('post_pack_no', $posted_pack_no)->where('sector_code', request('sector_code'))
                ->where('subsector_code', request('subsector_code'))->where('os_code', request('os_code'))
                ->where('level_code', request('level_code'))
                ->get();
            if (!$att->isEmpty()) {
                $posted_by = $att[0]->created_by;
                $date = $att[0]->created_at;
                $posted_pack_id = $att[0]->id;

                $val = DB::table('post_package_infos')
                    ->where('post_package_id', $posted_pack_id)
                    ->get();
                $open_packages = DB::table('open_packages')
                    ->where('id', $att[0]->opened_package_id)
                    ->get();

                $items = DB::table('created_package_infos')
                    ->where('created_package_id', $open_packages[0]->created_package_id)
                    ->get();

                $approve_pack->app_pack_no = $approve_pack_no;
                $approve_pack->post_package_id = $posted_pack_id;
                $approve_pack->approved_by = request('approved_by');
                $approve_pack->sector_code = request('sector_code');
                $approve_pack->subsector_code = request('subsector_code');
                $approve_pack->os_code = request('os_code');
                $approve_pack->level_code = request('level_code');
                $approve_pack->region_code = request('region_code');
                $approve_pack->approval_status = "not approved";
                $approve_pack->save();
            } else {
                $date = '- - -';
                $opened_by = "No One";
                $items = $att;
                $val = $att;
            }

            return view('transactions.approval.approve')->with(compact('posted_pack_no', 'date', 'posted_by', 'val', 'items'));
        }
    }

    public function storeStat(){

        $app=Approve::all()->last();
        if(null!==request('approve')){
            
            if(DB::table('approves')
                ->where('id',$app->id)
                ->update([
                    'approval_status'=>'approved'
                ])){

                ApprovedDocumentsController::store2($app);

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
            $post=PostPackage::where('id',$app->post_package_id)->get();
            $user=User::where('user_name',$post[0]->created_by)->get();
            $user_id=$user[0]->id;
            //request()->session()->flash("alert-danger","Disapproved the package");
            return view('transactions.approval.dissaprove')->with(compact('user_id'));
        }
    }

    public function disapprove(){
        //code to send mail and notifs with comment
        $from=Auth::user()->user_name;
        $notification=request('comment');
        $user_id=request('id');
        $user=User::where('id',$user_id)->get();
        $count=$user[0]->new_notif_count;
        $count++;
        DB::table('users')->where('id',$user_id)->update(['new_notif_count'=>$count]);
        if(NotificationsController::notify($notification,$user_id,$from)){
            request()->session()->flash("alert-danger","Disapproved the package");
        }
        else{
            request()->session()->flash("alert-danger","Diss approved package ,but Failed to notify the user,Please try notifying");
        }
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
            return response()->file($path);
            //return response()->download($path);
        }
        else
            return "File Not found";
    }

    public function getPackageName($id){
        $post_package=PostPackage::where('post_pack_no',$id)->get();
        $opened_package_id=$post_package[0]->opened_package_id;
        $opened_package=OpenPackage::where('id',$opened_package_id)->get();
        $created_package_id=$opened_package[0]->created_package_id;
        $created_package=CreatePackage::where('id',$created_package_id)->get();
        $package_code=$created_package[0]->package_code;
        $package=Package::where('Packagecode',$package_code)->get();
        // dd(response()->json($package));
        return response()->json($package);
    }

    public function show(){
        $approved=Approve::orderBy('id','desc')->paginate(20);

        return view("transactions.approval.show")->with(compact("approved"));
    }
}
