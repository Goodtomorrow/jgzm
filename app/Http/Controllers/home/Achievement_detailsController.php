<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class Achievement_detailsController extends Controller
{
    /**
     * 战略合作详情页面
     */
    public function getIndex($id)
    {   
        //查询数据库
        $data = DB::table('banner')->get();
        $res = DB::table('achievement')->where('id',$id)->first();

        // 返回视图,分配数据
        return view('/home/achievement_details/index',['data'=>$data,'res'=>$res]);
    }
}