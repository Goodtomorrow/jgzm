<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class About_usController extends Controller
{
    /**
     *  关于我们控制器
     */
    public function getIndex($id="")
    {
        
        // 查询数据库
        $data = DB::table('about_us')->first();
        $image1 = DB::table('daohangtu')->first();
        $cate = DB::table('cate')->get();
        $lianxi = DB::table('lianxi')->first();

        // 分配数据,返回视图
        return view('/home/about_us/index',['image1'=>$image1,'data'=>$data,'cate'=>$cate,'lianxi'=>$lianxi]);
    }
}
