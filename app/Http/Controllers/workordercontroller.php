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
    public function index($unit, Request $request)
    {
        //$beginOfDay = date("Y-m-d H:i:s", strtotime(date('Y-m-d')." 00:00:00"));
        $beginOfDay = '2021-09-01 00:00:00';
        $endOfDay   = date("Y-m-d H:i:s", strtotime(date('Y-m-d')." 23:59:59"));

        $data = DB::table("work_order")
        ->where('tujuan',$unit)
        ->whereBetween('tgl_order',array($beginOfDay,$endOfDay))
        ->orderBy('tgl_order','DESC')
        ->get();
        return response()->json($data);
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
            $print = ['data'=>$cariuser,'sts'=>'error'];
        }
        return response()->json($print);
    }
}
