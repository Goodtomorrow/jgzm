<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Config;
use DB;
use Hash;

class LoginController extends Controller
{
    /*
        前台登录页面
    */
    public function getIndex()
    {
        //判断网站是否开启
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }
        return view('/home/reg/login');
    }

    public function postDologin(Request $request){

        //接受请求的参数
        $email = $request ->input('email');
        $password = $request ->input('password');

        //查询数据库,和数据里面的用户名进行比对
        $res = DB::table('user') -> where('email',$email) -> orwhere('phone',$email) -> first();
        // dd($res);

        //验证密码
        $s = Hash::check($password,$res['password']);

        //验证不正确
        $m = ['uname'=>'邮箱或手机号输入不正确','password'=>'密码输入不正确'];

        //判断
        if($res && $s){

            //查询数据库
            $ss = DB::table('user')->where('id',$res['id'])-> first();

            //将用户名称存入session
            if(!empty($ss['email'])){
                session(['username'=>$ss['email'],'id'=>$ss['id']]); 
            }else{
                echo '';
            }

            if(!empty($ss['phone'])){
                 session(['username'=>$ss['phone'],'id'=>$ss['id']]);
            }else{
                echo '';
            }
              
            //匹配成功，进入主页
            return redirect('/home/index/index');
        }else{
            return view('/home/login/dologin',['m'=>$m]);
        }
    }

    public function getOut(Request $request){

        //退出清除session
        $request->session()->forget('id'); 
        $request->session()->forget('username'); 

        //返回视图
        return redirect('/home/login/index'); 
    } 
}
