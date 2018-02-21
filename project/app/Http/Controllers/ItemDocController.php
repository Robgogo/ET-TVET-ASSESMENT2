<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemDoc;

class ItemDocController extends Controller
{
    public function index(){
    	return view('maintenance.item_doc');
    }

    public function store(){
        $item=new ItemDoc;
    	if(null!==request('save')){
    		
    		$item->Itemcode=request('item_code');
    		$item->Itemname=request('item_name');
    		$item->Itemdesc=request('item_description');
    		$item->save();
    		//dd(request()->all());
    	}
    	else if(null!==request('edit')){

    	}

    	else if(null!==request('delete')){

    	}

    	else
    		return "<h1>button other than save was pressed</h1>";	
    	
    	return redirect('/');
    }
}
