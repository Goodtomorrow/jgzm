<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Config;

class NewsController extends Controller
{
    /**
     *  新闻中心页面
     */
    public function getIndex()
    {   
        // 判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }
        // 查询数据库
        $cate = DB::table('news_cate')->get();

        $news = DB::table('news')->orderBy('id','desc')->Paginate(5);

        // 返回视图,分配数据
        return view('/home/news/index',['cate'=>$cate,'news'=>$news]);
    }



    /**
    *   新闻点击事件获取方法
    */
    public function postGetid(Request $request)
    {
        // 获取新闻分类的id
        $id = $request->input('nid');
        
        // 查询新闻详情
        $data = DB::table('news')->join('news_cate','news_cate.id','=','news.nid')->where('nid',$id)->select('news.*')->orderBy('id','desc')->get();
        // dd($data);

        // 查询新闻分类的名称
        $name = DB::table('news_cate')->where('id',$id)->first();

        // 将新闻详情放入数组中
        $data['info'] = $data;

        // 将新闻分类的名称放入数组中
        $data['name'] = $name['name'];

        // 判断查询是否成功
        if($data){

            // 成功区间
            return $data;
        }else{

            // 失败区间
            return 2;
        }
   }

   public function getFanhui($id)
   {
        // 判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }

        // 查询数据库
        $news = DB::table('news_cate')->join('news','news_cate.id','=','news.nid')->where('nid',$id)->select('news.*')->orderBy('id','desc')->get();
        $cate = DB::table('news_cate')->get();
        $cate2 = DB::table('news_cate')->where('id',$id)->first();
        // dd($cate['name']);

        // 返回视图,分配数据
        return view('/home/news/Fanhui',['cate'=>$cate,'news'=>$news,'cate2'=>$cate2]);
   }
}
