<?php

namespace App\Http\Controllers;

use App\MaintenancePermission;
use App\ReportPermission;
use App\TransactionPermission;
use App\User;
use App\UserControlPermission;
use Illuminate\Http\Request;
use App\EmployeeInfo;
use Illuminate\Support\Facades\DB;

class UserControlPermissionController extends Controller
{
    public function index(){
        $employee=EmployeeInfo::all();
        return view('admin.transactions.user_control_permission')->with(compact('employee'));
    }

    public function store(){
        $this->validate(request(),[
            'permission_no'=>'required',
            'employee_id'=>'required',
            'create_package_permission'=>'required',
            'open_package_permission'=>'required',
            'post_package_permission'=>'required',
            'approve_package_permission'=>'required',
            'assesor_info_permission'=>'required',
            'sector_permission'=>'required',
            'subsector_permission'=>'required',
            'os_permission'=>'required',
            'level_permission'=>'required',
            'region_permission'=>'required',
            'itemdoc_permission'=>'required',
            'package_permission'=>'required',
            'assesor_permission'=>'required',
            'sector_summary_permission'=>'required',
            'subsector_summary_permission'=>'required',
            'os_summary_permission'=>'required',
            'level_summary_permission'=>'required',
            'region_summary_permission'=>'required',
            'itemdoc_summary_permission'=>'required',
            'package_summary_permission'=>'required',
            'assesor_summary_permission'=>'required',
            'create_package_summary_permission'=>'required',
            'open_package_summary_permission'=>'required',
            'post_package_summary_permission'=>'required',
            'approve_package_summary_permission'=>'required',
            'assesor_info_summary_permission'=>'required'
        ]);
        $perm=UserControlpermission::where('employee_id',request('employee_id'))->get();
        if($perm->isEmpty()){
            $maintenance_permission=new MaintenancePermission;
            $transaction_permission=new TransactionPermission;
            $reports_permission=new ReportPermission;
            $user_permissions=new UserControlPermission;

            $maintenance_permission->employee_id=request('employee_id');
            $maintenance_permission->sector=request('sector_permission');
            $maintenance_permission->sub_sector=request('subsector_permission');
            $maintenance_permission->os=request('os_permission');
            $maintenance_permission->level=request('level_permission');
            $maintenance_permission->region=request('region_permission');
            $maintenance_permission->item_doc=request('itemdoc_permission');
            $maintenance_permission->package=request('package_permission');
            $maintenance_permission->assesor=request('assesor_permission');
            $maintenance_permission->save();
            $maintenace=$maintenance_permission->id;

            $transaction_permission->employee_id=request('employee_id');
            $transaction_permission->create_package=request('create_package_permission');
            $transaction_permission->open_package=request('open_package_permission');
            $transaction_permission->post_package=request('post_package_permission');
            $transaction_permission->approve_package=request('approve_package_permission');
            $transaction_permission->assesor_info=request('assesor_info_permission');
            $transaction_permission->save();
            $transaction=$transaction_permission->id;

            $reports_permission->employee_id=request('employee_id');
            $reports_permission->sector_summary=request('sector_summary_permission');
            $reports_permission->sub_sector_summary=request('subsector_summary_permission');
            $reports_permission->os_summary=request('os_summary_permission');
            $reports_permission->level_summary=request('level_summary_permission');
            $reports_permission->region_summary=request('region_summary_permission');
            $reports_permission->item_doc_summary=request('itemdoc_summary_permission');
            $reports_permission->package_summary=request('package_summary_permission');
            $reports_permission->assesor_summary=request('assesor_summary_permission');
            $reports_permission->created_packages_summary=request('create_package_summary_permission');
            $reports_permission->open_packages_summary=request('open_package_summary_permission');
            $reports_permission->post_packages_summary=request('post_package_summary_permission');
            $reports_permission->approve_package_summary=request('approve_package_summary_permission');
            $reports_permission->assesor_info_summary=request('assesor_info_summary_permission');
            $reports_permission->save();
            $report=$reports_permission->id;


            $user_permissions->permission_no=request('permission_no');
            $user_permissions->employee_id=request('employee_id');
            $user_permissions->maintenance_permission_id=$maintenace;
            $user_permissions->transaction_permission_id=$transaction;
            $user_permissions->report_permission_id=$report;
            $user_permissions->save();
        }
        else{
            DB::table('maintenance_permissions')->where('employee_id',request('employee_id'))
                ->update([
                    "sector"=>request('sector_permission'),
                    "sub_sector"=>request('subsector_permission'),
                    "os"=>request('os_permission'),
                    "level"=>request('level_permission'),
                    "region"=>request('region_permission'),
                    "item_doc"=>request('itemdoc_permission'),
                    "package"=>request('package_permission'),
                    "assesor"=>request('assesor_permission')
                ]);

            DB::table('transaction_permissions')->where('employee_id',request('employee_id'))
                ->update([
                    "create_package"=>request('create_package_permission'),
                    "open_package"=>request('open_package_permission'),
                    "post_package"=>request('post_package_permission'),
                    "approve_package"=>request('approve_package_permission'),
                    "assesor_info"=>request('assesor_info_permission')
            ]);

            DB::table('report_permissions')->where('employee_id',request('employee_id'))
                ->update([
                    "sector_summary"=>request('sector_summary_permission'),
                    "sub_sector_summary"=>request('subsector_summary_permission'),
                    "os_summary"=>request('os_summary_permission'),
                    "level_summary"=>request('level_summary_permission'),
                    "region_summary"=>request('region_summary_permission'),
                    "item_doc_summary"=>request('itemdoc_summary_permission'),
                    "package_summary"=>request('package_summary_permission'),
                    "assesor_summary"=>request('assesor_summary_permission'),
                    "created_packages_summary"=>request('create_package_summary_permission'),
                    "open_packages_summary"=>request('open_package_summary_permission'),
                    "post_packages_summary"=>request('post_package_summary_permission'),
                    "approve_package_summary"=>request('approve_package_summary_permission'),
                    "assesor_info_summary"=>request('assesor_info_summary_permission')
                ]);
        }
        return redirect('/');
    }


