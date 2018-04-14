<?php

namespace App\Http\Controllers;

use App\CreatePackage;
use App\OpenPackage;
use App\PostPackage;
use App\PostPackageInfo;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostPackageInfoController extends Controller
{
    public function store(){
        $postPack=new PostPackageInfo;

        $this->validate(request(),[
            'upload'=>'required',
            'new_comments'=>'required'
        ]);

        $post_package=PostPackage::all()->last();
        $post_id=$post_package->id;
        $open_id=$post_package->opened_package_id;
        $package=OpenPackage::get()->where('id',$open_id)->first();
        //dd($package);
        $created_package=CreatePackage::get()->where('id',$package->created_package_id)->first();
        //dd($created_package);
        $package_code=Package::get()->where('Packagecode',$created_package->package_code)->first();
        $package_name=$package_code->Packagename;

        $dir="public/files/posted/".$package_name;
        //dd($package_name);
        $filename=request()->upload->getClientOriginalName();

        if(request()->hasFile("upload")){
            request()->upload->storeAS($dir,$filename);
        }

        $postPack->post_package_id=$post_id;
        $postPack->item_no=request('item_no');
        $postPack->post_items_dir=$dir."/".$filename;
        $postPack->post_item_comment=request('new_comments');


        $postPack2=new PostPackageInfo;
        $filename2=request()->upload2->getClientOriginalName();

        if(request()->hasFile("upload2")){
            request()->upload2->storeAS($dir,$filename2);
        }

        $postPack2->post_package_id=$post_id;
        $postPack2->item_no=request('item_no2');
        $postPack2->post_items_dir=$dir."/".$filename2;
        $postPack2->post_item_comment=request('new_comments2');


        $postPack3=new PostPackageInfo;
        $filename3=request()->upload3->getClientOriginalName();

        if(request()->hasFile("upload3")){
            request()->upload3->storeAS($dir,$filename3);
        }

        $postPack3->post_package_id=$post_id;
        $postPack3->item_no=request('item_no3');
        $postPack3->post_items_dir=$dir."/".$filename3;
        $postPack3->post_item_comment=request('new_comments3');


        $postPack4=new PostPackageInfo;
        $filename4=request()->upload4->getClientOriginalName();

        if(request()->hasFile("upload4")){
            request()->upload4->storeAS($dir,$filename4);
        }

        $postPack4->post_package_id=$post_id;
        $postPack4->item_no=request('item_no4');
        $postPack4->post_items_dir=$dir."/".$filename4;
        $postPack4->post_item_comment=request('new_comments4');


        $postPack5=new PostPackageInfo;
        $filename5=request()->upload5->getClientOriginalName();

        if(request()->hasFile("upload5")){
            request()->upload5->storeAS($dir,$filename5);
        }

        $postPack5->post_package_id=$post_id;
        $postPack5->item_no=request('item_no5');
        $postPack5->post_items_dir=$dir."/".$filename5;
        $postPack5->post_item_comment=request('new_comments5');


        $postPack6=new PostPackageInfo;
        $filename6=request()->upload6->getClientOriginalName();

        if(request()->hasFile("upload6")){
            request()->upload6->storeAS($dir,$filename6);
        }

        $postPack6->post_package_id=$post_id;
        $postPack6->item_no=request('item_no6');
        $postPack6->post_items_dir=$dir."/".$filename6;
        $postPack6->post_item_comment=request('new_comments6');


        $postPack7=new PostPackageInfo;
        $filename7=request()->upload7->getClientOriginalName();

        if(request()->hasFile("upload7")){
            request()->upload7->storeAS($dir,$filename7);
        }

        $postPack7->post_package_id=$post_id;
        $postPack7->item_no=request('item_no7');
        $postPack7->post_items_dir=$dir."/".$filename7;
        $postPack7->post_item_comment=request('new_comments7');


        $postPack8=new PostPackageInfo;
        $filename8=request()->upload8->getClientOriginalName();

        if(request()->hasFile("upload8")){
            request()->upload8->storeAS($dir,$filename8);
        }

        $postPack8->post_package_id=$post_id;
        $postPack8->item_no=request('item_no8');
        $postPack8->post_items_dir=$dir."/".$filename8;
        $postPack8->post_item_comment=request('new_comments8');


        $postPack9=new PostPackageInfo;
        $filename9=request()->upload9->getClientOriginalName();

        if(request()->hasFile("upload9")){
            request()->upload9->storeAS($dir,$filename9);
        }

        $postPack9->post_package_id=$post_id;
        $postPack9->item_no=request('item_no9');
        $postPack9->post_items_dir=$dir."/".$filename9;
        $postPack9->post_item_comment=request('new_comments9');


        $postPack10=new PostPackageInfo;
        $filename10=request()->upload10->getClientOriginalName();

        if(request()->hasFile("upload10")){
            request()->upload10->storeAS($dir,$filename10);
        }

        $postPack10->post_package_id=$post_id;
        $postPack10->item_no=request('item_no10');
        $postPack10->post_items_dir=$dir."/".$filename10;
        $postPack10->post_item_comment=request('new_comments10');


        if($postPack->save()&&$postPack2->save()&&$postPack3->save()&&$postPack4->save()&&
            $postPack5->save()&&$postPack6->save()&&$postPack7->save()&&$postPack8->save()&&$postPack9->save()&&$postPack10->save()){

            $id=Auth::user()->employee_id;
            UserActivityController::store($id,"Opened package for ".$package_name.".");
            request()->session()->flash("alert-success","Package opened and saved successfully.");
        }
        else{
            $id=$post_package->id;
            DB::table('open_packages')->where('id',$id)->delete();
            request()->session()->flash("alert-danger","Could not save opened package files due to an error,try again later. We will fix it ASAP.");
        }

        //dd($postPack);
        return redirect('/post_package/show');

    }
}
