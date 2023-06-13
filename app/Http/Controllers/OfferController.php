<?php

namespace App\Http\Controllers;

use App\Models\OfferModel;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
        return view('offer/list');
    }

    public function flat(){

        return view('offer/flat/list');
    }

    public function percentage(){

        return view('offer/percentage/list');
    }

    public function percentdata(Request $request){
        $type = $request->id;
        $data['type'] = $type;

        if($type == 'Category') {
            $data['items'] = OfferModel::where($type,'flat_dis_amount',getuserdetail('vendor_url'));
        }else if($type == 'Sub Category') {
            $data['items'] = OfferModel::where($type,'flat_dis_amount',getuserdetail('vendor_url'));
        }else if($type == 'Brand') {
            $data['items'] = OfferModel::where($type,'flat_dis_amount',getuserdetail('vendor_url'));
        }else if($type == 'Product') {
            $data['items'] = OfferModel::where($type,'flat_dis_amount',getuserdetail('vendor_url'));
        }

        return view('offer/percentage/tabledata',$data);
    }
}
