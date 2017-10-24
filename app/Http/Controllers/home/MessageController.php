<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Config;

class MessageController extends Controller
{
    /**
     *  联系我们列表页
     */
    public function getIndex()
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }
        // 查询数据库
        $data = DB::table('banner')->get();

        //返回视图
        return view('/home/message/index',['data'=>$data]);
    }

     /**
     *  联系我们提交操作
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
            echo '<script>alert("留言成功");window.location.href="http://www.fangfuzhidu.com/home/message/index";</script>';
            // return back();
        }else{

            //  插入失败区间
            echo '<script>alert("留言失败");window.location.href="http://www.fangfuzhidu.com/home/message/index";</script>';
            // return back();
        }
    }
}
