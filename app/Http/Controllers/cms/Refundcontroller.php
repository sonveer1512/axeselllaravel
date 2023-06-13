<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use Illuminate\Http\Request;

class Refundcontroller extends Controller
{
   public function index(){
    $data['refund'] = AboutModel::where('flag','!=','2')->where('type', '=','faqs')->first();
    return view('cms/refund/list',$data);
   }

   public function update(Request $request){
   
    $type = $request->type;
    $url = $request->v_url;
    $title = $request->title;
    $data['value'] = $request->editor1 ?? '';
    $data['type'] = $type;
    $data['title'] = $title;
    $data['vendor_url'] = getuserdetail('vendor_url');
    

    $refund = AboutModel::where('vendor_url','=',$url)->where('type','=',$type)->first();

    if(!empty($refund)){

        $update = AboutModel::where('id',$refund->id)->update($data);
        if($update){
            return response()->json(['code'=>200,'message'=>'Refund Policy update successfully']);
        }else{
            return response()->json(['code'=>201,'message'=>'Something Went Wrong']);
        }
        
    }else{
        $insert = AboutModel::insert($data);
        if($insert){
            return response()->json(['code'=>200,'message'=>'Refund Policy Added successfully']);
        }else{
            return response()->json(['code'=>201,'message'=>'Something Went Wrong']);
        }
    }



   }
}
