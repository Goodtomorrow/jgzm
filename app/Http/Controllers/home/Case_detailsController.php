<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\Case_cateController;
use DB;
use Config;

class Case_detailsController extends Controller
{
    /**
     * 案例展示详情页面
     */
    public function getIndex($id)
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }

        // dd($id);
        $res = Case_cateController::getCasecateId(0);
        // dd($res);

        //查询数据库
        $data = DB::table('case')->where('id',$id)->first();
        // dd($data);

        // 查询案例展示所属的分类
        $s = DB::table('case')->join('case_cate','case_cate.id','=','case.cid')->where('case.id',$id)->select('case_cate.cname')->first();

        // 返回视图,分配数据
        return view('/home/case_details/index',['data'=>$data,'res'=>$res,'s'=>$s]);
    }
}
