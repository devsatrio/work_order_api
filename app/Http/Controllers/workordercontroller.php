<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class workordercontroller extends Controller
{
    //========================================================================================
    public function __construct()
    {
        //
    }

    //========================================================================================
    public function index($unit)
    {
        $data = DB::table("work_order")->where('hasil', '!=', 'selesai')->where('tujuan',$unit)->orderBy('tgl_order','DESC')->get();
        $print = ["data" => $data,'sts'=>'success'];
        return response()->json($print);
    }

    //========================================================================================
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $cariuser = DB::table('user')->where([['user','=',$username],['pass','=',$password]])->get();

        if(count($cariuser)>0){
            $print = ['data'=>$cariuser,'sts'=>'success'];

        }else{
            $print = ['sts'=>'error'];
        }

        
        return response()->json($print);
    }
}
