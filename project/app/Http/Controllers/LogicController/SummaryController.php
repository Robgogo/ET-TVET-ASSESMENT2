<?php

namespace App\Http\Controllers\LogicController;

use App\CreatePackage;
use App\Package;
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
    
}
