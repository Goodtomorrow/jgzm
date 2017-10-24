<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//入口路由
Route::get('/', function () {
    	return redirect('/home/index');
});

// 后台登录控制器
Route::controller('/admin/login','admin\LoginController');

// 返回后台主页
Route::get('/admin/index', function () 
{	
    //判断用户是否登录
    if(empty(session('adminid')))
    {
        return view('/admin/login/index');
    }
    return view('/admin/admin/index');
});

// 后台网站配置控制器
Route::controller('/admin/config','admin\ConfigController');

// 后台密码修改控制器
Route::controller('/admin/pass','admin\PassController');

// 后台轮播图控制器
Route::controller('/admin/banner','admin\BannerController');

// 后台公司概述控制器
Route::controller('/admin/brief','admin\BriefController');

// 后台企业文化控制器
Route::controller('/admin/culture','admin\CultureController');

// // 后台荣誉资质控制器
// Route::controller('/admin/rongyu','admin\RongyuController');

// // 后台公司新闻控制器
// Route::controller('/admin/news','admin\NewsController');

// 后台产品分类控制器
Route::controller('/admin/cate','admin\CateController');

// 后台产品控制器
// Route::controller('/admin/product','admin\ProductController');

// 后台产品分类控制器
Route::controller('/admin/news_cate','admin\News_cateController');

// 后台新闻控制器
Route::controller('/admin/news','admin\NewsController');

// 后台案例分类控制器
Route::controller('/admin/case_cate','admin\Case_cateController');

// 后台案例控制器
Route::controller('/admin/case','admin\CaseController');


// // 后台工程控制器
// Route::controller('/admin/engineering','admin\EngineeringController');	

// // 后台导航图控制器
// Route::controller('/admin/banner_pic','admin\Banner_picController');

// // 后台导航图控制器
// Route::controller('/admin/hexin','admin\HexinController');

// 后台留言控制器
Route::controller('/admin/liuyan','admin\LiuyanController');

// 后台联系我们控制器
Route::controller('/admin/lianxi','admin\LianxiController');

// 验证码控制器
Route::controller('/code','CodeController');
	
	

// 前台首页控制器
Route::controller('/home/index','home\IndexController');

// 前台公司简介控制器
Route::controller('/home/company','home\CompanyController');

// 前台产品展示控制器
Route::controller('/home/product','home\ProductController');

// 前台产品详情控制器
Route::controller('/home/product_details','home\Product_detailsController');

// 前台案例展示控制器
Route::controller('/home/case','home\CaseController');

// 前台案例展示控制器
Route::controller('/home/case_details','home\Case_detailsController');

// 前台新闻中心控制器
Route::controller('/home/news','home\NewsController');

// 前台案例展示详情控制器
Route::controller('/home/news_details','home\News_detailsController');

// // 前台核心团队详情控制器
// Route::controller('/home/hexin_details','home\Hexin_detailsController');

// // 前台关于我们控制器
// Route::controller('/home/about_us','home\About_usController');

// // 前台新闻中心控制器
// Route::controller('/home/news_details','home\News_detailsController');

// // 前台工程案例控制器
// Route::controller('/home/engineering','home\EngineeringController');

// 前台联系我们控制器
Route::controller('/home/lianxi','home\lianxiController');

// // 前台产品工艺控制器
// Route::controller('/home/process','home\ProcessController');

// // 前台产品工艺详情页控制器
// Route::controller('/home/process_details','home\Process_detailsController');

// // 前台产品工艺展示页控制器
// Route::controller('/home/product','home\ProductController');

// // 前台产品展示详情页控制器
// Route::controller('/home/product_details','home\Product_detailsController');

// // 前台公司新闻控制器
// Route::controller('/home/news','home\NewsController');

// // 前台新闻详情页控制器
// Route::controller('/home/news_details','home\News_detailsController');

// // 前台战略合作控制器
// Route::controller('/home/cooperation','home\CooperationController');

// // 前台战略合作详情控制器
// Route::controller('/home/cooperation_details','home\Cooperation_detailsController');

// // 前台联系我们控制器
// Route::controller('/home/message','home\MessageController');

// // 前台公司业绩控制器
// Route::controller('/home/achievement','home\AchievementController');

// // 前台公司业绩控制器
// Route::controller('/home/achievement_details','home\Achievement_detailsController');

// // 前台招贤纳士控制器
// Route::controller('/home/recruit','home\RecruitController');