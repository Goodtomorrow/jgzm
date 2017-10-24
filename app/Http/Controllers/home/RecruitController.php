<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Config;

class RecruitController extends Controller
{
    /**
     *  招贤纳士页面
     */
    public function getIndex()
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }

        //查询数据库
        $data = DB::table('banner')->get();
        $res1 = DB::table('sociology')->first();
        $res2 = DB::table('campus')->first();
        
        // 返回视图,分配数据
        return view('/home/recruit/index',['data'=>$data,'res1'=>$res1,'res2'=>$res2]);
    }
}