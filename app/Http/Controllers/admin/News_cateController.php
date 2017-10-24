<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

/**
*分类添加控制器
*/
class News_CateController extends Controller
{
  
    /**
    *   封装一个方法：用于遍历数组，之后显示在前台页面
    */
    static public function getNewsId($fid){

        $data = DB::table('news_cate') -> where('fid',$fid) -> get();

        //定义一个空数组
        $arr = array();
        
        // 遍历数组
        foreach($data as $k => $v)
        {
            //通过插入一个以sub为下标，值为数据信息的多维数组，查出name值 然后进行递归循环
            $v['sub'] = self::getNewsId($v['id']);
            $arr[] = $v;
        }

        // 遍历数组
        return $arr;
    }

    /*
        封装一个分类的方法，方便多次使用
    */
    static public function getCate(){

        $data = DB::table('news_cate') -> select(DB::raw("*,concat(path,',',id) as paths")) -> orderby('paths') -> get();

        foreach($data as $k => $v){

            // 查询路径中逗号出现的次数
            $l = substr_count($v['path'],',');

            // 通过逗号出现的次数来添加，添加等级关系
            $cate_name[$k]['name'] = str_repeat('|--',$l).'name';
        }

        // 返回到分类信息
        return $data;
    }    


    // 分类添加的方法
    public function getAdd($id='')
    {
        // dd($id);
        //判断用户是否登录
        if(empty(session('adminid')))
        {
            return view('/admin/login/index');
        }

        // 返回分类添加视图
        return view('/admin/news_cate/add',['data'=>self::getCate(),'id'=>$id]);
    }


    public function postInsert(Request $request)
    {

        // 表单自动验证
        $this -> validate($request,[
                'name' => 'required',
        ],[
                'name.required' => '请填写分类名称',
        ]); 

        // 处理path   路径  =  父类的path + 父类的id
        // $arr = $request -> only(['cate_name','fid','image']);
        $arr = $request -> only(['name','fid']);

        // 设置时间
        $arr['time'] = date('Y-m-d H:i:s',time());

        // 获取父类的id
        $fid = $request -> input('fid');

        //判断父类id是否为0  
        if($fid == 0)
        {
            // 如果fid为0,则路径也为0
            $arr['path'] = 0;
        }else{
            
            // 否则查询一条信息
            $res = DB::table('news_cate')->where('id',$fid)->first();
            
            // 如果fid不为0,则证明是子类，需要拼接路径,拼接子类的路径为：父类的id+父类的路径[这里的父类路径指的就是0]
            $arr['path'] = $res['path'].','.$res['id'];
        }
        
        // 将数据插入到分类表中
        $s = DB::table('news_cate') -> insert($arr);
        
        // 判断插入是否成功
        if($s)
        {  
            // 如果插入成功，则跳转到index页面 并提示跳转成功
            return redirect('/admin/news_cate/index') -> with('success','添加成功');
        }else
        {
            // 如果插入失败，则返回 并提示跳转失败
            return back() -> with('error','添加失败');
        }
    }
   

    /**
    *   分类列表页的方法
    */
    public function getIndex(Request $request)
    {

        // 接受搜索的信息：有就是获取，没有就是设置
        $count = $request -> input('count',5);

        // 接受搜索的关键字
        $search = $request -> input('search');

        // 判断搜索是否为空
        if(empty($search))
        {
            //如果为空，则以正常查询排序并且分页 
            $data = DB::table('news_cate') -> select(DB::raw("*,concat(path,',',id) as paths")) -> orderBy('paths') -> paginate($count);
        }else
        {  
            // 如果搜索不为空，则以cname为搜索条件的结果查询并且分页   
            // 实例：$users = DB::table('users')->paginate(15);      paginate($count);
            $data = DB::table('news_cate') -> where('name','like','%'.$search.'%') -> select(DB::raw("*,concat(path,',',id) as paths")) -> orderBy('paths') -> paginate($count);
        }

        //解析模板并分配数据
        return view('admin/news_cate/index',['data'=>$data,'request' => $request -> all()]);
    }

    /**
    *   删除分类的方法
    */
    public function getDelete($id)
    {
        
        // 查询出来的是否是fid
        $data = DB::table('news_cate')->where('fid',$id)->get();
   
        //判断
        if($data){

            // 是父类不能删除
            return back()->with('error','当前类别有子类，不能删除');
        }else{

            $res1 = DB::table('news_cate')->where('id',$id)->delete();
            $res2 = DB::table('news')->where('nid',$id)->delete();
            // dd($res2);

            //判断是否删除成功
            if($res1 && $res2){

                // 删除成功
                return redirect('/admin/news_cate/index')->with('success','删除成功');
            }else{

                // 删除失败
                return back()->with('success','删除成功');
            }
        }
    }

    /**
    *修改分类的方法
    */
    public function getEdit($id)
    {
        // 查询传来id的信息
       $res = DB::table('news_cate')->where('id',$id)->first();
       // dd($res);

       return view('/admin/news_cate/edit',['data'=>self::getCate(),'res'=>$res]);
    }

    /**
    *  接收修改的信息
    */
    public function postUpdate(Request $request){

        // 获取request请求
        $arr = $request -> except('_token');

        // 获取分类的名称
        $name = $arr['name'];

        // 获取fid的值
        $fid = $arr['fid'];

        // 获取本次的id值
        $id = $arr['id'];

        // 修改的时间
        $arr['time'] = date('Y-m-d H:i:s',time()); 

        // 判断fid等于0
        if($fid == 0){

            // 父id为0时，路径为0
            $arr['path'] = 0;
        }else{

            $s = DB::table('news_cate')->where('id',$fid)->first();
            // dd($s['path']);

            $arr['path'] = $s['path'].','.$s['id'];
        }

        //判断传来的id是否等于fid
        $res2 = DB::table('news_cate')->where('fid',$id)->first(); 

        if($res2){

            // 如果是父类，不允许修改
            return back()->with('error','父类不能被修改');
        }else{

            // 如果不是父类，允许修改
            $res3 = DB::table('news_cate')->where('id',$id)->update($arr);

            // 判断修改是否成功
            if($res3){

                // 修改成功
                return redirect('/admin/news_cate/index')->with('success','修改成功');
            }else{

                // 修改失败
                return back()->with('error','修改失败');
            }
        }
    }

}
