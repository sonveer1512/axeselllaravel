<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\CategoryModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class categoryController extends Controller
{
    public function index(){
        
        return view('product_management/category/list');
    }
    public function add(Request $request){
        $rules = [
            'name'          => ['required', 'regex:/^[a-zA-Z\'\-\s]+$/'],
            'slug'          => ['required','regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i'],
            'pagetitle'     => ['required'],
            'cat_image'     => ['required|file|mimes:jpeg,jpg,png,gif|max:2048'], 
            'metakey'       => ['required'],
            'meta_description'  => ['required'],
            'metatags'          => ['required'], 
            'cat_image'          => ['required'], 
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
            $data['title'] = $request->name;
            $data['slug'] = $request->slug;
            $data['metatitle'] = $request->pagetitle;
            $data['metakey'] = $request->metakey;
            $data['metatags'] = $request->metatags;
            $data['description'] = $request->meta_description;

            $cat_image = $request->cat_image->getClientOriginalExtension();
            $newfileName = time().'.'.$cat_image;
            $request->cat_image->move(public_path().'/uploads/catrgory/',$newfileName); //this wil save file folder
            $data['cat_icon'] = $newfileName;
            $insert = CategoryModel::insert($data);
            if($insert){
                return response()->json(['code'=>200, 'message'=>'Category Added Successfully']);
            }else{
                return response()->json(['code'=>201, 'message'=>'Something Went Wrong']);
            }
           
        }   
    }

    public function get_cat()
    {
        $data['category'] = CategoryModel::where('flag', '!=', '2')->orderby('id','DESC')->get();
        $data['count'] = $data['category']->count();
        return view('product_management/category/cat_list_ajax',$data);
    }
    public function edit(Request $request){
        $id = $request->id;
        
        $category = CategoryModel::where('id',$id)->first();
        return view('product_management/category/edit',compact('category'));
    }
    public function update(Request $request){
       
        $id = $request->id;
        $data['title'] = $request->name ?? '';
        $data['slug'] = $request->slug ?? '';
        $data['metatitle'] = $request->pagetitle ?? '';
        $data['metakey'] = $request->metakey ?? '';
        $data['metatags'] = $request->metatags ?? '';
        $data['description'] = $request->meta_description ?? '';
        if($request->cat_image){
            $cat_image = $request->cat_image->getClientOriginalExtension();
            $newfileName = time().'.'.$cat_image;
            $request->cat_image->move(public_path().'/uploads/catrgory/',$newfileName); //this wil save file folder
            $data['cat_icon'] = $newfileName;
        }

       
        $update = CategoryModel::where('id',$id)->update($data);
        if($update){
            return response()->json(['code'=>200, 'message'=>'Category Update Successfully']);
        }else{
            return response()->json(['code'=>201, 'message'=>'Something Went Wrong']);
        }
        
           

    }
}
