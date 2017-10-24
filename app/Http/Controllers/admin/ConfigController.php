<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Config;

class ConfigController extends Controller
{

    /*
        网站配置信息
    */
    public function getIndex()
    {
        //判断用户是否登录
        if(empty(session('adminid')))
        {
            return view('/admin/login/index');
        }
        
        //获取配置信息
        return view('admin/config/index');
    }

    /*
        修改网站配置文件
    */
    public function postUpdate(Request $request)
    {
        //修改配置
       $data = $request -> except('_token');

        //编辑上传文件
        if($request->hasFile('logo'))
        {
             
            //获取后缀名
            $lastname = $request -> file('logo') ->getClientOriginalExtension();

            //拼接文件名
            $filename = time().rand(1000000,9999999).'.'.$lastname;
           
            //将上传后的文件存放
            $request->file('logo')->move('./admin/images/uploads/', $filename);
           
        }

        //将接收到的数据遍历写入配置
        foreach($data as $k => $v)
        {
            //获取配置文件
            $file = file_get_contents('../config/app.php');

            //替换要修改的值
            $res = str_replace(Config::get('app.'.$k), $v, $file);

            //判断是否有文件上传
            if($k == 'logo' && !empty($v))
            {
                //替换要修改的值
                $res = str_replace(Config::get('app.logo'), $filename, $file);
            }

            //将修改后的文件写入配置并获取返回值
            $result = file_put_contents('../config/app.php', $res);

       }

        //判断编辑结果
        if($result)
        {
            //成功返回详情页
            return redirect('/admin/config/index') -> with('success', '编辑成功'); 
        }else
        {
            //失败返回上一步
            return back() -> with('error', '编辑失败');
        }
    }
}