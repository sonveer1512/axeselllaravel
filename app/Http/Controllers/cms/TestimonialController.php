<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\testimonialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('cms/testimonial/list');
    }

    public function add(Request $request)
    {
        $rules = [

            'title'         => ['required'],
            'Position'      =>['required'],
            'image'         => ['required'], 
            'description'   => ['required'],
        ];
        $messages = [

            'name.regex' =>'The name field must contain only letters and spaces.',
            'image.max' => 'Please upload an image 2MB',
            'image.mimes' =>'Please upload an image with a valid file extension (jpg, jpeg, png, gif, svg).',
        ];
        $validate = Validator::make($request->all(), $rules, $messages);

        if ($validate->fails()) {
            return response()->json(['code' => 401,'messages' => $validate->errors()->toArray(),]);
        } else {
            // print_r($request->image);exit;
            for ($y = 0; $y < count($request->title); $y++) {

                $data['name'] = $request->title[$y];
                $data['designation'] = $request->Position[$y];
                $data['description'] = $request->description[$y];
                $data['vendor_url'] = getuserdetail('vendor_url');

                if(!empty($request->image)){
                    $image = $request->image[$y]->getClientOriginalName();
                    $newfileName = time() . '.' . $image;
                    $request->image[$y]->move(public_path() . '/uploads/testimonial/',$newfileName); //this wil save file folder
                    $data['image'] = $newfileName;
                }
                
                $insert = testimonialModel::insert($data);
            }

            if ($insert) {
                return response()->json(['code' => 200,'message' => 'Testimonial Added Successfully']);
            } else {
                return response()->json(['code' => 201,'message' => 'Something Went wrong']);
            }
        }
    }

    public function get_testimonial(){
        $data['testimonial'] = testimonialModel::where('flag','!=','2')->get();
        return view('cms/testimonial/list_ajax',$data);
    }

    public function edit(Request $request){
        $id = $request->id;
        $data['testimonial'] = testimonialModel::where('id',$id)->first();
        return view('cms/testimonial/edit',$data);
    }

    public function update(Request $request){
        $id = $request->id;
        $data['name'] = $request->title ??'';
        $data['designation'] = $request->Position ?? '';
        $data['description'] = $request->description ?? '';
        $data['vendor_url'] = getuserdetail('vendor_url');
 
        if(!empty($request->image)){
            $image = $request->image->getClientOriginalExtension();
            $newfileName = time() . '.' . $image;
            $request->image->move( public_path() . '/uploads/testimonial/', $newfileName ); //this wil save file folder
            $data['image'] = $newfileName;
        }
        $update = testimonialModel::where('id',$id)->update($data);
        if ($update) {
            return response()->json(['code' => 200,'message' => 'Testimonial update Successfully',]);
        } else { 
            return response()->json(['code' => 201,'message' => 'Something Went wrong',]);
        }
    }
}
