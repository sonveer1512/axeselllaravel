<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\AdminModel;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $data['about'] = AboutModel::where('flag','!=','2')->first();
        return view('cms/about/list',$data);
    }
    public function update(Request $request){
        
        $about = $request->type;
        $url = $request->v_url;
        $id = $request->id;
        $v_id = AboutModel::where('id',$id)->where('vendor_url',$url)->first(); 
        $c_id = $v_id->id;
        $data['value'] = $request->editor1 ?? '';
        $data['type']  = $about;
        $data['vendor_url'] = getuserdetail('vendor_url');
        $data['id'] = $id;

        if($v_id){
            $update = AboutModel::where('id',$c_id)->update($data);
        }else{
            $update = AboutModel::insert($data);
        }
         
        if($update){
            return response()->json(['code'=>200,'message'=>'About Added Successfully']);
        }else{
            return response()->json(['code'=>201,'message'=>'Something Went Wrong']);
        }

    }
}
