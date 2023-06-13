<?php

namespace App\Http\Controllers;

use App\Models\SubcatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CategoryModel;


class SubcategoryController extends Controller
{
   
    public function get_sub(Request $request)
    {
        $id = $request->id;
        $data['cat_id'] = $id;
        $data['subcategory']= $sub_cat_data = SubcatModel::where('cate_id', $id)->get();
        $data['cat_name'] = CategoryModel::where('id', $id)->first();
        $data['count'] = $data['subcategory']->count();
        return view('product_management/subcategory/subcat_list_ajax',$data);
    }
    public function sub_cat_add(Request $request){
        $rules = [
            'sub_category'          => ['required', 'regex:/^[a-zA-Z\'\-\s]+$/'],
            'slug'                  => ['required'],
            'pagetitle'             => ['required'],
            'cat_image'             => ['required|file|mimes:jpeg,jpg,png,gif|max:2048'], 
            'metakey'               => ['required'],
            'meta_description'      => ['required'],
            'metatags'              => ['required'], 
            'cat_image'             => ['required'], 
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
            $data['cate_id'] = $request->cate_id;
            $data['title'] = $request->sub_category;
            $data['slug'] = $request->slug;
            $data['metatitle'] = $request->pagetitle;
            $data['metakey'] = $request->metakey;
            $data['metatags'] = $request->metatags;
            $data['description'] = $request->meta_description;

            $cat_image = $request->cat_image->getClientOriginalExtension();
            $newfileName = time().'.'.$cat_image;
            $request->cat_image->move(public_path().'/uploads/subcatrgory/',$newfileName); //this wil save file folder
            $data['sub_cat_icon'] = $newfileName;
            $insert = SubcatModel::insert($data);
            
            if($insert){
                return response()->json(['code'=>200, 'message'=>'SubCategory Added Successfully']);
            }else{
                return response()->json(['code'=>201, 'message'=>'Something Went Wrong']);
            }
           
        }  
    }
    public function edit(Request $request){
        $id = $request->id;
        $data['id'] = $id;
        $data['cat_id'] = $request->cat_id;
        
        $data['subcat']  = SubcatModel::where('id', $id)->first();
        $data['cat_name'] = CategoryModel::where('flag','!=','2')->get();
        return view('product_management/subcategory/edit',$data);
    }
    public function update(Request $request){
            $id = $request->id;
            $data['cate_id'] = $request->cate_id;
            $data['title'] = $request->sub_category ?? '';
            $data['slug'] = $request->slug ?? '';
            $data['metatitle'] = $request->pagetitle ?? '';
            $data['metakey'] = $request->metakey ?? '';
            $data['metatags'] = $request->metatags ?? '';
            $data['description'] = $request->meta_description ?? '';

            if($request->cat_image){
                $cat_image = $request->cat_image->getClientOriginalExtension();
                $newfileName = time().'.'.$cat_image;
                $request->cat_image->move(public_path().'/uploads/subcatrgory/',$newfileName); //this wil save file folder
                $data['sub_cat_icon'] = $newfileName;
            }
            $update = SubcatModel::where('id',$id)->update($data);
            if($update){
                return response()->json(['code'=>200, 'message'=>'Sub Category update Successfully']);
            }else{
                return response()->json(['code'=>201, 'message'=>'Something Went Wrong']);
            }
        
    }
}
