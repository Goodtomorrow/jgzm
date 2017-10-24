<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class PassController extends Controller
{
    /*
        修改密码列表页
    */
    public function getIndex()
    {
        //修改密码方法
        return view('/admin/pass/index');
    }
     /*
        修改密码的方法
    */
    public function postUpdate(Request $request)
    {   
        //获取新密码
        $newpassword= $request -> input('newpassword');

        //获取id修改密码的id号
        $id = $request -> input('id');

        //自动表单验证
        $this->validate($request, [
              'oldpassword' => 'required',
              'newpassword' => ' required',
              'cpassword' => 'required|same:newpassword'            
        ], [
              'oldpassword.required' => '请输入您的密码',
              'newpassword.required' => '请输入您的新密码',
              'cpassword.required' => '请输入确认密码',
               'same' => '两次密码不一致'
        ]); 

        //检测密码是否是登录密码
        $m = DB::table('user') ->where('password',$request ->input('oldpassword'))-> first();

        //判断
        if(!empty($m)){
                
            //如果不为空，修改密码
            $res = DB::table('user')->where('id',$id)->update(['password'=>$newpassword]);

        // 判断
        if($res)
        {
            // 如果修改成功 返回登录页面
            return redirect('/admin/login/index') -> with('success', '修改成功');
        }else{
            // 如果修改失败 返回
            return back() -> with('error', '修改失败');
        }
    }else{
            // 如果修改失败 返回
            return back()->with('error','原密码错误');
        }
    }
}
