<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function index(){
        $data['terms'] = AboutModel::where('flag','!=',2)->where('type', '=','Terms_condition')->first();
        return view('cms/term/list',$data);
    }
    public function update(Request $request){

       
        $title = $request->title;
        $terms = $request->type;
        $url = $request->v_url;
        $results = AboutModel::where('vendor_url', '=', $url)->where('type', '=', $terms)->first();
      
        $data['value'] = $request->editor1 ?? '';
        $data['type'] = $terms;
        $data['title'] = $title;
        $data['vendor_url'] = getuserdetail('vendor_url');
       

        if(!empty($results)){
            $update = AboutModel::where('id',$results->id)->update($data);
            if($update){
                return response()->json(['code'=>200,'message'=>'Update successfully']);
            }else{
                return response()->json(['code'=>201,'message'=>'Something went wrong']);
            }
            
        }else{
            $insert = AboutModel::insert($data);
            if($insert){
                return response()->json(['code'=>200,'message'=>'added successfully']);
            }else{
                return response()->json(['code'=>201,'message'=>'Something went wrong']);
            }
        }
    }
}
