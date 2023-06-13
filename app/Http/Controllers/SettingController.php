<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\SettingModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Json;

class SettingController extends Controller
{
    public function index(){
        $sess_id = session('admin_login');
        $id = $sess_id['id'];
        $data['details'] = VendorModel::where('id',$id)->first();
        return view('setting/details',$data);
    }
    public function update(Request $request){
        $rules = [
            // 'title'          => ['regex:/^[a-zA-Z]+$/u'],
            'city'           => ['regex:/^[a-zA-Z]+$/u'],
            'state'          => ['regex:/^[a-zA-Z]+$/u'],
            'country'        => ['regex:/^[a-zA-Z]+$/u'],
            'mobile'         => ['regex:/^\d{10}$/'],
            
        ];
        $messages = [
            // 'title.regex' => 'The title field must contain only alphabet.',
            'city.regex' => 'The title field must contain only alphabet.',
            'state.regex' => 'The title field must contain only alphabet.',
            'country.regex' => 'The title field must contain only alphabet.',
            'mobile.regex' => 'The Mobile field must contain only 10-digit number.',
                        
        ];
        $validate = validator::make ($request->all(),$rules,$messages);
        if($validate->fails()){
            return response()->json(['code'=>401,'message'=>$validate->errors()->toArray()]);
        }else{

            $id = $request->id;
            $data['c_name'] = $request->title ?? '';
            $data['mobile'] = $request->mobile ?? '';
            $data['email'] = $request->email ?? '';
            $data['website'] = $request->website ?? '';
            $data['c_address'] = $request->address ??'';
            $data['city'] = $request->city ?? '';
            $data['state'] = $request->state ?? '';
            $data['country'] = $request->country ?? '';
            $data['fb_link']  = $request->fb_link ?? '';
            $data['twitter_link'] = $request->twitter_link ?? '';
            $data['insta_link'] = $request->insta_link ?? '';
            $data['youtube_link'] = $request->youtube_link ?? '';
            
            if($request->logo){
                $logo = $request->logo->getClientOriginalExtension();
                $newfileName = time().'.'.$logo;
                $request->logo->move(public_path().'/uploads/logo/',$newfileName); //this wil save file folder
                $data['vendor_logo'] = $newfileName;
            }

            if($request->favicon){
                $favicon = $request->favicon->getClientOriginalExtension();
                $newfileName = time().'.'.$favicon;
                $request->favicon->move(public_path().'/uploads/favicon/',$newfileName); //this wil save file folder
                $data['favicon'] = $newfileName;
            }
            $update = VendorModel::where('id',$id)->update($data);
           
            if($update){
                return response()->json(['code' =>200, 'message'=>'Update Successfully']);
            }else{
                return response()->json(['code'=>401,'message'=>'something Went Wrong']);
            }

        }
    }
    public function resetpassword(){

        return view('setting/forget_password');
    }

    public function changepassword(Request $request)
    {
        $validate = validator::make($request->all(),[
            'oldpassword' => 'required',
            'new_pass' => 'required',
            'confirm_pass' =>'required',
        ]);
        
        if( $validate->fails()){
            return response()->json(['code'=>401,'message'=>$validate->errors()->toArray()]);
        }else{

            $change_id = $request->change_id;
            $check = VendorModel::where('id',$change_id)->first();
            $check_pass = Hash::check($request->oldpassword, $check->password);
            
            if($request->new_pass == $request->confirm_pass)
            {
                if($check_pass){     
                    $data['password'] = Hash::make($request->new_pass);
                    
                    $updatepss = VendorModel::where('id',$change_id)->update($data);
                   
                    if($updatepss){
                        return response()->json(['code'=>200,'message'=>'Password Update']);
                    }else{
                        return response()->json(['code'=>401,'message'=>'something Went Wrong']);
                    }
                }else{
                    return response()->json(['code'=>402,'message'=>'Incorrect Old Password']);
                }
            }else{
                return response()->json(['code' => 403, 'message' => 'New Password & Confirm Password Should be same']);
            }
        }
    }
}
