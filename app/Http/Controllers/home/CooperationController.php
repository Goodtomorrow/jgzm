<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CooperationController extends Controller
{
    /**
     *  战略合作页面
     */
    public function getIndex()
    {

        //查询数据库
        $data = DB::table('banner')->get();
        $res = DB::table('cooperation')->get();
        
        // 返回视图,分配数据
        return view('/home/cooperation/index',['data'=>$data,'res'=>$res]);
    }

}
