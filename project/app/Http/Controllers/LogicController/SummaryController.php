<?php

namespace App\Http\Controllers\LogicController;

use App\CreatePackage;
use App\MaintenancePermission;
use App\OpenPackage;
use App\Package;
use App\PostPackage;
use App\ReportPermission;
use App\TransactionPermission;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SummaryController extends Controller
{
    /**
     * Retrieve sector with given id
     * @param id sector code
     * @return list of sectors
     */
    public function getSector($id)
    {
        if ($id == "all") {
            return response()->json(["result" => \App\Sector::all()], 200);
        }
        else {
            return response()->json(
                ["result" => \App\Sector::where('Sectorcode' , $id)->get()], 200);
        }
    }

    /**
     * Retrieve Sub Sector with given id
     * @param id sub sector code
     * @return list of sub sectors
     */
    public function getSubSector($id)
    {
        if ($id == "all") {
            return response()->json(["result" => \App\SubSector::all()], 200);
        }
        else {
            return response()->json(
                ["result" => \App\SubSector::where('Subsectorcode' , $id)->get()], 200);
        }
    }

    /**
     * Retrieve Occupation Standard with given id
     * @param id occupation standard code
     * @return list of Occupation standards
     */
    public function getOccupationStd($id)
    {
        if ($id == "all") {
            return response()->json(["result" => \App\OccupationalStandard::all()], 200);
        }
        else {
            return response()->json(
                ["result" => \App\OccupationalStandard::where('OScode' , $id)->get()], 200);
        }
    }

    /**
     * Retrieve Levels with given id
     * @param id level code
     * @return list of level
     */
    public function getLevel($id)
    {
        if ($id == "all") {
            return response()->json(["result" => \App\Level::all()], 200);
        }
        else {
            return response()->json(
                ["result" => \App\Level::where('Levelcode' , $id)->get()], 200);
        }
    }

    /**
     * Retrieve Regions with given id
     * @param id Region code
     * @return list of region
     */
    public function getRegion($id)
    {
        if ($id == "all") {
            return response()->json(["result" => \App\Region::all()], 200);
        }
        else {
            return response()->json(
                ["result" => \App\Region::where('Regioncode' , $id)->get()], 200);
        }
    }

    /**
     * Retrieve Item Docs with given id
     * @param id item doc code
     * @return list of item
     */
    public function getItem($id)
    {
        if ($id == "all") {
            return response()->json(["result" => \App\ItemDoc::all()], 200);
        }
        else {
            return response()->json(
                ["result" => \App\ItemDoc::where('Itemcode' , $id)->get()], 200);
        }
    }

    /**
     * Retrieve Package with given id
     * @param id Package code
     * @return list of Package
     */
    public function getPackage($id)
    {
        if ($id == "all") {
            return response()->json(["result" => \App\Package::all()], 200);
        }
        else {
            return response()->json(
                ["result" => \App\Package::where('Packagecode' , $id)->get()], 200);
        }
    }

    /**
     * Retrieve Assessor with given id
     * @param id Assessor code
     * @return list of Assessor
     */
    public function getAssessor($id)
    {
        if ($id == "all") {
            return response()->json(["result" => \App\Assesor::all()], 200);
        }
        else {
            return response()->json(
                ["result" => \App\Assesor::where('Ascode' , $id)->get()], 200);
        }
    }

    /**
     * Retrieve Created Package with given id
     * @param id Created package code
     * @return list of Packages
     */
    public function getCreatedPackage($id, $date_from=NULL, $date_to=NULL)
    {
        $temp=[];
        if ($id == "all"){
            $packages = (is_null($date_from) && is_null($date_to)) ?
                \App\CreatePackage::all() :
                \App\CreatePackage::where('created_at', '>=', $date_from)
                    ->where('created_at', '<=', $date_to)->get();
            if($packages->isEmpty()){

                return response()->json(["result" => $temp ], 200);
            }
            $packs=[];
            for($i=0;$i<$packages->count();$i++){
                $packs[]=Package::where('Packagecode',$packages[$i]->package_code)->get();
            }
            //dd($packs);
        }
        else {
            $packages = (is_null($date_from)  && is_null($date_to)) ?
                \App\CreatePackage::where('cpack_no' , $id)->get() :
                \App\CreatePackage::where('created_at', '>=', $date_from)
                    ->where('created_at', '<=', $date_to)
                    ->where('cpack_no' , $id)->get();
            if($packages->isEmpty()){

                return response()->json(["result" => $temp ], 200);
            }
            $packs=Package::where('Packagecode',$packages->pluck('package_code'))->get();

        }
        //dd($packs);
        $items = [];
        foreach ($packages as $pack) 
        {
            $items[] = (\App\CreatePackage::find($pack->id)->info);
        }

        return response()->json(["result" => $packages, "items" => $items,"name"=>$packs], 200);
      
    }

    public function getOpenedPackage($id,$date_from=NULL,$date_to=NULL){
        $temp=[];
        if ($id == "all"){
            $packages = (is_null($date_from) && is_null($date_to)) ?
                \App\OpenPackage::all() :
                \App\OpenPackage::where('created_at', '>=', $date_from )
                    ->where('created_at','<=',$date_to)->get();
            //dd($packages);
            if($packages->isEmpty()){

                return response()->json(["result" => $temp ], 200);
            }
            $packs=[];
            for($i=0;$i<$packages->count();$i++){
                $packs[]=CreatePackage::where('id',$packages[$i]->created_package_id)->get();
            }
            //dd($packs);
        }
        else {
            $packages = (is_null($date_from) && is_null($date_to))?
                \App\OpenPackage::where('open_pack_no' , $id)->get() :
                \App\OpenPackage::where('created_at', '>=', $date_from)
                    ->where('created_at','<=',$date_to)
                    ->where('open_pack_no' , $id)->get();
            if($packages->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
            $packs=CreatePackage::where('id',$packages->pluck('created_package_id'))->get();
        }
         //dd(response()->json(["result" => $packages,"packs"=>$packs ], 200));

        return response()->json(["result" => $packages,"packs"=>$packs ], 200);
    }

    public function getPostedPackage($id,$date_from=NULL,$date_to=NULL){
        $temp=[];
        if ($id == "all"){
            $packages = (is_null($date_from) && is_null($date_to)) ?
                \App\PostPackage::all() :
                \App\PostPackage::where('created_at', '>=', $date_from )
                    ->where('created_at','<=',$date_to)->get();
            //dd($packages);
            if($packages->isEmpty()){

                return response()->json(["result" => $temp ], 200);
            }
            $open=[];
            $packs=[];
            for($i=0;$i<$packages->count();$i++){
                $open[]=OpenPackage::where('id',$packages[$i]->opened_package_id)->get();
            }
            //dd($open);
            for($i=0;$i<count($open);$i++){
                $packs[]=CreatePackage::where('id',$open[$i][0]->created_package_id)->get();
            }
        }
        else {
            $packages = (is_null($date_from) && is_null($date_to))?
                \App\PostPackage::where('post_pack_no' , $id)->get() :
                \App\PostPackage::where('created_at', '>=', $date_from)
                    ->where('created_at','<=',$date_to)
                    ->where('post_pack_no' , $id)->get();
            if($packages->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
            $open=OpenPackage::where('id',$packages->pluck('opened_package_id'))->get();
            $packs[]=CreatePackage::where('id',$open->pluck('created_package_id'))->get();
        }
        //dd(response()->json(["result" => $packages,"packs"=>$packs ], 200));

        return response()->json(["result" => $packages,"packs"=>$packs ], 200);
    }

    public function getApprovedPackage($id,$date_from=NULL,$date_to=NULL){
        $temp=[];
        if ($id == "all"){
            $packages = (is_null($date_from) && is_null($date_to)) ?
                \App\Approve::all() :
                \App\Approve::where('created_at', '>=', $date_from )
                    ->where('created_at','<=',$date_to)->get();
            //dd($packages);
            if($packages->isEmpty()){

                return response()->json(["result" => $temp ], 200);
            }
            $post=[];
            $open=[];
            $packs=[];
            for($i=0;$i<$packages->count();$i++){
                $post[]=PostPackage::where('id',$packages[$i]->post_package_id)->get();
            }
            for($i=0;$i<count($post);$i++){
                $open[]=OpenPackage::where('id',$post[$i][0]->opened_package_id)->get();
            }
            //dd($open);
            for($i=0;$i<count($open);$i++){
                $packs[]=CreatePackage::where('id',$open[$i][0]->created_package_id)->get();
            }
        }
        else {
            $packages = (is_null($date_from) && is_null($date_to))?
                \App\Approve::where('app_pack_no' , $id)->get() :
                \App\Approve::where('created_at', '>=', $date_from)
                    ->where('created_at','<=',$date_to)
                    ->where('app_pack_no' , $id)->get();
            if($packages->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
            $post=PostPackage::where('id',$packages->pluck('post_package_id'))->get();
            $open=OpenPackage::where('id',$post->pluck('opened_package_id'))->get();
            $packs[]=CreatePackage::where('id',$open->pluck('created_package_id'))->get();

        }
        //dd($packages);
        //dd(response()->json(["result" => $packages,"packs"=>$packs ], 200));

        return response()->json(["result" => $packages,"packs"=>$packs ], 200);
    }

    public function getUsers($id,$date_from=NULL,$date_to=NULL){
        $temp=[];
        if ($id == "all"){
            $users = (is_null($date_from) && is_null($date_to)) ?
                \App\EmployeeInfo::all() :
                \App\EmployeeInfo::where('created_at', '>=', $date_from )
                    ->where('created_at','<=',$date_to)->get();
            if($users->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
            $userInfo=[];
            for($i=0;$i<$users->count();$i++){
                $userInfo[]=User::where('employee_id',$users[$i]->employee_id)->get();
            }
        }
        else {
            $users = (is_null($date_from) && is_null($date_to))?
                \App\EmployeeInfo::where('employee_id' , $id)->get() :
                \App\EmployeeInfo::where('created_at', '>=', $date_from)
                    ->where('created_at','<=',$date_to)
                    ->where('employee_id' , $id)->get();
            if($users->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
            $userInfo[]=User::where('employee_id',$users->pluck('employee_id'))->get();
        }
        //dd($packages);
        //dd(response()->json(["result" => $users,"infos"=>$userInfo ], 200));

        return response()->json(["result" => $users ,"infos"=>$userInfo], 200);
    }

    public function getUserStat($id,$status=NULL){
        $temp=[];
        if ($id == "all"){
            $users = (is_null($status)) ?
                \App\EmployeeInfo::all() :
                \App\EmployeeInfo::where('status',$status)->get();
            if($users->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
        }
        else {
            $users = (is_null($status))?
                \App\EmployeeInfo::where('id' , $id)->get() :
                \App\EmployeeInfo::where('status',$status)
                    ->where('employee_id' , $id)->get();
            if($users->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
        }
        //dd($packages);
        //dd(response()->json(["result" => $users,"infos"=>$userInfo ], 200));

        return response()->json(["result" => $users ], 200);
    }

    public function getUserPermission($id){
        $temp=[];
        $maint=[];
        $tran=[];
        $rep=[];
        if($id=="all"){
            $users=\App\EmployeeInfo::all();
            if($users->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
            for($i=0;$i<$users->count();$i++){
                $maint[]=MaintenancePermission::where('employee_id',$users[$i]->id)->get();
                $tran[]=TransactionPermission::where('employee_id',$users[$i]->id)->get();
                $rep[]=ReportPermission::where('employee_id',$users[$i]->id)->get();
            }
        }
        else{

            $users=\App\EmployeeInfo::where('id' , $id)->get();
            if($users->isEmpty()){
                return response()->json(["result" => $temp ], 200);
            }
            $maint[]=MaintenancePermission::where('employee_id',$users[0]->id)->get();
            $tran[]=TransactionPermission::where('employee_id',$users[0]->id)->get();
            $rep[]=ReportPermission::where('employee_id',$users[0]->id)->get();
        }

        //dd(response()->json(["result"=>$users,"maintenance"=>$maint,"transaction"=>$tran,"report"=>$rep]));
        return response()->json(["result"=>$users,"maintenance"=>$maint,"transaction"=>$tran,"report"=>$rep]);
    }
    
}
