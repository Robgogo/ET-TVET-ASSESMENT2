<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use App\Subsector;
use App\Level;
use App\Region;

class InputUser extends Controller
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
}
