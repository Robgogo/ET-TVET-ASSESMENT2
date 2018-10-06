<?php

namespace App\Http\Controllers;

use App\Approve;
use App\ApprovedDocuments;
use App\CreatedPackageInfo;
use App\CreatePackage;
use App\OpenPackage;
use App\PostPackage;
use App\PostPackageInfo;
use App\Package;
use Illuminate\Support\Facades\DB;
use App\ItemDoc;
use Illuminate\Http\Request;

class ApprovedDocumentsController extends Controller
{
    public function index(){

        $package=Package::all();
        return view('transactions.approved_documents.index')->with(compact("package"));
    }

    public function show(){

        $this->validate(request(),[
                'package' => 'required',
                'items' => 'required'
            ]);

        $package=CreatePackage::where('package_code',request('package'))->get();
        $openId=OpenPackage::where('created_package_id',$package[0]->id)->get()[0]->id;
//        dd($openId);
        $postId=PostPackage::where('opened_package_id',$openId)->get()[0]->id;
//        dd($postId);
        $approveId=Approve::where('post_package_id',$postId)->get()[0]->id;
//        dd($approveId);
        $doc=ApprovedDocuments::where('approve_id',$approveId)->where('item_name',request('items'))->get();
//        dd($doc);

        return view('transactions.approved_documents.show')->with(compact('doc'));
    }

    public function download($id){
        $val=DB::table('approved_documents')
            ->where('id',$id)
            ->first();
        $path = storage_path().'/'.'app'.'/'.$val->dir;
        if (file_exists($path)) {
            //$id=Auth::user()->employee_id;
            return response()->file($path);
            //return response()->download($path);
        }
        else
            return "File Not found";
    }

    public static function store2(Approve $app){
        $post_id=$app->post_package_id;
        $post=PostPackageInfo::where('post_package_id',$post_id)->get();
        $open_id=PostPackage::where('id',$post_id)->get()->pluck('opened_package_id');
        $create_id=OpenPackage::where('id',$open_id)->get()->pluck('created_package_id');
        for($i=0;$i<$post->count();$i++){
            $item_no=$post[$i]->item_no;
            $create=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no)->get();
            $name=$create[0]->item_name;
            $doc=new ApprovedDocuments;
            $doc->dir=$post[$i]->post_items_dir;
            $doc->item_name=$name;
            $doc->level=$app->level_code;
            $doc->save();
        }
    }

    // public static function store(Approve $app){

    //     $doc1=new ApprovedDocuments;
    //     $doc2=new ApprovedDocuments;
    //     $doc3=new ApprovedDocuments;
    //     $doc4=new ApprovedDocuments;
    //     $doc5=new ApprovedDocuments;
    //     $doc6=new ApprovedDocuments;
    //     $doc7=new ApprovedDocuments;
    //     $doc8=new ApprovedDocuments;
    //     $doc9=new ApprovedDocuments;
    //     $doc10=new ApprovedDocuments;

    //     $post_id=$app->post_package_id;
    //     $post=PostPackageInfo::where('post_package_id',$post_id)->get();
    //     //dd($post);
    //     $item_no1=$post[0]->item_no;
    //     $item_no2=$post[1]->item_no;
    //     $item_no3=$post[2]->item_no;
    //     $item_no4=$post[3]->item_no;
    //     $item_no5=$post[4]->item_no;
    //     $item_no6=$post[5]->item_no;
    //     $item_no7=$post[6]->item_no;
    //     $item_no8=$post[7]->item_no;
    //     $item_no9=$post[8]->item_no;
    //     $item_no10=$post[9]->item_no;


    //     $open_id=PostPackage::where('id',$post_id)->get()->pluck('opened_package_id');
    //     $create_id=OpenPackage::where('id',$open_id)->get()->pluck('created_package_id');
    //     $create1=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no1)->get();
    //     $create2=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no2)->get();
    //     $create3=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no3)->get();
    //     $create4=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no4)->get();
    //     $create5=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no5)->get();
    //     $create6=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no6)->get();
    //     $create7=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no7)->get();
    //     $create8=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no8)->get();
    //     $create9=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no9)->get();
    //     $create10=CreatedPackageInfo::where('created_package_id',$create_id)->where('item_no',$item_no10)->get();

    //     $name1=$create1[0]->item_name;
    //     $name2=$create2[0]->item_name;
    //     $name3=$create3[0]->item_name;
    //     $name4=$create4[0]->item_name;
    //     $name5=$create5[0]->item_name;
    //     $name6=$create6[0]->item_name;
    //     $name7=$create7[0]->item_name;
    //     $name8=$create8[0]->item_name;
    //     $name9=$create9[0]->item_name;
    //     $name10=$create10[0]->item_name;

    //     $doc1->dir=$post[0]->post_items_dir;
    //     $doc1->item_name=$name1;
    //     $doc1->level=$app->level_code;
    //     $doc1->save();

    //     $doc2->dir=$post[1]->post_items_dir;
    //     $doc2->item_name=$name2;
    //     $doc2->level=$app->level_code;
    //     $doc2->save();

    //     $doc3->dir=$post[2]->post_items_dir;
    //     $doc3->item_name=$name3;
    //     $doc3->level=$app->level_code;
    //     $doc3->save();

    //     $doc4->dir=$post[3]->post_items_dir;
    //     $doc4->item_name=$name4;
    //     $doc4->level=$app->level_code;
    //     $doc4->save();

    //     $doc5->dir=$post[4]->post_items_dir;
    //     $doc5->item_name=$name5;
    //     $doc5->level=$app->level_code;
    //     $doc5->save();

    //     $doc6->dir=$post[5]->post_items_dir;
    //     $doc6->item_name=$name6;
    //     $doc6->level=$app->level_code;
    //     $doc6->save();

    //     $doc7->dir=$post[6]->post_items_dir;
    //     $doc7->item_name=$name7;
    //     $doc7->level=$app->level_code;
    //     $doc7->save();

    //     $doc8->dir=$post[7]->post_items_dir;
    //     $doc8->item_name=$name8;
    //     $doc8->level=$app->level_code;
    //     $doc8->save();

    //     $doc9->dir=$post[8]->post_items_dir;
    //     $doc9->item_name=$name9;
    //     $doc9->level=$app->level_code;
    //     $doc9->save();

    //     $doc10->dir=$post[9]->post_items_dir;
    //     $doc10->item_name=$name10;
    //     $doc10->level=$app->level_code;
    //     $doc10->save();

    // }



}
