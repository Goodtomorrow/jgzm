<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class about_usController extends Controller
{
    /**
     * 公司简介添加页
     */
    public function getAdd()
    {
        //返回视图列表页
        return view('/admin/about_us/add');
    }

    /**
     * 公司简介添加操作
     */
    public function postInsert(Request $request)
    {
        // stripcslashes
        
        // 表单自动验证
        $this -> validate($request,[
                'image' => 'required',
                'content' => 'required',
        ],[
                'image.required' => '请填写公司简介图片',
                'content.required' => '请填写公司简介内容',
        ]); 

        // 获取除了token值以外的数据
        $data = $request->only('image');
        // dd($data);

        $content = $request->only('content');

        $data['content'] =strip_tags($content['content']);
        
        if($data['content']){
            preg_replace("/\r\n/",'',$data['content']);
        }

        // dd($data['content']);die;

        // 插入时自动添加一个编号  rand()里面不能嵌套time()
        $data['time'] = date('Y-m-d H:i:s',time());

        //对图片进行处理
        foreach($data as $k => $v)
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
                $data[$k] = $image;
                
                // 将文件移动到指定的文件夹中  
                $request -> file($k) -> move('./admin/images/uploads/kindeditor/shop/image/about_us',$image);
            }
        }
        
        // 插入数据库
        $res = DB::table('about_us') -> insert($data);

        // 判断是否插入成功
        if($res)
        {   
            // 如果插入成功,则跳转到列表页，并提示添加成功
            return redirect('/admin/about_us/index') -> with('success','添加成功');
        }else{
            // 如果插入失败,则返回列表页，并提示添加失败
            return back() -> with('error','添加失败');
        }
    }

    /**
    *   公司简介列表
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
            $data = DB::table('about_us') -> select() -> paginate($count);
        }else
        {  
            // 如果不为空,按照搜索的关键字查询分页
            $data = DB::table('about_us') -> where('title','like','%'.$search.'%') -> select() -> paginate($count);
        }
        
        // 解析模板，并且分配数据
        return view('admin/about_us/index',['data'=>$data,'request' => $request -> all()]);
    }

    /**
    *   公司简介删除操作
    */
    public function getDelete($id){
        
        // 删除所选的数据
        $xw = DB::table('about_us')->where('id',$id)->delete();

        // 判断删除是否成功
        if($xw){

            // 成功
            return redirect('/admin/about_us/index')->with('success','删除成功');
        }else{

            // 失败
            return back()->with('error','删除失败');
        }
    }

    /**
    *   公司简介修改页面
    */
    public function getEdit($id){

        // 查询一条数据
        $data = DB::table('about_us')->where('id',$id)->first();
        
        // 返回视图并分配数据
        return view('/admin/about_us/edit',['data'=>$data,'id'=>$id]);
    }

    /**
    *  公司简介修改操作
    */
    public function postUpdate(Request $request)
    {   
        // 获取请求值，除了token
        $data = $request -> except('_token');

        $data['content'] =strip_tags($data['content']);
        
        if($data['content']){
            preg_replace("/\r\n/",'',$data['content']);
        }
        
        // 获取指定的id
        $id = $request->get('id');

        // 写入修改时间
        $data['time'] = date('Y-m-d H:i:s',time());

        // 遍历数组
        foreach($data as $k => $v)
        {     
            // 判断是否有文件上传
            if ($request -> hasFile($k)) 
            {
                // 获取文件名后缀
                $houzhui = $request -> file($k) -> getClientOriginalExtension();

                // 获取文件名
                $temp_name = time().rand(10000,999999);

                // 拼接上传的文件
                $image = $temp_name.'.'.$houzhui;

                // 商品图片的名字两边相等
                $data[$k] = $image;
                
                // 将文件移动到指定的文件夹中  
                $request -> file($k) -> move('./admin/images/uploads//kindeditor/shop/image/about_us',$image);
             }
        }
        // 修改以id的值查询条件为信息的数据
        $res = DB::table('about_us') -> where('id',$id) -> update($data);

        // 判断修改是否成功
        if($res)
        {   
            // 如果修改成功，则跳转到列表页，并提示添加成功
            return redirect('/admin/about_us/index') -> with('success','修改成功');

        }else{
            // 如果修改失败，则返回到列表页，并提示添加失败
            return back() -> with('error','修改失败');
        }
    }
}
