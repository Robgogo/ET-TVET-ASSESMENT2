<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreatedPackageInfo;

class CreatedPackageInfoController extends Controller
{
    public function store($id,$dir){
        $packageInfo=new CreatedPackageInfo;
        $packageInfo->created_package_id=$id;
        $filename=request()->upload->getClientOriginalName();

        if(request()->hasFile('upload')){
            request()->upload->storeAs($dir,$filename);
        }
        $packageInfo->item_no=request('item_no');
        $packageInfo->item_name=request('item_name');
        $packageInfo->file_dir=$dir."/".$filename;
        $packageInfo->comments=request('comments');
        $packageInfo->save();


        $packageInfo2=new CreatedPackageInfo;
        $packageInfo2->created_package_id=$id;
        $filename2=request()->upload2->getClientOriginalName();
        if(request()->hasFile('upload2')){
            request()->upload2->storeAs($dir,$filename2);
        }
        $packageInfo2->item_no=request('item_no2');
        $packageInfo2->item_name=request('item_name2');
        $packageInfo2->file_dir=$dir."/".$filename2;
        $packageInfo2->comments=request('comments2');
        $packageInfo2->save();

        $packageInfo3=new CreatedPackageInfo;
        $packageInfo3->created_package_id=$id;
        $filename3=request()->upload3->getClientOriginalName();
        if(request()->hasFile('upload3')){
            request()->upload3->storeAs($dir,$filename3);
        }
        $packageInfo3->item_no=request('item_no3');
        $packageInfo3->item_name=request('item_name3');
        $packageInfo3->file_dir=$dir."/".$filename3;
        $packageInfo3->comments=request('comments3');
        $packageInfo3->save();

        $packageInfo4=new CreatedPackageInfo;
        $packageInfo4->created_package_id=$id;
        $filename4=request()->upload4->getClientOriginalName();
        if(request()->hasFile('upload4')){
            request()->upload4->storeAs($dir,$filename4);
        }
        $packageInfo4->item_no=request('item_no4');
        $packageInfo4->item_name=request('item_name4');
        $packageInfo4->file_dir=$dir."/".$filename4;
        $packageInfo4->comments=request('comments4');
        $packageInfo4->save();

        $packageInfo5=new CreatedPackageInfo;
        $packageInfo5->created_package_id=$id;
        $filename5=request()->upload5->getClientOriginalName();
        if(request()->hasFile('upload5')){
            request()->upload5->storeAs($dir,$filename2);
        }
        $packageInfo5->item_no=request('item_no5');
        $packageInfo5->item_name=request('item_name5');
        $packageInfo5->file_dir=$dir."/".$filename5;
        $packageInfo5->comments=request('comments5');
        $packageInfo5->save();

        $packageInfo6=new CreatedPackageInfo;
        $packageInfo6->created_package_id=$id;
        $filename6=request()->upload6->getClientOriginalName();
        if(request()->hasFile('upload6')){
            request()->upload6->storeAs($dir,$filename6);
        }
        $packageInfo6->item_no=request('item_no6');
        $packageInfo6->item_name=request('item_name6');
        $packageInfo6->file_dir=$dir."/".$filename6;
        $packageInfo6->comments=request('comments6');
        $packageInfo6->save();

        $packageInfo7=new CreatedPackageInfo;
        $packageInfo7->created_package_id=$id;
        $filename7=request()->upload7->getClientOriginalName();
        if(request()->hasFile('upload7')){
            request()->upload7->storeAs($dir,$filename7);
        }
        $packageInfo7->item_no=request('item_no7');
        $packageInfo7->item_name=request('item_name7');
        $packageInfo7->file_dir=$dir."/".$filename2;
        $packageInfo7->comments=request('comments7');
        $packageInfo7->save();

        $packageInfo8=new CreatedPackageInfo;
        $packageInfo8->created_package_id=$id;
        $filename8=request()->upload8->getClientOriginalName();
        if(request()->hasFile('upload8')){
            request()->upload8->storeAs($dir,$filename8);
        }
        $packageInfo8->item_no=request('item_no8');
        $packageInfo8->item_name=request('item_name8');
        $packageInfo8->file_dir=$dir."/".$filename2;
        $packageInfo8->comments=request('comments8');
        $packageInfo8->save();

        $packageInfo9=new CreatedPackageInfo;
        $packageInfo9->created_package_id=$id;
        $filename9=request()->upload9->getClientOriginalName();
        if(request()->hasFile('upload9')){
            request()->upload9->storeAs($dir,$filename9);
        }
        $packageInfo9->item_no=request('item_no9');
        $packageInfo9->item_name=request('item_name9');
        $packageInfo9->file_dir=$dir."/".$filename2;
        $packageInfo9->comments=request('comments9');
        $packageInfo9->save();

        $packageInfo10=new CreatedPackageInfo;
        $packageInfo10->created_package_id=$id;
        $filename10=request()->upload10->getClientOriginalName();
        if(request()->hasFile('upload10')){
            request()->upload10->storeAs($dir,$filename10);
        }
        $packageInfo10->item_no=request('item_no10');
        $packageInfo10->item_name=request('item_name10');
        $packageInfo10->file_dir=$dir."/".$filename10;
        $packageInfo10->comments=request('comments10');
        $packageInfo10->save();


    }
}
