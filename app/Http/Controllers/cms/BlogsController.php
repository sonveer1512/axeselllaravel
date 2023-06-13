<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class BlogsController extends Controller
{
    public function index(){

        return view('cms/blogs/list');
    }
    public function add(Request $request){

        $rules = [
            'title'                => ['required', 'regex:/^[a-zA-Z\'\\s]+$/'],
            'slug'                 => ['required'],
            'image'                 =>'required|file|mimes:jpeg,jpg,png,gif|max:2048', // max size in KB, 
            'pagetitle'            => ['required'],
            'meta_description'     => ['required'],
            'metatags'             => ['required'], 
            'metakey'              =>['required'],
        ];
        $messages = [
            'name.regex' => 'The name field must contain only letters and spaces.',
            'image.max' =>  'Please upload an image 2MB',
            'image.mimes' => 'Please upload an image with a valid file extension (jpg, jpeg, png, gif, svg).',  
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return response()->json(['code'=>401,'message'=>$validator->errors()->toArray()]);
        }else{
            $data['heading'] = $request->title;
            $data['slug'] = $request->slug;
           
            $data['page_title'] = $request->pagetitle;
            $data['meta_desc'] = $request->meta_description;
            $data['meta_tags'] = $request->metatags;
            $data['meta_key'] = $request->metakey;
            $data['vendor_url'] =  getuserdetail('vendor_url');

            $image = $request->image->getClientOriginalExtension();
            $newfileName = time().'.'.$image;
            $request->image->move(public_path().'/uploads/blog/',$newfileName); //this wil save file folder
            $data['image'] = $newfileName;

            $insert = BlogModel::insert($data);

            if($insert){
                return response()->json(['code'=>200,'message'=>'Blog Added Successfully']);
            }else{
                return response()->json(['code'=>201,'message'=>'something Went Wrong']);
            }

        }
    }
    public function get_blog(){
        $data['blog'] = BlogModel::where('flag','!=','2')->orderby('id','desc')->get();
        return view('cms/blogs/list_ajax',$data);
    }

    public function edit(Request $request){
       $id = $request->id;
       $blogedit = BlogModel::where('id',$id)->first();
        return view('cms/blogs/edit',compact('blogedit'));

    }
    public function update(Request $request){
        $id = $request->id;
        $data['heading'] = $request->title ?? '';
        $data['slug'] = $request->slug ?? '';
        
        $data['page_title'] = $request->pagetitle ?? '';
        $data['meta_desc'] = $request->meta_description ?? '';
        $data['meta_tags'] = $request->metatags ?? '';
        $data['meta_key'] = $request->metakey ?? '';
        $data['vendor_url'] =  getuserdetail('vendor_url');

        if(!empty($request->image)){
            $image = $request->image->getClientOriginalExtension();
            $newfileName = time().'.'.$image;
            $request->image->move(public_path().'/uploads/blog/',$newfileName); //this wil save file folder
            $data['image'] = $newfileName;
        }
        

        $update = BlogModel::where('id',$id)->update($data);

        if($update){
            return response()->json(['code'=>200,'message'=>'Blog Update Successfully']);
        }else{
            return response()->json(['code'=>201,'message'=>'something Went Wrong']);
        }
    }
}
