<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ItemDoc;
use App\Package;
use Illuminate\Support\Facades\Auth;

class ItemDocController extends Controller
{
    public function index(){

        $packages=Package::all();
        //dd($packages);
    	return view('maintenance.item.item_doc')->with(compact('packages'));
    }

    public function store(){
        $item=new ItemDoc;

        $this->validate(request(),[
            'package_no'=>'required',
            'item_code'=>'required',
            'item_name'=>'required',
            'item_description'=>'required'
        ]);
        $ite=ItemDoc::where('Itemcode',request('item_code'))->get();
        if(!$ite->isEmpty()){
            request()->session()->flash("alert-danger","Item with this item code exists,try again with different input!");
            return redirect('/item/show');
        }
        else{
            $item->package_id=request('package_no');
            $item->Itemcode=request('item_code');
            $item->Itemname=request('item_name');
            $item->Itemdesc=request('item_description');

            if($item->save()){
                $item_id=$item->id;
                $items=ItemDoc::find($item_id);
                $id=Auth::user()->employee_id;
                UserActivityController::store($id,"Created package ".$items->Itemname.".");
                request()->session()->flash("alert-success","Package added successfully.");
            }
            else{
                request()->session()->flash("alert-danger","Could not add item due to an error,try again later. We will fix it ASAP.");
            }
    	return redirect('/item/show');
        }

    }

    public function show(){
        $items=ItemDoc::all();
        //dd($items);
        return view('maintenance.item.show')->with(compact('items'));
    }

    public function showEdit($id){
        $item=ItemDoc::findorfail($id);
        $packages=Package::all();
        //dd($subsector);
        return view('maintenance.item.edit')->with(compact('item','packages'));
    }

    public function edit(){
        $this->validate(request(),[

            'item_code'=>'required',
            'item_name'=>'required',
            'item_description'=>'required'
        ]);

        if(DB::table('item_docs')
            ->where('Itemcode',request('item_code'))
            ->update([
                'Itemname'=>request('item_name'),
                'Itemdesc'=>request('item_description')
            ])){
            $item=ItemDoc::where('Itemcode',request('item_code'))->get();
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Updated sector ".$item[0]->Itemname.".");
            request()->session()->flash("alert-success","Updated successfully");
        }
        else{
            request()->session()->flash("alert-danger","Could not update, try again later!");
        }
        return redirect('/item/show');
    }

    public function delete($id){
        $item=ItemDoc::find($id);
        $item_name=$item->Itemname;
        if(DB::table('item_docs')
            ->where('id',$id)
            ->delete()){
            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Deleted sector ".$item_name.".");
            request()->session()->flash("alert-success","Deleted sector successfully!");
        }else{
            request()->session()->flash("alert-danger","Could not Delete due to a problem,try again later we will fix it ASAP!");
        }
        return redirect('/item/show');
    }
}
