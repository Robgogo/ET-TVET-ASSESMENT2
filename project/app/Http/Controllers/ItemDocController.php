<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ItemDoc;
use App\Package;

class ItemDocController extends Controller
{
    public function index(){

        $packages=Package::all();
        //dd($packages);
    	return view('maintenance.item_doc')->with(compact('packages'));
    }

    public function store(){
        $item=new ItemDoc;
    	if(null!==request('save')){

            $this->validate(request(),[
                'package_no'=>'required',
                'item_code'=>'required',
                'item_name'=>'required',
                'item_description'=>'required'
            ]);
    		$item->package_id=request('package_no');
    		$item->Itemcode=request('item_code');
    		$item->Itemname=request('item_name');
    		$item->Itemdesc=request('item_description');
    		$item->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){
            $this->validate(request(),[

                'item_code'=>'required',
                'item_name'=>'required',
                'item_description'=>'required'
            ]);

            DB::table('item_docs')
                ->where('Itemcode',request('item_code'))
                ->update([
                    'Itemname'=>request('item_name'),
                    'Itemdesc'=>request('item_description')
                ]);

    	}

    	else if(null!==request('delete')){
            $this->validate(request(),[
                'item_code'=>'required',
            ]);

             DB::table('item_docs')
                ->where('Itemcode',request('item_code'))
                ->delete();
    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
