<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// use iscms\Alisms\SendsmsPusher as Sms;

//阿里短信推送接口
// use Dankal\DkAlidayu\AlidayuSms;

class AlidayuController extends Controller
{
	//阿里大于短信接口
    public function getIndex(Request $request){
    $mobile = $request->input('mobile');
    echo $mobile;die;
    $c = new TopClient;
	$c ->appkey = $appkey ;
	$c ->secretKey = $secret ;
	$req = new AlibabaAliqinFcSmsNumSendRequest;
	$req ->setExtend( "" );
	$req ->setSmsType( "normal" );
	$req ->setSmsFreeSignName( "" );
	$req ->setSmsParam( "" );
	$req ->setRecNum( "13000000000" );
	$req ->setSmsTemplateCode( "" );
	$resp = $c ->execute( $req );
    }
}