    public static function permissions(User $user){
        $emp_id=$user->employee_id;
        $emp=DB::table('employee_infos')
            ->where('employee_id',$emp_id)
            ->get();
        $id=$emp[0]->id;
        $permission=DB::table('user_control_permissions')
            ->where('employee_id',$id)
            ->get();
        return $permission;
    }

    public static function maintenancePermissions(User $user){
        $permission=UserControlPermissionController::permissions($user);
        $maintenance_id=$permission[0]->maintenance_permission_id;
        $maintenance=DB::table('maintenance_permissions')
            ->where('id',$maintenance_id)
            ->get();
        return $maintenance;
    }

    public static function transactionPermissions(User $user){
        $permission=UserControlPermissionController::permissions($user);
        $transaction_id=$permission[0]->transaction_permission_id;
        $transaction=DB::table('transaction_permissions')
                    ->where('id',$transaction_id)
                    ->get();
        return $transaction;
    }

   public static function reportPermissions(User $user){
       $permission=UserControlPermissionController::permissions($user);
       $report_id=$permission[0]->transaction_permission_id;
       $report=DB::table('report_permissions')
           ->where('id',$report_id)
           ->get();
       return $report;
   }

    public static function hasSectorPermission(User $user){

        $maintenance=UserControlPermissionController::maintenancePermissions($user);

        if($maintenance[0]->sector=="all" || $maintenance[0]->sector=="write" ){
            return true;
        }
        else
            return false;
    }

    public static function hasSubsectorPermission(User $user){
        $maintenance=UserControlPermissionController::maintenancePermissions($user);

        if($maintenance[0]->sub_sector=="all" || $maintenance[0]->sub_sector=="write"){
            return true;
        }
        else
            return false;
    }

    public static function hasRegionPermission(User $user){
        $maintenance=UserControlPermissionController::maintenancePermissions($user);

        if($maintenance[0]->region=="all" || $maintenance[0]->region=="write"){
            return true;
        }
        else
            return false;
    }

    public static function hasPackagePermission(User $user){
        $maintenance=UserControlPermissionController::maintenancePermissions($user);

        if($maintenance[0]->package=="all" || $maintenance[0]->package=="write"){
            return true;
        }
        else
            return false;
    }

    public static function hasOsPermission(User $user){
        $maintenance=UserControlPermissionController::maintenancePermissions($user);

        if($maintenance[0]->os=="all" || $maintenance[0]->os=="write"){
            return true;
        }
        else
            return false;
    }

    public static function hasLevelPermission(User $user){
        $maintenance=UserControlPermissionController::maintenancePermissions($user);

        if($maintenance[0]->level=="all" || $maintenance[0]->level=="write") {
            return true;
        }
        else
            return false;
    }

    public static function hasItemPermission(User $user){
        $maintenance=UserControlPermissionController::maintenancePermissions($user);

        if($maintenance[0]->item_doc=="all" || $maintenance[0]->item_doc=="write"){
            return true;
        }
        else
            return false;
    }

    public static function hasAssesorPermission(User $user){
        $maintenance=UserControlPermissionController::maintenancePermissions($user);

        if($maintenance[0]->assesor=="all" || $maintenance[0]->assesor=="write") {
            return true;
        }
        else
            return false;
    }

    public static function hasCreatePackagePermission(User $user){
        $transaction=UserControlPermissionController::transactionPermissions($user);
        if($transaction[0]->create_package=="all" || $transaction[0]->create_package=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasOpenPackagePermission(User $user){
        $transaction=UserControlPermissionController::transactionPermissions($user);
        if($transaction[0]->open_package=="all" || $transaction[0]->open_package=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasPostPackagePermission(User $user){
        $transaction=UserControlPermissionController::transactionPermissions($user);
        if($transaction[0]->post_package=="all" || $transaction[0]->post_package=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasApprovePackagePermission(User $user){
        $transaction=UserControlPermissionController::transactionPermissions($user);
        if($transaction[0]->approve_package=="all" || $transaction[0]->approve_package=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasAssesorInfoPackagePermission(User $user){
        $transaction=UserControlPermissionController::transactionPermissions($user);
        if($transaction[0]->assesor_info=="all" || $transaction[0]->assesor_info=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasSectorSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->sector_summary=="all" || $report[0]->sector_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasSubsectorSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->sub_sector_summary=="all" || $report[0]->sub_sector_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasOsSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->os_summary=="all" || $report[0]->os_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasLevelSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->level_summary=="all" || $report[0]->level_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasRegionSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->region_summary=="all" || $report[0]->region_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasItemSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->item_doc_summary=="all" || $report[0]->item_doc_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasPackageSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->package_summary=="all" || $report[0]->package_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasAssesorSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->assesor_summary=="all" || $report[0]->assesor_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasCreateSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->created_packages_summary=="all" || $report[0]->created_packages_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasOpenSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->open_packages_summary=="all" || $report[0]->open_packages_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasPostSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->post_packages_summary=="all" || $report[0]->post_packages_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasApproveSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->approve_package_summary=="all" || $report[0]->approve_package_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

    public static function hasAssesorInfoSummaryPermission(User $user){
        $report=UserControlPermissionController::reportPermissions($user);
        if($report[0]->assesor_info_summary=="all" || $report[0]->assesor_info_summary=="write"){
            return true;
        }
        else{
            return false;
        }
    }

}
