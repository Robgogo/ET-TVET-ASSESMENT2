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
    	$this->get($id);
    }

    public function get($id){
    	$package = Package::findOrFail($id);
    	$items = $package->items;
    	//dd(response()->json($package["items"]->pluck('Itemname')));
    	return response()->json($package);
    }
}
