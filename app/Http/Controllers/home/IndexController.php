<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Config;
use DB;

class IndexController extends Controller
{
    /**
    *   前台加入收藏操作
    */
    public function getCollect(Request $request){

        // 获取当前url的路径
        $data['collect'] = $_SERVER['HTTP_REFERER'];

        // 给其分配一个cid
        $data['cid'] = rand(1,9999999);

        // 插入数据库
        $res = DB::table('Collection')->insert($data);

        // 判断
        if($res){

            // 插入数据库成功
            session(['cid'=>$data['cid']]);
            return back();
        }else{
            
            // 插入数据库失败
            return back();
        }
    }


    /**
    *   前台搜索操作
    */
    public function getYan(Request $request)
   {
        // 获取搜索参数
        $s = $request->only('num');

        // dd($s['num']);

        // 查找数据库    
        $res = DB::table('select')->where('name',$s['num'])->first();   

        // 判断
        if(!empty($s['num']))
        {   
            if($res['name'] == '首页'){
                echo '1';
                session(['search'=>'首页']);

            }elseif($res['name'] == '关于我们'){
                echo '2';
                session(['search'=>'关于我们']);

            }elseif($res['name'] == '新闻中心'){
                echo '3';
                session(['search'=>'新闻中心']);

            }elseif($res['name'] == '工程案例'){
                echo '4';
                session(['search'=>'工程案例']);

            }elseif($res['name'] == '互动沟通'){
                echo '5';
                session(['search'=>'互动沟通']);

            }elseif($res['name'] == '联系我们'){
                echo '6';
                session(['search'=>'联系我们']);
                
            }else{
                echo '8';
                session(['search'=>'']);
            }
        }else
        {
            echo '7';
            session(['search'=>'']);
        }
   }


    /**
    *    首页控制器方法
    */
    public function getIndex(Request $reuqest)
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('home/home/weihu');
        }
        
       $banner = DB::table('banner')->get();
        //  返回视图,并分配数据
        return view('/home/index',['banner'=>$banner]);
    }
}
