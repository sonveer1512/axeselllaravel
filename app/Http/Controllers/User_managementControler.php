<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class User_managementControler extends Controller
{
    public function index(){
       
        return view('user_management/list');
    }
    public function staffadd(Request $request){

        $validate = Validator::make($request->all(),[
            'email'          =>'required|max:255',
            'staff_password' =>'required|min:6',
            'staff_name'     =>'required|min:2',
            'staff_role'     =>'required',
            'staff_image'    =>'required',
        ]);

        if($validate->fails()){
            return response()->json(['code'=>401,'messages'=>$validate->errors()->toArray()]);
        }else{
            $savestaff['email'] = $request->email;
            $check_email = VendorModel::where('email',$savestaff['email'])->first(); 

            if(empty($check_email)){
                $savestaff['password'] = Hash::make($request->staff_password);
                $savestaff['name']   = $request->staff_name;
                $savestaff['email']  = $request->email;
                $savestaff['mobile'] = $request->staff_mob;
                $savestaff['role']   = $request->staff_role;
                $savestaff['vendor_url'] = getuserdetail('vendor_url');

                // if(!empty($request->staff_image)){
                //     $imagelogo = $request->staff_image->getClientOriginalExtension();
                //     $filename = time().'.'.$imagelogo;
                //     $request->staff_image->move(public_path().'/uploads/staff/',$filename); //this wil save file folder
                //     $savestaff['vendor_staff_image'] = $filename;
                // }
                if (!empty($request->file('staff_image'))) {
                    $file = $request->file('staff_image');
                    date_default_timezone_set('Asia/Kolkata');
        
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('uploads/staff'), $filename);
                    $savestaff['vendor_staff_image'] = "uploads/staff/$filename";
                   }

                $query = DB::table('vendor')->insertGetId($savestaff);
               
                if($query){
                    $sidebar_name = $request->sidebar_name;
                    $data['vendor_staff_id'] = $query;

                    if(!empty($sidebar_name)){
                        for($i = 0; $i < count($sidebar_name); $i++){
                            $data['read'] = $data['write_permission'] = 0;
                            
                            if(!empty($request->input('read'.$sidebar_name[$i]))){
                                $data['read'] = 1;
                            }
                            if(!empty($request->input('write'.$sidebar_name[$i]))){
                                $data['write_permission'] = 1;
                            }
                            $data['module'] = $sidebar_name[$i];
                            DB::table('vendor_staff_access')->insert($data);
                        }
                    }
                    return response()->json(['code' => 200, 'message' => 'Staff Added Successfully']);    
                }else{
                    return response()->json(['code' => 400, 'message' => 'Something went wrong']);
                }
            }else{
                return response()->json(['code' => 400, 'message' => 'Email Address already exist']);
            }
        }
    }
    public function get_user(){
       
        $data['user'] = VendorModel::where('flag', '!=', '2')->where('vendor_url',getuserdetail('vendor_url'))->orderby('id','DESC')->get();
        return view('user_management/list_ajax',$data);
    }

    public function edit(Request $request){
        $staff_id = $request->id;
        $staff = VendorModel::where('id',$staff_id)->where('vendor_url',getuserdetail('vendor_url'))->first();
        
        return view('user_management/edit',compact('staff'));
    }
}
