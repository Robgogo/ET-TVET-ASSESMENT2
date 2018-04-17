<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index(){
        return view('maintenance.department.department');
    }

    public function store(){

        $department=new Department;

        $this->validate(request(),[

            'department_code'=>'required',
            'department_name'=>'required',
            'department_description'=>'required'
        ]);

        $dep=Department::where('Deptcode',request('department_code'))->get();
        if(!$dep->isEmpty()){
            request()->session()->flash("alert-danger","Department with this department code exists,try again with different input!");
            return redirect('/department/show');
        }
        else{
            $department->Deptcode=request('department_code');
            $department->Deptname=request('department_name');
            $department->Deptdesc=request('department_description');

            if($department->save()){
                $dep_id=$department->id;
                $departments=Department::find($dep_id);
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created assesor ".$departments->Deptname.".");
                request()->session()->flash("alert-success","Department added successfully.");
            }
            else{
                request()->session()->flash("alert-danger","Could not add department due to an error,try again later. We will fix it ASAP.");
            }

            return redirect('/department/show');
        }

    }

    public function show(){
        $depts=Department::all();
        //dd($assesors);
        return view('maintenance.department.show')->with(compact('depts'));
    }

    public function showEdit($id){
        $dept=Department::findorfail($id);
        //dd($subsector);
        return view('maintenance.department.edit')->with(compact('dept'));
    }

    public function edit(){

        $this->validate(request(),[

            'department_code'=>'required',
            'department_name'=>'required',
            'department_description'=>'required'
        ]);

        if(DB::table('departments')
            ->where('Deptcode',request('department_code'))
            ->update([
                'Deptname'=>request('department_name'),
                'Deptdesc'=>request('department_description')
            ])){
            $dep=Department::where('Deptcode',request('department_code'))->get();
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Updated department ".$dep[0]->Deptname.".");
            request()->session()->flash("alert-success","Updated successfully");
        } else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }
        return redirect('/department/show');
    }

    public function delete($id){
        $dep=Department::find($id);
        $dep_name=$dep->Deptname;
        if(DB::table('departments')
            ->where('id',$id)
            ->delete()){
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Deleted department ".$dep_name.".");
            request()->session()->flash("alert-success","Deleted department successfully!");
        }else{
            request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
        }
        return redirect('/department/show');
    }
}
