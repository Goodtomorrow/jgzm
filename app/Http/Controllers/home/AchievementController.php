<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AchievementController extends Controller
{
    /**
    *   公司业绩页面
    */
    public function getIndex()
    {

        //查询数据库
        $data = DB::table('banner')->get();
        $res = DB::table('achievement')->get();
        $lianxi = DB::table('lianxi')->first();

        // 返回视图,分配数据
        return view('/home/achievement/index',['data'=>$data,'res'=>$res,'lianxi'=>$lianxi]);
    }

}
