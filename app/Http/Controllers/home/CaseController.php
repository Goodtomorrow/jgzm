<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Config;

class CaseController extends Controller
{
    /**
    *   案例展示页
    */
    public function getIndex()
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('home/home/weihu');
        }   

        // 查询所有的分类
        $arr = DB::table('case_cate')->get();

        // 查询所有的案例
        $data = DB::table('case_cate')->join('case','case_cate.id','=','case.cid')->select('case.*')->orderBy('id','desc')->Paginate(8);
        $data->setPath('/home/case/index');

        // 返回视图，并分配数据
        return view('/home/case/index',['arr'=>$arr,'data'=>$data]);
    }

    /**
    *   案例点击事件获取方法
    */
    public function postGetid(Request $request)
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('home/home/weihu');
        }   

        // 查询所有的分类
        $id = $request->input('cid');

        // 查询所有的案例
        $data = DB::table('case')->join('case_cate','case_cate.id','=','case.cid')->where('cid',$id)->select('case.*','case_cate.cname')->orderBy('id','desc')->get();

        // 查询点击的案例分类
        $cname = DB::table('case_cate')->where('id',$id)->first();

        // 将查询到所有案例放进$data['children']
        $data['children'] = $data;

        // 将查询到的案例分类放到$data的cname中
        $data['cname'] = $cname['cname'];

        // 判断返回值
        if($data){

            // 返回值成功区间
            return $data;
        }else{

            // 返回值失败区间
            return '2';
        }
    }
}