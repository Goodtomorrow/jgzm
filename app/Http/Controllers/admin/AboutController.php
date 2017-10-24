<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

/**
*   关于润六控制器
*/
class AboutController extends Controller
{
    /**
    *   关于润六添加方法
    */
    public function getAdd()
    {   
        
        // 查询以拼接好的paths为字段名称的信息并排序，这样的信息可以保证层级关系
        $data = DB::table('cate') -> select(DB::raw("*,concat(path,',',id) as paths")) -> orderBy('paths') -> get();

        // 遍历查询的数据
        foreach($data as $k => $v)
        {
            //逗号 出现次数
            $l = substr_count($v['path'],',');

            //添加分类的层级关系  用|----表示
            $data[$k]['cate_name'] = str_repeat('|---',$l).$v['cate_name'];
        }

        //判断用户是否登录
        if(empty(session('adminid')))
        {
            // 没有进行登录操作，去登录
            return redirect('/admin/login/index');
        }else{

            // 展现添加视图
            return view('/admin/about/add',['data'=>$data]);
        }    
    }

    public function postInsert(Request $request)
    {

        // 表单自动验证
        $this -> validate($request,[
                'content' => 'required',
        ],[
                'content.required' => '亲,请填写内容',
        ]); 

        $arr = $request -> except('_token');     

        // 获取添加时间
        $arr['time'] = date('Y-m-d H:i:s',time());

        // 插入数据库
        $res = DB::table('about') -> insert($arr);
        
        // 判断是否插入成功
        if($res)
        {   
            // 如果插入成功,则跳转到列表页，并提示添加成功
            return redirect('/admin/about/index') -> with('success','添加成功');
        }else{
            // 如果插入失败,则返回列表页，并提示添加失败
            return back()->with('error','添加失败');
        }
    }

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
            $data = DB::table('about')->select() -> paginate($count);
        }else
        {  
            // 如果不为空,按照搜索的关键字查询分页
            $data = DB::table('about')->where('id','like','%'.$search.'%')->select()->paginate($count);
        }
        
        // 解析模板，并且分配数据
        return view('admin/about/index',['data'=>$data,'request'=>$request->all()]);
    }

    /*
        关于润六的删除方法
    */
    public function getDelete($id)
    {   
        // 删除一组以id值为线索的数据
        $res = DB::table('about') -> where('id',$id) -> delete();
        
        if($res)
        {   
            // 如果删除成功,则跳转到列表页,并提示删除成功
            return redirect('/admin/about/index') -> with('success','删除成功');
        }else{
            // 如果删除成功,则返回到列表页，并提示删除失败
            return back() -> with('error','删除失败');
        }
    }

    /**
    *   关于润六修改的方法
    */
    public function getEdit($id)
    {

         // 查询一组以paths为字段的数据信息并按路径排序
        $arr = DB::table('cate') -> select(DB::raw("*,concat(path,',',id) as paths")) -> orderBy('paths') -> get();
        
        // 遍历查询到的所有信息
        foreach($arr as $k=>$v)
        {
            // 查询逗号出现的次数
            $l = substr_count($v['path'],',');

            // 在每个分类的名称前添加|----，让层级关系更明显
            $arr[$k]['cate_name'] = str_repeat('|----',$l).$v['cate_name'];
        }


        // 查询一条以id值为条件的一条的信息
        $res = DB::table('about') -> where('id',$id) -> first();
        // dd($res);

        // 解析模板，并且分配数据
        return view('admin/about/edit',['res'=>$res,'arr'=>$arr,'id'=>$id]);
    }

    /**
    *   修改关于润六的操作
    */
    public function postUpdate(Request $request){

        // 获取请求
        $arr = $request -> except('_token'); 

        // 获取添加时间
        $arr['time'] = date('Y-m-d H:i:s',time());

        // 利用id查询出来一条信息
        $xx = DB::table('about')->where('id',$arr['id'])->update($arr);

        // 判断修改是否成功
        if($xx){

            // 修改成功
            return redirect('/admin/about/index')->with('success','修改成功');
        }else{
            // 修改不成功
            return back()->with('error','修改失败');
        }
    }

}


