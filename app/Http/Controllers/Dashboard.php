<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Dashboard extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }


    public function delete(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'table' => 'required',
            'type' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'code' => 400,
                'message' => 'Something went wrong',
            ]);
        } else {
            if ($request->type == 'activate') {
                $savedata['flag'] = 0;
                $key = 'Activated';
            } elseif ($request->type == 'deactivate') {
                $savedata['flag'] = 1;
                $key = 'Deactivated';
            } elseif ($request->type == 'delete') {
                $savedata['flag'] = 2;
                $key = 'Deleted';
            } else {
                return response()->json([
                    'code' => 400,
                    'message' => 'Something went wrong',
                ]);
            }

            $query = DB::table($request->table)
                ->where('id', $request->id)
                ->update($savedata);

            if ($query) {
                return response()->json([
                    'code' => 200,
                    'message' => 'Data ' . $key . ' Successfully',
                ]);
            } else {
                return response()->json([
                    'code' => 400,
                    'message' => 'Something went wrong',
                ]);
            }
        }
    }
}
