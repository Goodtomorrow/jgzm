<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Config;

class LiuyanController extends Controller
{
    /**
     *  留言控制器
     */
    public function getIndex()
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }
        
        // 查询数据库
        $pic = DB::table('daohangtu')->first();

        $cate = DB::table('cate')->get();

        $lianxi = DB::table('lianxi')->first();

        //返回视图
        return view('/home/liuyan/index',['pic'=>$pic,'cate'=>$cate,'lianxi'=>$lianxi]);
    }

     /**
     *  在线留言提交操作
     */
    public function postInsert(Request $request)
    {
        // 获取参数
        $data = $request->only('user','tel','email','message_content');

        // 获取插入数据的时间
        $data['createtime'] = date('Y-m-d H:i:s',time());

        // 插入数据库
        $res = DB::table('message')->insert($data);

        // 判断
        if($res){

            //  插入成功区间
            echo '<script>alert("留言成功");window.location.href="http://www.jiananfangfu.com/home/liuyan/index";</script>';
            // return back();
        }else{

            //  插入失败区间
            echo '<script>alert("留言失败");window.location.href="http://www.jiananfangfu.com/home/liuyan/index";</script>';
            // return back();
        }
    }

}
