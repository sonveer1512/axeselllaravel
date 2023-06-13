<?php

namespace App\Http\Controllers;
use App\Models\SubcatModel;
use App\Models\CategoryModel;
use App\Models\SubsubcatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class SubsubController extends Controller
{
    public function get_sub_subcat(Request $request){
        $data['cat_id'] = $cat_id = $request->cat_id;
        $data['sub_cat_id'] = $sub_cat_id = $request->sub_cat_id;
        $data['subsubcategory'] = SubsubcatModel::where('sub_cate_id', $sub_cat_id)->get();
        
        $data['sub_cat_name'] = SubcatModel::where('id', $sub_cat_id)->first();
        $data['cat_name']     = CategoryModel::where('id', $cat_id)->first();
        $data['count'] = $data['subsubcategory']->count();
        return view('product_management/sub_sub_category/subcat_list_ajax',$data);
    }
    public function sub_cat_add(Request $request){
        $rules = [
            'subsubcategory'          => ['required', 'regex:/^[a-zA-Z\'\-\s]+$/'],
            'subslug'                 => ['required'],
            'subpagetitle'              => ['required'],
            'subcat_image'             => ['required|file|mimes:jpeg,jpg,png,gif|max:2048'], 
            'submetakey'               => ['required'],
            'submeta_description'      => ['required'],
            'submetatags'              => ['required'], 
            'subcat_image'             => ['required'], 
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
            $data['category_id'] = $request->category_id;
            $data['sub_cate_id'] = $request->subcateid; 
            $data['title'] = $request->subsubcategory;
            $data['slug'] = $request->subslug;
            $data['metatitle'] = $request->subpagetitle;
            $data['metakey'] = $request->submetakey;
            $data['metatags'] = $request->submetatags;
            $data['description'] = $request->submeta_description;

            $subcat_image = $request->subcat_image->getClientOriginalExtension();
            $newfileName = time().'.'.$subcat_image;
            $request->subcat_image->move(public_path().'/uploads/subsubcatrgory/',$newfileName); //this wil save file folder
            $data['sub_cat_icon'] = $newfileName;
            $insert = SubsubcatModel::insert($data);
            if($insert){
                return response()->json(['code'=>200, 'message'=>'Sub SubCategory Added Successfully']);
            }else{
                return response()->json(['code'=>201, 'message'=>'Something Went Wrong']);
            }
           
        }  
    }
    public function subsubcatshow(Request $request){
        $id = $request->id;
        $data['id'] = $id;
        $data['subsubcategory'] = SubsubcatModel::where('sub_cate_id', $id)->get();
        $data['sub_cat_name'] = SubcatModel::where('id', $id)->first();
        $data['count'] = $data['subsubcategory']->count();
        return view('product_management/sub_sub_category/subsubcategory',$data);
    }
    public function edit(Request $request){
        $id = $request->id;
        $data['category_id'] = $request->category_id;
        $data['id'] = $id;
        $data['cat_id'] = $request->cat_id;
        $data['category_name'] = CategoryModel::where('flag','!=','2')->get();
        $data['subcat']  = SubsubcatModel::where('id', $id)->first();
        $data['cat_name'] = SubcatModel::where('flag','!=','2')->get();
        return view('product_management/sub_sub_category/edit',$data);
    }
    public function update(Request $request){
            $id = $request->id;
            $data['category_id'] = $request->category_id ?? '';
            $data['sub_cate_id'] = $request->subcateid ?? ''; 
            
            $data['title'] = $request->sub_category ?? '';
            $data['slug'] = $request->slug ?? '';
            $data['metatitle'] = $request->pagetitle ?? '';
            $data['metakey'] = $request->metakey ?? '';
            $data['metatags'] = $request->metatags ?? '';
            $data['description'] = $request->meta_description ?? '';

            if($request->cat_image){
                $cat_image = $request->cat_image->getClientOriginalExtension();
                $newfileName = time().'.'.$cat_image;
                $request->cat_image->move(public_path().'/uploads/subsubcatrgory/',$newfileName); //this wil save file folder
                $data['sub_cat_icon'] = $newfileName;
            }
            $update = SubsubcatModel::where('id',$id)->update($data);
            if($update){
                return response()->json(['code'=>200, 'message'=>'Sub Sub-Category update Successfully']);
            }else{
                return response()->json(['code'=>201, 'message'=>'Something Went Wrong']);
            }
        
    }
}
