<?php

namespace App\Http\Controllers;

use App\EmployeeInfo;
use App\User;
use Illuminate\Http\Request;
use App\Sector;
use App\Subsector;
use App\Level;
use App\Region;
use Illuminate\Support\Facades\DB;

class EmployeeInfoController extends Controller
{
    public function index(){
        $sector=Sector::all();
        $subsector=Subsector::all();
        $level=Level::all();
        $region=Region::all();
        $department=[[
            'Dept_code'=>'123',
            'Dept_name'=>'dep 1'
        ],
            [
                'Dept_code'=>'124',
                'Dept_name'=>'dep 2'
            ]

        ];

        return view('admin.transactions.input_user')->with(compact('sector','subsector','level','region','department'));

    }

    public function store(){

        $this->validate(request(),[
            'transaction_no'=>'required',
            'employee_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'sector'=>'required',
            'subsector'=>'required',
            'department'=>'required',
            'position'=>'required',
            'region'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'username'=>'required',
            'password'=>'required',
            'upload_photo'=>'required'
        ]);

        $employee=new EmployeeInfo;
        $user=new User;

        $employee->employee_id=request('employee_id');
        $employee->transaction_no=request('transaction_no');
        $employee->first_name=request('first_name');
        $employee->middle_name=request('middle_name');
        $employee->last_name=request('last_name');
        $employee->sector_code=request('sector');
        $employee->subsector_code=request('subsector');
        $employee->region_code=request('region');
        $employee->department=request('department');
        $employee->position=request('position');
        $employee->mobile=request('mobile');
        $employee->status="active";
        $dir="users/pictures/".request('username');
        //  dd(request()->upload_photo);
        $filename=request()->upload_photo->getClientOriginalName();
        if(request()->hasFile("upload_photo")){
            request()->upload_photo->storeAS("public/".$dir,$filename);
        }
        else{
            return "no";
        }
        $employee->image_dir=$dir."/".$filename;
        $employee->save();

        $user->employee_id=request('employee_id');
        $user->email=request('email');
        $user->user_name=request('username');
        $user->password=bcrypt(request('password'));

        $user->save();

        return redirect('/');
    }

    public function details($id){
        $employee=EmployeeInfo::findOrFail($id);

        return response()->json($employee);
    }

    public function updateStat(){
        DB::table('employee_infos')
            ->where('id',request('employee_id'))
            ->update([
               'status'=>request('status')
            ]);

        return redirect('/');
    }

    public static function isUserAdmin(User $user){

        if($user->flag==1){
            return true;
        }
        else
            return false;
    }

    public static function isUserActive(User $user){
        $emp_id=$user->employee_id;
        $emp=DB::table('employee_infos')
            ->where('employee_id',$emp_id)
            ->get();
        if($emp[0]->status=="active"){
            return true;
        }
        else
            return false;

    }
}
