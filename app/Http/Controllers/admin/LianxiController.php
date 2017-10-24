<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class lianxiController extends Controller
{
    /**
     *  联系我们列表页
     */
    public function getIndex()
    {
        // 查询数据库
        $data = DB::table('lianxi')->first();

        // 分配数据，展示模板
        return view('/admin/lianxi/index',['data'=>$data]);
    }

    /**
    *   修改操作方法
    */
    public function postUpdate(Request $request)
    {
        //  接收数据
        $data1 = $request -> except('_token');
        
        //  进行修改操作
        $res = DB::table('lianxi')->where('id',$data1['id'])->update($data1);

        // 判断
        if($res){

            // 修改成功区间
            return redirect('/admin/lianxi/index')->with('success','修改成功');
        }else{

            // 修改失败区间
            return back()->with('error','修改失败');
        }
    }
}
