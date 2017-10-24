<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\News_cateController;
use DB;
use Config;

class News_detailsController extends Controller
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
        $res = News_cateController::getNewsId(0);

        //查询数据库
        $data = DB::table('news')->where('id',$id)->first();
        // dd($data);

        // 查询案例展示所属的分类
        $name = DB::table('news')->join('news_cate','news_cate.id','=','news.nid')->where('news.id',$id)->select('news_cate.name','news_cate.id')->first();

        // 返回视图,分配数据
        return view('/home/news_details/index',['data'=>$data,'res'=>$res,'name'=>$name]);
    }
}
