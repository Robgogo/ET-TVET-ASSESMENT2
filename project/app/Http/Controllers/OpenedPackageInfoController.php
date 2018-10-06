<?php

namespace App\Http\Controllers;

use App\CreatePackage;
use App\Package;
use Illuminate\Http\Request;
use App\OpenedPackageInfo;
use App\OpenPackage;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class OpenedPackageInfoController extends Controller
{

    public function store2(){
        $rules=[];

        foreach(request('upload') as $key => $value){
            $rules["upload.{$key}"]='required|mimes:pdf';
        }

       foreach(request()->input('new_comments') as $key => $value){
            $rules["new_comments.{$key}"]='required';
        }

        $validator=Validator::make(request()->all(),$rules);

        if($validator->passes()){
            $aa= OpenPackage::all()->last();
            $ids=$aa->id;

            $package_id=$aa->created_package_id;
        //  dd($package_id);
            $pack_code=CreatePackage::where('id',$package_id)->get();
            $package=Package::where('Packagecode',$pack_code[0]->package_code)->get();
            $pac_name=$package[0]->Packagename;
            $dir="public/files/opened/".$pac_name;
            //$item_name=request()->input('item_name');
            $item_no=request()->input('item_no');
            $uploads=request('upload');
            $comments=request()->input('new_comments');
            for($i=0;$i<count($item_no);$i++){
                $file_name=request('upload')[$i]->getClientOriginalName();
                request('upload')[$i]->storeAs($dir,$file_name);
//                dd($id);
                $pack=new OpenedPackageInfo([
                    'open_package_id'=>$ids,
                    'item_no'=>$item_no[$i],
                    'opened_items_dir'=>$dir."/".$file_name,
                    'opened_item_comment'=>$comments[$i]
                ]);
//                dd($pack);
                if($pack->save()){
                    $id=Auth::user()->employee_id;
                    UserActivityController::store($id,"Opened package for ".$pac_name.".");
                    request()->session()->flash("alert-success","Package opened and saved successfully.");
                }
                else{
                    $id=$aa->id;
                    DB::table('open_packages')->where('id',$id)->delete();
                    request()->session()->flash("alert-danger","Could not save opened package files due to an error,try again later. We will fix it ASAP.");
                }
            }
        }
        return redirect('/open_package/show');
    }

//     public function store(){
//         $pack=new OpenedPackageInfo;

//         $this->validate(request(),[
//             'new_comments'=>'required',
//             'new_comments2'=>'required',
//             'new_comments3'=>'required',
//             'new_comments4'=>'required',
//             'new_comments5'=>'required',
//             'new_comments6'=>'required',
//             'new_comments7'=>'required',
//             'new_comments8'=>'required',
//             'new_comments9'=>'required',
//             'new_comments10'=>'required',
//             'upload'=>'required|mimes:pdf',
//             'upload2'=>'required|mimes:pdf',
//             'upload3'=>'required|mimes:pdf',
//             'upload4'=>'required|mimes:pdf',
//             'upload5'=>'required|mimes:pdf',
//             'upload6'=>'required|mimes:pdf',
//             'upload7'=>'required|mimes:pdf',
//             'upload8'=>'required|mimes:pdf',
//             'upload9'=>'required|mimes:pdf',
//             'upload10'=>'required|mimes:pdf'
//         ]);
//         $aa= OpenPackage::all()->last();
//         //dd($aa);
//         //$i=OpenPackage::get()->latest()->first();
//         $val=OpenPackage::get()->where('open_pack_no',$aa->open_pack_no);
//         $id=$aa->id;

//         $package_id=$aa->created_package_id;
//        // dd($package_id);
//         $pack_code=CreatePackage::get()->where('id',$package_id);
//         $package=Package::get()->where('Packagecode',$pack_code->pluck('package_code')[0]);
// //        $pack_code=CreatePackage::get()->where('id',$val->pluck('created_package_id')[0])->first();

//         $pack->open_package_id=$id;
//         $pack->item_no=request('item_no');

//         $pac_name=$package->pluck('Packagename');
//         $dir="public/files/opened/".$pac_name[0];
//         $file_name=request()->upload->getClientOriginalName();

//         if(request()->hasFile('upload')){
//             request()->upload->storeAs($dir,$file_name);
//         }


//         $pack->opened_items_dir=$dir."/".$file_name;
//         $pack->opened_item_comment=request('new_comments');


//         $pack2=new OpenedPackageInfo;
//         $pack2->open_package_id=$id;
//         $pack2->item_no=request('item_no2');
//         $file_name2=request()->upload2->getClientOriginalName();
//         if(request()->hasFile('upload2')){
//             request()->upload2->storeAs($dir,$file_name2);
//         }
//         $pack2->opened_items_dir=$dir."/".$file_name2    ;
//         $pack2->opened_item_comment=request('new_comments2');


//         $pack3=new OpenedPackageInfo;
//         $pack3->open_package_id=$id;
//         $pack3->item_no=request('item_no3');
//         $file_name3=request()->upload3->getClientOriginalName();
//         if(request()->hasFile('upload3')){
//             request()->upload3->storeAs($dir,$file_name3);
//         }
//         $pack3->opened_items_dir=$dir."/".$file_name3    ;
//         $pack3->opened_item_comment=request('new_comments3');


//         $pack4=new OpenedPackageInfo;
//         $pack4->open_package_id=$id;
//         $pack4->item_no=request('item_no4');
//         $file_name4=request()->upload4->getClientOriginalName();
//         if(request()->hasFile('upload4')){
//             request()->upload4->storeAs($dir,$file_name4);
//         }
//         $pack4->opened_items_dir=$dir."/".$file_name4;
//         $pack4->opened_item_comment=request('new_comments4');
//         ;

//         $pack5=new OpenedPackageInfo;
//         $pack5->open_package_id=$id;
//         $pack5->item_no=request('item_no5');
//         $file_name5=request()->upload5->getClientOriginalName();
//         if(request()->hasFile('upload5')){
//             request()->upload5->storeAs($dir,$file_name5);
//         }
//         $pack5->opened_items_dir=$dir."/".$file_name5;
//         $pack5->opened_item_comment=request('new_comments5');


//         $pack6=new OpenedPackageInfo;
//         $pack6->open_package_id=$id;
//         $pack6->item_no=request('item_no6');
//         $file_name6=request()->upload6->getClientOriginalName();
//         if(request()->hasFile('upload6')){
//             request()->upload6->storeAs($dir,$file_name6);
//         }
//         $pack6->opened_items_dir=$dir."/".$file_name6;
//         $pack6->opened_item_comment=request('new_comments6');


//         $pack7=new OpenedPackageInfo;
//         $pack7->open_package_id=$id;
//         $pack7->item_no=request('item_no7');
//         $file_name7=request()->upload7->getClientOriginalName();
//         if(request()->hasFile('upload7')){
//             request()->upload7->storeAs($dir,$file_name7);
//         }
//         $pack7->opened_items_dir=$dir."/".$file_name7;
//         $pack7->opened_item_comment=request('new_comments2');


//         $pack8=new OpenedPackageInfo;
//         $pack8->open_package_id=$id;
//         $pack8->item_no=request('item_no8');
//         $file_name8=request()->upload8->getClientOriginalName();
//         if(request()->hasFile('upload8')){
//             request()->upload8->storeAs($dir,$file_name8);
//         }
//         $pack8->opened_items_dir=$dir."/".$file_name8;
//         $pack8->opened_item_comment=request('new_comments8');


//         $pack9=new OpenedPackageInfo;
//         $pack9->open_package_id=$id;
//         $pack9->item_no=request('item_no9');
//         $file_name9=request()->upload9->getClientOriginalName();
//         if(request()->hasFile('upload9')){
//             request()->upload9->storeAs($dir,$file_name9);
//         }
//         $pack9->opened_items_dir=$dir."/".$file_name9;
//         $pack9->opened_item_comment=request('new_comments9');


//         $pack10=new OpenedPackageInfo;
//         $pack10->open_package_id=$id;
//         $pack10->item_no=request('item_no10');
//         $file_name10=request()->upload10->getClientOriginalName();
//         if(request()->hasFile('upload10')){
//             request()->upload10->storeAs($dir,$file_name10);
//         }
//         $pack10->opened_items_dir=$dir."/".$file_name10;
//         $pack10->opened_item_comment=request('new_comments10');


//         if($pack->save()&&$pack2->save()&&$pack3->save()&&$pack4->save()&&
//             $pack5->save()&&$pack6->save()&&$pack7->save()&&$pack8->save()&&$pack9->save()&&$pack10->save()){

        //     $id=Auth::user()->employee_id;
        //     UserActivityController::store($id,"Opened package for ".$pac_name.".");
        //     request()->session()->flash("alert-success","Package opened and saved successfully.");
        // }
        // else{
        //     $id=$aa->id;
        //     DB::table('open_packages')->where('id',$id)->delete();
        //     request()->session()->flash("alert-danger","Could not save opened package files due to an error,try again later. We will fix it ASAP.");
        // }

//         return redirect('/open_package/show');


//     }
}
