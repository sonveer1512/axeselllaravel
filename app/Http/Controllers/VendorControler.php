<?php

namespace App\Http\Controllers;

use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class VendorControler extends Controller
{
    public function index(){
        return view('vendor/list');
    }
    public function add(Request $request){
        $rules = [
            'loginpassword'  => 'required',
            'name'           =>'required|required|regex:/^[a-zA-Z]+$/',
            'email'          =>'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'address'        =>'required|regex:/^[a-zA-Z0-9\s\.,#-]+$/',
            'logo'           =>'required|file|mimes:jpeg,jpg,png,gif|max:2048', // max size in KB
            'mobile'         =>'required|regex:/^\+?(?:\d\s?){10,14}$/',
            'companyname'    =>'required|required|regex:/^[a-zA-Z]+$/',
            'cgst'           =>'regex:/^([0-9]{2}[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9A-Za-z]{1}Z[0-9A-Za-z]{1})$/',
            'companyaddress' =>'required|regex:/^[a-zA-Z0-9\s\.,#-]+$/',
            'loginemail'     =>'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        ];
        $messages = [
            'loginpassword.regex'    => 'Please enter a Strong Password *.',
            'loginpassword.required' => 'The password field is required.',
            'name.regex'             => 'Please enter a only alphabet *.',
            'email.regex'            => 'Please enter a Email Valid *.',
            'address.regex'          => 'Please enter a  Valid  Formate address*.',
            'logo.max'               =>  'Please upload an image 2MB',
            'logo.mimes'             => 'Please upload an image with a valid file extension (jpg, jpeg, png, gif, svg).',
            'mobile.regex'           =>'Please enter  only 10 digit Number *.',
            'companyname.regex'      => 'Please enter a only alphabet *.',
            'cgst.regex'             => 'Please enter a valid GST number',
            'companyaddress'         =>'Please enter a  Valid  Formate address*.',

        ];
        $validate = Validator::make($request->all(),$rules,$messages);
        if($validate->fails()){
            return response()->json(['code'=>401,'message' =>$validate->errors()->toArray()]);
        }else{

            $data['vendor_name'] = $request->name;
            $data['vendor_email'] = $request->email;
            $data['vendor_mobile'] = $request->mobile;
            $data['vendor_address'] =  $request->address;
            $data['company_name'] = $request->companyname;
            $data['company_address'] = $request->companyaddress;
            $data['company_gst'] = $request->cgst;
            $data['email'] =  $request->loginemail;
            $data['password'] = Hash::make($request->loginpassword);
            $data['vendor_url'] =  getuserdetail('vendor_url');
           
           
            $data['distributor_id'] = getuserdetail('id');
            
            $imagelogo = $request->logo->getClientOriginalExtension();
            $newfileName = time().'.'.$imagelogo;
            $request->logo->move(public_path().'/uploads/vendor/',$newfileName); //this wil save file folder
            $data['vendor_logo'] = $newfileName;

            $insert_data = VendorModel::insert($data);
            if($insert_data){
                return response()->json(['code'=>200,'message'=>'Vendor Added Successfully ']);
            }else{
                return response()->json(['code'=>201,'message'=>'Something Went Wrong']);
            }
        
        }
    }
    public function edit(Request $request){
        $id = $request->id;
        $vendor = VendorModel::where('id',$id)->first();
        return view('vendor/edit',compact('vendor'));
    }



    public function update(Request $request){

        $id = $request->id;
        $data['vendor_name'] = $request->name ?? '';
        $data['vendor_email'] = $request->email ?? '';
        $data['vendor_mobile'] = $request->mobile ?? '';
        $data['vendor_address'] =  $request->address ?? '';
        $data['company_name'] = $request->companyname ?? '';
        $data['company_address'] = $request->companyaddress ?? '';
        $data['company_gst'] = $request->cgst ?? '';
       
        if($request->logo){
            $imagelogo = $request->logo->getClientOriginalExtension();
            $newfileName = time().'.'.$imagelogo;
            $request->logo->move(public_path().'/uploads/vendor/',$newfileName); //this wil save file folder
            $data['vendor_logo'] = $newfileName;
        }
        $update_data = VendorModel::where('id',$id)->update($data);
        if($update_data){
            return response()->json(['code'=>200,'message'=>'Vendor Updated Successfully']);
        }else{
            return response()->json(['code'=>201,'message'=>'Something Went Wrong']);
        }

    }

    public function get_vendor(){

        $vendor = VendorModel::where('flag','!=','2')->orderby('id','desc');
      
        if(getuserdetail('role') != 'Admin') {
            $vendor = $vendor->where('distributor_id',getuserdetail('id'));
        }
        $vendor = $vendor->get();
       
        return view('vendor/list_ajax',compact('vendor'));
    }
  
}
