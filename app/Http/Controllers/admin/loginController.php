<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class loginController extends Controller
{

    //后台登录的方法
    public function getIndex()
    {
        return view('/admin/login/index');
    }

    //处理后台登录的方法
    public function postDologin(Request $request){

        // $data = $request -> all();
        // dd($data);die;

         // 查询数据库字段
        $s = DB::table('user')->where('username',$request ->input('username'))->where('password',$request ->input('password'))->first();
        

        $log = ['username' => '用户名输入错误','password'=>'密码输入错误','code'=>'验证码输入错误'];

         //判断验证码是否正确
        if(session('code') != $request ->input('code')){

        	// 否则 从哪来回哪去
            return view('/admin/login/index',['log'=>$log]);
        }	

        // 判断
        if($s){   
            // session 简便用法
            session(['adminusername' => $s['username'],'adminid' => $s['id'],'adminpassword' =>$s['password']]);

            // 成功跳转到主页
            return redirect('/admin/index')->with('success', '尊敬的86K纯帅管理员先森,欢迎您回来!');
        }else 
        {
            // 否则 从哪来回哪去
            return view('/admin/login/index',['log'=>$log]);
        }
     }

    public function getOut(Request $request)
    {
        $request->session()->forget('adminid');
       
        return redirect('/admin/login/index');
    }
}