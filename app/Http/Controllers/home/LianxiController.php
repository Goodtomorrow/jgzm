<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LianxiController extends Controller
{
    /**
     *  联系我们控制器
     */
    public function getIndex()
    {   
        
        // 查询数据库
        $lianxi = DB::table('lianxi')->first();

        //返回视图
        return view('/home/lianxi/index',['lianxi'=>$lianxi]);
    }

    public function postTijiao(Request $request)
    {   

        // 查询数据库
        $lianxi = DB::table('lianxi')->first();

        // 获取数据
        $data = $request->except('_token');
        // dd($data);/
        
        
        // 插入时间
        $data['createtime'] = date('Y-m-d: H:i:s',time());

        // 插入数据库
        $res = DB::table('liuyan')->insert($data);

        // 判断插入是否成功
        if($res){

            //  插入成功
            return view('/home/lianxi/index',['lianxi'=>$lianxi]);
        
        }else{
            return back();
        }
    }
}
