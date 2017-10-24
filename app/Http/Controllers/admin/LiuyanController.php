<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LiuyanController extends Controller
{
    /**
    *  留言板列表页
    */
    public function getIndex(Request $request)
    {
        //判断用户是否登录
        if(empty(session('adminid')))
        {
            return view('/admin/login/index');
        }
        
        // 获取请求的页数
        $count = $request -> input('count',5);
        
        // 获取搜索的关键字
        $search = $request -> input('search');

        // 判断搜索的关键字是否为空
        if(empty($search))
        {
            // 如果为空，查询并且分页
            $data = DB::table('liuyan') -> select() -> paginate($count);
        }else
        {  
            // 如果不为空,按照搜索的关键字查询分页
            $data = DB::table('liuyan') -> where('user','like','%'.$search.'%') -> select() -> paginate($count);
        }
        
        // 解析模板，并且分配数据
        return view('admin/liuyan/index',['data'=>$data,'request' => $request -> all()]);
    }

    /**
    *   删除操作
    */
    public function getDelete($id){

        // 删除所选数据
        $data = DB::table('liuyan')->where('id',$id)->delete();

        // 判断是否删除成功
        if($data){

            // 成功区间
            return redirect('/admin/liuyan/index')->with('success','删除成功');
        }else{

            // 失败区间
            return back()->with('error','删除失败');
        }
    }

    /**
    *  查看操作
    */
    public function getChakan($id)
    {   
        // 查看所选数据
        $data = DB::table('liuyan')->where('id',$id)->first();
        // dd($data);

        // 返回视图
        return view('/admin/liuyan/edit',['data'=>$data]);
    }
}
