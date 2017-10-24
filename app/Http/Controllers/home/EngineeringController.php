<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class EngineeringController extends Controller
{
    /**
     *  工程案例控制器
     */
    public function getIndex($id="")
    {
        
        // 查询数据库
        $image3 = DB::table('daohangtu')->first();

        $shuju = DB::table('engineering')->where('cateid',$id)->first();

        $engineering = DB::table('engineering')->get();

        $cate = DB::table('cate')->get();

        $lianxi = DB::table('lianxi')->first();

        // 分配数据,返回视图
        return view('/home/engineering/index',['image3'=>$image3,'engineering'=>$engineering,'cate'=>$cate,'id'=>$id,'shuju'=>$shuju,'lianxi'=>$lianxi]);
    }
}
