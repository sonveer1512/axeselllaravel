<?php

namespace App\Http\Controllers;
use App\Models\AdminModel;
use App\Models\VendorModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function home(){
        return view('index');
    }
    
    public function index(){
        if(Session::get('admin_login')){
            return redirect('/dashboard');
        }else{
            return view('index');
        }
    }

    public function login(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'email' => ['required', 'email', 'min:10'],
            'password' => 'required|min:6'
        ]);

        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $email = $request->email;
            
                $check = VendorModel::where('email', $email)->first();


            if ($check) {
                $pass_verify = Hash::check($request->password, $check->password);

                if ($pass_verify) {
                    $session['admin_login'] = ['id' => $check->id, 'name' => $check->name, 'email' => $check->email, 'role' => $check->role, 'mobile' => $check->mobile,'vendor_url' => $check->	vendor_url, 'image' => $check->staff_image];
                    Session::put($session);
                    $sess = Session::get('admin_login');
                    Cookie::queue('login_email', $check->email, time() + 60 * 60 * 24 * 100);
                    Cookie::queue('login_pass', $check->password, time() + 60 * 60 * 24 * 100);

                    return response()->json(['code' => 200, 'message' => 'Login Successfully']);
                } else {
                    return response()->json(['code' => 201, 'message' => 'Incorrect Password']);
                }
            } else {
                return response()->json(['code' => 400, 'message' => 'Email Address is not registered']);
            }
        }
    }
}
