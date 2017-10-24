<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CateController;
use DB;
use Config;

class ProductController extends Controller
{
    /**
    *       产品展示页
    */
    public function getIndex()
    {
        //  判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('home/home/weihu');
        }
        
        //  引入控制器，控制器是一个类,可用于调用静态方法,用于查看分类及分类下边的子类的全部信息
        $data = CateController::getCateId(0);

        //  查询所有的产品
        $arr = DB::table('product') -> join('cate','cate.id','=','product.cateid')->select('product.*')->orderBy('id','desc')->Paginate(12);

        //  返回视图
        return view('/home/product/index',['data'=>$data,'arr'=>$arr]);
    }

    public function postZhanshi(Request $request)
    {
        
        // 获取ajax传来的id号
        $id = $request->input('id');

        // 根据传来的id查询数据库
        $s = DB::table('cate')->where('id',$id)->first();

        // 查询分类下的商品
        // $arr = DB::table('cate')->join('product','cate.id','=','product.cateid')->select('product.*')->get();
        // dd($arr);

        // 获取分类的名称
        $cate_name = $s['cate_name'];
        
        // 查看当前分类是否为子类
        $res = DB::table('cate')->where('fid',$s['id'])->get();

        // 判断父类下有没有子类
        if(empty($res)){

            // 没有子类区间，查询分类下有没有产品
            if($arr){

                // 查询分类下有没有商品
                $data = DB::table('cate')-> join('product','cate.id','=','product.cateid')->where('product.cateid',$id)->select('cate.id','product.*')->get();
                $data['cate_name'] = $cate_name;
                return $data;
            }else{

                // 没有返回空
                return $cate_name;
            }
        }else{

            // 如果有子类，查询出子类所有的商品
            $data = DB::table('cate')->join('product','cate.id','=','product.cateid')->where('cate.fid',$id)->select('product.*')->get();
            $data['cate_name'] = $cate_name;

            // 返回$data
            return $data;
        }
    }

    // 接收顶级分类下子类的id号
    public function postZhanshi2(Request $request)
    {
        
        // 获取ajax传来的id号
        $id = $request->input('id');

        // 根据传来的id查询数据库
        $ss = DB::table('cate')->where('id',$id)->first();
        // dd($ss);

        // 获取分类的名称
        $cate_name2 = $ss['cate_name'];

        // 查看当前分类下是否为子类
        $res = DB::table('cate')->where('fid',$ss['id'])->get();
        
        // 判断父类下有没有子类
        if(empty($res)){

            // 没有，查询相应分类下的产品
            $data = DB::table('cate')-> join('product','cate.id','=','product.cateid')->where('product.cateid',$id)->select('cate.id','product.*')->get();
            $data['cate_name'] = $cate_name2;

            // 返回data
            return $data;
        }else{

            // 有，说明有子类，返回空
            return '';
        }
    }
}