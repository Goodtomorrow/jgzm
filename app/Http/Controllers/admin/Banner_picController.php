<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class Banner_picController extends Controller
{
    /**
    *  导航banner控制器
    */
    public function getAdd()
    {
        if(empty(session('adminid')))
        {
            // 没有进行登录操作，去登录
            return redirect('/admin/login/index');
        }else{
            // 展现添加视图
            return view('/admin/banner_pic/add');
        }    
    }

    public function postInsert(Request $request)
    {
        // 获取请求参数
        $arr = $request->only('image1','image2','image3','image4','image5');

        //对图片进行处理
        foreach($arr as $k => $v)
        {   
            // 判断是否有文件上传
            if ($request -> hasFile($k)) 
            {   
                // 如果有文件上传,获取文件名后缀
                $houzhui = $request -> file($k) -> getClientOriginalExtension();
                
                // 获取文件名
                $temp_name = time().rand(10000,999999);
                
                // 拼接上传的文件
                $image = $temp_name.'.'.$houzhui;
                
                // 图片名称两边相等
                $arr[$k] = $image;
                
                // 将文件移动到指定的文件夹中  
                $request -> file($k) -> move('./admin/images/uploads/kindeditor/shop/image/daohangtu',$image);
            }
        }

        // 获取添加时间
        $arr['time'] = date('Y-m-d H:i:s',time());

        // 插入数据库
        $res = DB::table('daohangtu') -> insert($arr);
        
        // 判断是否插入成功
        if($res)
        {   
            // 如果插入成功,则跳转到列表页，并提示添加成功
            return redirect('/admin/banner_pic/index') -> with('success','添加成功');
        }else{
            // 如果插入失败,则返回列表页，并提示添加失败
            return back()->with('error','添加失败');
        }
    }

    
    /**
    *   列表页方法
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
            $data = DB::table('daohangtu') -> select() -> paginate($count);
        }else
        {  
            // 如果不为空,按照搜索的关键字查询分页
            $data = DB::table('daohangtu') -> where('time','like','%'.$search.'%') -> select() -> paginate($count);
        }
        
        // 解析模板，并且分配数据
        return view('admin/banner_pic/index',['data'=>$data,'request' => $request -> all()]);
    }

    /**
    *   商品修改的方法
    */
    public function getEdit($id)
    {
        // 查询一条以id值为条件的一条的信息
        $res = DB::table('daohangtu') -> where('id',$id) -> first();

        // 解析模板，并且分配数据
        return view('admin/banner_pic/edit',['res'=>$res]);
    }

    /**
    *   导航图修改操作
    */
    public function postUpdate(Request $request){

        // 获取请求
        $arr = $request -> except('_token'); 

        //对图片进行处理   
        foreach($arr as $k => $v)
        {   
            // 判断是否有文件上传
            if ($request -> hasFile($k)) 
            {   
                // 如果有文件上传,获取文件名后缀
                $houzhui = $request -> file($k) -> getClientOriginalExtension();
                
                // 获取文件名
                $temp_name = time().rand(10000,999999);
                
                // 拼接上传的文件
                $image = $temp_name.'.'.$houzhui;
                
                // 图片名称两边相等
                $arr[$k] = $image;
                
                // 将文件移动到指定的文件夹中  
                $request -> file($k) -> move('./admin/images/uploads/kindeditor/shop/image/daohangtu',$image);
            }
        }

        // 获取添加时间
        $arr['time'] = date('Y-m-d H:i:s',time());

        // 利用id查询出来一条信息
        $xx = DB::table('daohangtu')->where('id',$arr['id'])->update($arr);

        // 判断修改是否成功
        if($xx){

            // 修改成功
            return redirect('/admin/banner_pic/index')->with('success','修改成功');
        }else{
            // 修改不成功
            return back()->with('error','修改失败');
        }
    }
}
