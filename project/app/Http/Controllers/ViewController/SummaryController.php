<?php

namespace App\Http\Controllers\ViewController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SummaryController extends Controller
{
    /**
     * Route Request to Sector sumary
     */
    public function sector() 
    {
        return view('summary.sector')->with('sectors', \App\Sector::all());
    }

    /**
     * Route Request to SubSector sumary
     */
    public function subSector() 
    {
        return view('summary.subsector')->with('subsectors', \App\SubSector::all());
    }

    /**
     * Route Request to Occupation Std sumary
     */
    public function occupationStd() 
    {
        return view('summary.occupational_std')
                ->with('occup_stds', \App\OccupationalStandard::all());
    }

    /**
     * Route Request to Level summary
     */
    public function level() 
    {
        return view('summary.level')
                ->with('levels', \App\Level::all());
    }

    /**
     * Route Request to Region summary
     */
    public function region() 
    {
        return view('summary.region')
                ->with('regions', \App\Region::all());
    }

    /**
     * Route Request to Item summary
     */
    public function item() 
    {
        return view('summary.item_docs')
                ->with('item_docs', \App\ItemDoc::all());
    }

    /**
     * Route Request to package summary
     */
    public function package() 
    {
        return view('summary.package')
                ->with('packages', \App\Package::all());
    }

    /**
     * Route Request to assossor summary
     */
    public function assessor() 
    {   
        return view('summary.assessor')
                ->with('assessors', \App\Assesor::all());
    }

    /**
     * Route Request to assossor summary
     */
    public function createdPackage() 
    {   
        return view('summary.created_package')
                ->with('packages', \App\CreatePackage::all());
    }

    public function openedPackage()
    {
        return view('summary.opened_package')
            ->with('packages', \App\OpenPackage::all());
    }

    public function postedPackage()
    {
        return view('summary.opened_package')
            ->with('packages', \App\PostPackage::all());
    }

}
