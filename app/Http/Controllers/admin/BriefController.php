<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class BriefController extends Controller
{
    /**
     * 公司概述列表页
     */
    public function getIndex()
    {
        // 查询数据库
        $data = DB::table('brief')->first();

        //返回视图列表页
        return view('/admin/brief/index',['data'=>$data]);
    }

    /**
     * 公司概述修改操作
     */
    public function postUpdate(Request $request){

    	// 获取请求
    	$data = $request->only('id');
        $content = $request->only('content');
        // dd($content['content']);

        $data['content'] = stripcslashes($content['content']);
        // dd($data['content']);

        if($data['content']){
            preg_replace("/\r\n/",'',$data['content']);
        }
        // dd($data['content']);

    	// 数据库进行修改操作
    	$res = DB::table('brief')->where('id',$data['id'])->update($data);

    	// 判断
    	if($res){

    		// 修改成功
    		return redirect('/admin/brief/index')->with('success','编辑成功');
    	}else{

    		// 修改失败
    		return back()->with('error','修改失败');
    	}
    }
}
