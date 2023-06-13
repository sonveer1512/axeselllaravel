<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
   public function index(){
    $data['Policy'] = AboutModel::where('flag','!=',2)->where('type', '=','Privacy_Policy')->first();
    return view('cms/privacy/list',$data);
   }
   public function update(Request $request){

   
    $title = $request->title;
    $terms = $request->type;
    $url = $request->v_url;
    $data['value'] = $request->editor1 ?? '';
    $data['type'] = $terms;
    $data['title'] = $title;
    $data['vendor_url'] = getuserdetail('vendor_url');
   

    $results = AboutModel::where('vendor_url', '=', $url)->where('type', '=', $terms)->first();

    if(!empty($results)){
        $update = AboutModel::where('id',$results->id)->update($data);
        if($update){
            return response()->json(['code'=>200,'message'=>'Privacy & Policy Update successfully']);
        }else{
            return response()->json(['code'=>201,'message'=>'Something went wrong']);
        }
        
    }else{
        $insert = AboutModel::insert($data);
        if($insert){
            return response()->json(['code'=>200,'message'=>'Privacy & Policy added successfully']);
        }else{
            return response()->json(['code'=>201,'message'=>'Something went wrong']);
        }
    }
   }
}
