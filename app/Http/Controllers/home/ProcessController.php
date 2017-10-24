<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Config;
class ProcessController extends Controller
{
    /**
     *  产品工艺页面
     */
    public function getIndex()
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }
        
        //查询数据库
        $data = DB::table('banner')->get();
        $res = DB::table('process')->get();
        
        // 返回视图,分配数据
        return view('/home/process/index',['data'=>$data,'res'=>$res]);
    }

}
