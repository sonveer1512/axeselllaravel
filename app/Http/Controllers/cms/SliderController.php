<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index(){
        return view('cms/slider/list');
    }
    public function add(Request $request){
        $rules = [
            'title'              => ['required', 'regex:/^[a-zA-Z\'\+\s]+$/'],
            'subtitle'           => ['required', 'regex:/^[a-zA-Z\'\+\s]+$/'],
            'image'              =>'required|file|mimes:jpeg,jpg,png,gif|max:2048', // max size in KB, 
            'url'                => ['required'],
            'description'        => ['required'],
        ];
        $messages = [
            'name.regex' => 'The name field must contain only letters and spaces.',
            'image.max' =>  'Please upload an image 2MB',
            'image.mimes' => 'Please upload an image with a valid file extension (jpg, jpeg, png, gif, svg).'
        ];
        $validate = Validator::make($request->all(),$rules,$messages);

        if($validate->fails()){
            return response()->json(['code'=>401,'messages'=>$validate->errors()->toArray()]);
        }else{
            $data['title'] = $request->title;
            $data['subtitle'] = $request->subtitle;
            $data['url'] = $request->url;
            $data['description'] = $request->description;
            $data['vendor_url'] =  getuserdetail('vendor_url');
        
            $image = $request->image->getClientOriginalExtension();
            $newfileName = time().'.'.$image;
            $request->image->move(public_path().'/uploads/sliders/',$newfileName); //this wil save file folder
            $data['image'] = $newfileName;

            $insert = SliderModel::insert($data);

            if($insert){
                return response()->json(['code'=>200,'message'=>'Slider Added Successfully']);
            }else{
                return response()->json(['code'=>201,'message'=>'Something Went wrong']);
            }

        }
    }
    public function get_slider(){
        $data['banner'] = SliderModel::where('flag','!=','2')->get();
        return view('cms/slider/list_ajax',$data);
    }
    public function edit(Request $request){
        $id = $request->id;
        $data['banner'] = SliderModel::where('id',$id)->first();
        return view('cms/slider/edit',$data);
    }

    public function update(Request $request){
        $id = $request->id;
        $data['title'] = $request->title ?? '';
        $data['subtitle'] = $request->subtitle ?? '';
        $data['url'] = $request->url ?? '';
        $data['description'] = $request->description ?? '';
        $data['vendor_url'] =  getuserdetail('vendor_url');
        
        if(!empty($request->image)){
            $image = $request->image->getClientOriginalExtension();
            $newfileName = time().'.'.$image;
            $request->image->move(public_path().'/uploads/sliders/',$newfileName); //this wil save file folder
            $data['image'] = $newfileName;
        }
       

        $update = SliderModel::where('id',$id)->update($data);

        if($update){
            return response()->json(['code'=>200,'message'=>'Slider Updated Successfully']);
        }else{
            return response()->json(['code'=>201,'message'=>'Something Went wrong']);
        }

    }
    
}
