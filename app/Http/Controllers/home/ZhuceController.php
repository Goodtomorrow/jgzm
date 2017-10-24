<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redis as Redis;  

/**
*   导入阿里大于接口
*/
use iscms\Alisms\SendsmsPusher as Sms;

use Config;
use Hash;
use DB;
use Mail;

class ZhuceController extends Controller
{

    /*
        前台注册页面
    */
    public function getIndex()
    {
        //判断网站状态
        if(Config::get('app.SWITCH') == 'guan'){
            return view('/home/home/weihu');
        }
        return view('/home/reg/zhuce');
    }
    
 
    /*
        前台发送邮件的方法
    */
    public function postEmail(Request $request){
        
        //错误提醒信息
        $log = ['scode'=>'验证码错误','password'=>'两次输入的密码不一致','email'=>'邮箱格式不正确'];

        //判断验证码是否正确
         if(session('code') != $request ->input('code')){
            return view('/home/reg/zhuce',['log' => $log]);
        }

        //获取请求参数
        $s = $request ->only('password','repassword','email');

        //判断两次密码是否一致
        if($s['password'] != $s['repassword']){
            return view('/home/reg/zhuce',['log' => $log]);
        }

        $arr['email'] = $s['email'];
        $arr['password'] = Hash::make($s['password']);
        $arr['token'] =  str_random(50);
        $arr['creatTime'] = date('Y-m-d H:i:s',time());

        //把数据插入数据库
        $id = DB::table('user') -> insertGetid($arr);

        //判断如果添加成功，就发送邮件
        if($id > 0){
                self::maito($arr['email'],$id,$arr['token']);
                
        }
        //发送邮箱的模版
        return view('/home/email/tishimessage');
    }

    /*
        把邮件发送的方法封装成静态方法
    */
    static public function maito($email,$id,$token)
    { 
        // 要发送一条信息，使用Mail类的send方法。send方法接收三个参数。第一个参数是包含邮件信息的视图【模板】名称；第二个参数是你想要传递到该视图的数组数据；第三个参数是接收消息实例的闭包回调
        Mail::send('home.email.index', ['id' => $id,'token'=>$token,'email'=>$email], function ($m) use ($email)
        {
          $m->to($email)->subject('请尽快注册邮件!!');
        });
    }


    /*
        激活邮箱的方法
    */
    public function getJihuo(Request $request){

        //获取id和token值
        $s = $request -> only(['id','token']);
        
        //定义一个状态为2
        $arr['status'] = 2;

        //修改数据

        $res = DB::table('user')->where('id',$s['id'])->where('token',$s['token'])->update($arr);

        //判断修改是否成功
        if($res){
            //如果修改成功，跳转到成功页面模版
            return view('/home/email/success');
        }else{
              //如果修改失败，跳转到失败页面模版
            return view('/home/email/error');
        }
    }


    // 构造方法
    public function __construct(Sms $sms)
    {
       $this->sms = $sms;
    }

    public $sms;

    // 阿里大于短信接口方法
    public function postAlidayu(Request $request)
    {

         // 用户手机号，接收验证码
        $phone = $request ->input('mobile');        

        // 短信签名,可以在阿里大鱼的管理中心看到
        $name = '王亚强';                          

        // 生成随机验证码
        $code = rand(100000, 999999);                

        $smsParams = ['code' => "$code",'name' => "$name"];

        // 转换成json格式的
        $content = json_encode($smsParams);         

        // 阿里大于(鱼)短信模板ID
        $setSmsTemplateCode = "SMS_66390305";       

        // 存入session 后面做数据验证
        $request ->session()->put('phone_code',$code);  

        $result = $this->sms->send($phone,$name,$content,$setSmsTemplateCode);

        echo '<pre>';
            var_dump($result);
        echo '</pre>';

        echo "验证码：".session('phone_code').'<br/>';
        // exit;

        if(property_exists($result,'result'))
        {

            return 1;
            // 使用PHP函数json_encode方法将给定数组转化为JSON：
            $zhuanhua = ['ResultData' => '成功', 'info' => '已发送'];
            return json_encode($zhuanhua);

        }else{

            echo 2;
            // 使用PHP函数json_encode方法将给定数组转化为JSON：
            $zhuanhua = ['ResultData' => '失败', 'info' => '重复发送'];
            return json_encode($zhuanhua);
        }
    }

    // public function postTel(Request $request){

    //     //获取参数;
    //     $input = $request -> all();

    //     if(session('phone_code') != $request -> input('code')){
    //         return back() -> withInput() -> with('error','验证错误');
    //     }else{
    //         echo 2;
    //     }

        // echo '<pre>';
        //     var_dump($input);
        // echo '</pre>';  
    // }

    // public function getAlidayu(Request $request)
    // {
        
    //     // var_dump($input);die;
    //     $input = $request->all();

    //     // 判断该手机在10分钟内是否已经发过短信
    //     $exists = \Redis::exists('IT:STRING:USER:CODE:'.$input['mobile']);

    //     if($exists === true){
    //         return response()->json(['ResultData '=> '失败', 'info' => '重复发送']);
    //     }

    //     // 生成随机号码
    //     $num = rand(100000,999999);

    //     // 组装参数
    //     $smsParams = [
    //         'code'    => $num,
    //         'name' => 'VIP用户'
    //     ];

    //     // 需要参数
    //     // $phone = $input['tel'];
    //     $phone = $request -> input('mobile');
    //     $name = '注册验证';
    //     $content = json_encode($smsParams);
    //     $code = 'SMS_66390305';

    //     //  发送验证码方法
    //     $data = $this->sms->send($phone, $name, $content, $code);
    //     dd($data);

    //     // 检查对象是否具有 result 属性
    //     if(property_exists($data, 'result')){

    //          // 设置一个 60 秒过期的 Redis String 类型
    //         \Redis::sEtex('IT:STRING:USER:CODE:' . $phone, 600, $num);
    //         return response()->json(['ResultData' => '成功', 'info' => '已发送']);
    //     }else{
    //         return response()->json(['ResultData' => '失败', 'info' => '重复发送']);
    //     }
    // }
}
