<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CompanyController extends Controller
{
    /**
     *  公司简介页面
     */
    public function getIndex()
    {
        //查询数据库
        $res1 = DB::table('brief')->first();
        $res2 = DB::table('culture')->first();
        
        // 返回视图,分配数据
        return view('/home/company/index',['res1'=>$res1,'res2'=>$res2]);
    }
}
