<?php

use App\Models\InnerSidebarModel;
use App\Models\SiderbarModel;
use App\Models\User_accessModel;
use Illuminate\Support\Facades\Session;

if (!function_exists('getuserdetail')) {
    function getuserdetail($string)
    {
        $sess = session('admin_login');
        return $sess[$string] ?? '';
    }
}

if (!function_exists('haveaccess')) {
    function haveaccess()
    {
        $sess = Session::get('admin_login');
        $role = $sess['role'];
        if($role != 'vendor'){
          return view('errors/403');

        }
    }
}

if(!function_exists('getsidebar')){

    function getsidebar(){
        $main_array = array();
        $get = SiderbarModel::where('flag','!=','2')->get();
        if(!empty($get)){
            foreach ($get as $value){
                $subarray = array();
                $innernav = InnerSidebarModel::where('navigation_id',$value['id'])->where('flag','!=','2')->get();
                
                if(!empty($innernav)){
                    foreach ($innernav as $sidemenu) {
                        if(getuserdetail('role') == 'vendor'){
                            array_push($subarray,array('id'=>$sidemenu->id, 'navigation_id'=>$sidemenu->navigation_id,'inner_menu'=>$sidemenu->inner_menu,'slug',$sidemenu->slug));
                        }else{
                            $exits = User_accessModel::where('menu','inner')->where('user_id',getuserdetail('id'))->where('nav_id',$sidemenu->id)->where('read_per','1')->first();
                            if(!empty($exits)) {
                                array_push($subarray, array('id' => $sidemenu->id, 'navigation_id' => $sidemenu->navigation_id, 'inner_menu' => $sidemenu->inner_menu, 'slug' => $sidemenu->slug));    
                            }
                        }
                    }
                }
                if(getuserdetail('role') == 'vendor'){
                    array_push($main_array,array('id' => $value['id'] ,'icon' => $value['icon'],'menu' => $value['menu'],'slug' => $value['slug'],'innermenu' => $subarray));

                }else{
                    $exit = User_accessModel::where('menu','main')->where('user_id',getuserdetail('id'))->where('nav_id',$value['id'])->where('read_per','1')->first();
                    if(!empty($exit)|| !empty($subarray)){
                        array_push($main_array, array('id' => $value['id'], 'icon' => $value['icon'], 'menu' => $value['menu'], 'slug' => $value['slug'], 'innermenu' => $subarray));
                    }
                }
            }
        }
        return $main_array;
    }
}


