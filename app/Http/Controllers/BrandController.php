<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){

        return view('product_management/brand/list');
    }
    public function get_brand(){
        $data['brand'] =BrandModel::where('flag','!=','2')->orderby('id','desc')->get();
        return view('product_management/brand/list_ajax',$data);
    }
    public function add(Request $request){
        $rules = [
            'brand_name'          => ['required', 'regex:/^[a-zA-Z\'\-\s]+$/'],
            'brand_slug'          => ['required','regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i'],
            'brand_pagetitle'     => ['required'],
            'brand_image'     => ['required|file|mimes:jpeg,jpg,png,gif|max:2048'], 
            'brand_metakey'       => ['required'],
            'brand_meta_description'  => ['required'],
            'brand_metatags'          => ['required'], 
            'brand_image'          => ['required'], 
        ];
        $messages = [
            'name.regex' => 'The name field must contain only letters and spaces.',
            'slug.regex' => 'The slug may only contain alphanumeric characters and dashes.',
            'slug.unique' => 'The slug is already in use. Please choose a different one',
            'cat_image.max' =>  'Please upload an image 2MB',
            'cat_image.mimes' => 'Please upload an image with a valid file extension (jpg, jpeg, png, gif, svg).',               
        ];
        $validate = validator::make ($request->all(),$rules,$messages);
        if($validate->fails()){
            return response()->json(['code'=>401,'message'=>$validate->errors()->toArray()]);
        }else{
            $data['name'] = $request->brand_name;
            $data['slug'] = $request->brand_slug;
            $data['metatitle'] = $request->brand_pagetitle;
            $data['metakey'] = $request->brand_metakey;
            $data['metatags'] = $request->brand_metatags;
            $data['description'] = $request->brand_meta_description;

            $brand_image = $request->brand_image->getClientOriginalExtension();
            $newfileName = time().'.'.$brand_image;
            $request->brand_image->move(public_path().'/uploads/brand/',$newfileName); //this wil save file folder
            $data['icon'] = $newfileName;
            $insert = BrandModel::insert($data);
            if($insert){
                return response()->json(['code'=>200, 'message'=>'Brand Added Successfully']);
            }else{
                return response()->json(['code'=>201, 'message'=>'Something Went Wrong']);
            }
           
        }
    }

    public function edit(Request $request){
        $id = $request->id;
        $brand = BrandModel::where('id',$id)->first();
        return view('product_management/brand/edit',compact('brand'));
    }
    public function update(Request $request){
       
            $id = $request->id;
            $data['name'] = $request->brand_name ?? '';
            $data['slug'] = $request->brand_slug ?? '';
            $data['metatitle'] = $request->brand_pagetitle ?? '';
            $data['metakey'] = $request->brand_metakey ?? '';
            $data['metatags'] = $request->brand_metatags ?? '';
            $data['description'] = $request->brand_meta_description ?? '';

            if(!empty($request->brand_image)){
                $brand_image = $request->brand_image->getClientOriginalExtension();
                $newfileName = time().'.'.$brand_image;
                $request->brand_image->move(public_path().'/uploads/brand/',$newfileName); //this wil save file folder
                $data['icon'] = $newfileName;
            }
            
            $update = BrandModel::where('id',$id)->update($data);
            if($update){
                return response()->json(['code'=>200, 'message'=>'Brand Updated Successfully']);
            }else{
                return response()->json(['code'=>201, 'message'=>'Something Went Wrong']);
            }
           
        
    }
}
