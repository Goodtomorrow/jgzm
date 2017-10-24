<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class Hexin_detailsController extends Controller
{
    /**
     *  核心团队详情页面
     */
    public function getIndex($id="")
    {
        //查询数据库
        $xq = DB::table('hexin')->where('id',$id)->first();
        $image1 = DB::table('daohangtu')->first();
        $cate = DB::table('cate')->get();
        $lianxi = DB::table('lianxi')->first();

        // 返回视图
        return view('/home/hexin_details/index',['xq'=>$xq,'image1'=>$image1,'cate'=>$cate,'lianxi'=>$lianxi]);
    }
}
