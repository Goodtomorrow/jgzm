<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    public function handle($request, Closure $next)
    {
        //request变量 记录所有的请求参数
      if($request->session()->has('id')){
            //通过session 来检测用户是否登录
            //进入下一层 请求
            return $next($request);
        }else{
            //跳转到指定的路由方法
            return redirect('/admin/login');
        }
    }
}