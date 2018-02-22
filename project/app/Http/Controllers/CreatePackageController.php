<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;

class CreatePackageController extends Controller
{
    public function index(){
    	$package=Package::all();
    	return view('transactions.create_package',compact('package'));
    }

    public function getId($pack_no){
    	$pack=Package::get()->where('Packagecode',$pack_no);
    	$id=$pack->pluck('id')[0];
    	//$this->get($id);
    	$package = Package::findOrFail($id);
    	$items = $package->items;
    	// dd(response()->json($items)->Itemnam;
    	return response()->json($package);
    }

    public function get($id){
    	$package = Package::findOrFail($id);
    	$items = $package->items;
    	// dd(response()->json($items)->Itemnam;
    	return response()->json($package);
//    	return response()->json(['item_name'=>$package["items"]->pluck('Itemname')]);
    }
}
