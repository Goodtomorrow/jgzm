<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CateController;
use DB;
use Config;

class product_detailsController extends Controller
{
    /**
     * 产品展示详情页面
     */
    public function getIndex($id)
    {
        //  判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }

        //  查询分类表
        $res = CateController::getCateId(0);

        //  查询数据库
        $data = DB::table('product')->where('id',$id)->first();

        //  关联查询,查询分类表和商品表
        $res2 = DB::table('cate')->join('product','product.cateid','=','cate.id')->where('cate.id',$data['cateid'])->select('cate.cate_name')->first();
        // dd($res2);

        // 返回视图,分配数据
        return view('/home/product_details/index',['data'=>$data,'res'=>$res,'res2'=>$res2,'id'=>$id]);
    }
}
