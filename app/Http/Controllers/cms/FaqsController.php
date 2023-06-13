<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    Public Function index(){
        $data['faqs'] = AboutModel::where('flag','!=','2')->where('type', '=','faqs')->first();
        return view('cms/FAQs/list',$data);
    }
    public function update(Request $request){
        $type = $request->type;
        $url  = $request->v_url;
        $data['title']  = $request->title;
        $data['type']   = $type;
        $data['vendor_url'] = $url;
        
        $data['value'] =  $request->editor1 ?? '';

        $faqsas = AboutModel::where('vendor_url','=',$url)->where('type','=',$type)->first();
        if(!empty($faqsas)){
    
            $faqs = AboutModel::where('id',$faqsas->id)->update($data);
            if($faqs){
                return response()->json(['code'=>200,'message'=>'FAQs update successfully']);
            }else{
                return response()->json(['code'=>201,'message'=>'Something Went Wrong']);
            }
            
        }else{
            $insert = AboutModel::insert($data);
            if($insert){
                return response()->json(['code'=>200,'message'=>'FAQs Added successfully']);
            }else{
                return response()->json(['code'=>201,'message'=>'Something Went Wrong']);
            }
        }
    }
}
