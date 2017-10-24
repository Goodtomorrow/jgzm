<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/page_page.css" media="screen">

@section('css')

@show

<title>{{ Config::get('app.admintitle') }}</title>

</head>

<body>
    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img alt="mws admin" src="/admin/images/uploads/{{ Config::get('app.logo')}}" complete="complete" title="{{ Config::get('app.admintitle') }}"/>
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        {{ session('adminusername') }}
                    </div>
                    <ul>
                        <li><a href="/home/index/index" target="_blank">前台首页</a></li>
                        <li><a href="/admin/index">后台主页</a></li>
                        <li><a href="/admin/login/out">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="/admin/admin/index"><i class="icon-list"></i>基本设置</a>
                                <ul>
                                    <li><a href="/admin/index">网站信息</a></li>
                                    <li><a href="/admin/pass/index">修改密码</a></li>
                                </ul>
                            </li>
                    </ul>
            </div> 

            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="/admin/config/index"><i class="icon-list"></i>网站配置管理</a>
                                <ul>
                                    <li><a href="/admin/config/index">网站配置</a></li>
                                </ul>
                            </li>
                    </ul>
            </div> 
            
            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="#"><i class="icon-list"></i>轮播图管理</a>
                                <ul>
                                    <li><a href="/admin/banner/index">轮播图列表</a></li>
                                    <li><a href="/admin/banner/add">轮播图添加</a></li>
                                </ul>
                            </li>
                    </ul>
            </div>
    
            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="#"><i class="icon-list"></i>产品分类</a>
                                <ul>
                                    <li><a href="/admin/cate/index">分类列表</a></li>
                                    <li><a href="/admin/cate/add">分类添加</a></li>
                                    <li><a href="/admin/product/index">产品列表</a></li>
                                    <li><a href="/admin/product/add">产品添加</a></li>
                                </ul>
                            </li>
                    </ul>
            </div> 
            
            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="#"><i class="icon-list"></i>新闻分类</a>
                                <ul>
                                    <li><a href="/admin/news_cate/index">分类列表</a></li>
                                    <li><a href="/admin/news_cate/add">分类添加</a></li>
                                    <li><a href="/admin/news/index">新闻列表</a></li>
                                    <li><a href="/admin/news/add">新闻添加</a></li>
                                </ul>
                            </li>
                    </ul>
            </div>

            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="#"><i class="icon-list"></i>案例分类</a>
                                <ul>
                                    <li><a href="/admin/case_cate/index">分类列表</a></li>
                                    <li><a href="/admin/case_cate/add">分类添加</a></li>
                                    <li><a href="/admin/case/index">案例列表</a></li>
                                    <li><a href="/admin/case/add">案例添加</a></li>
                                </ul>
                            </li>
                    </ul>
            </div> 
            
            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="#"><i class="icon-list"></i>公司简介</a>
                                <ul>
                                    <li><a href="/admin/brief/index">公司概述</a></li>
                                    <li><a href="/admin/culture/index">企业文化</a></li>
                                </ul>
                            </li>
                    </ul>
            </div>

            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="/admin/company/index"><i class="icon-list"></i>新闻中心</a>
                                <ul>
                                    <li><a href="/admin/news/index">新闻列表</a></li>
                                    <li><a href="/admin/news/add">新闻添加</a></li>
                                </ul>
                            </li>
                    </ul>
            </div>

            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="/admin/product/index"><i class="icon-list"></i>工程管理</a>
                                <ul>
                                    <li><a href="/admin/engineering/index">工程列表</a></li>
                                    <li><a href="/admin/engineering/add">工程添加</a></li>
                                </ul>
                            </li>
                    </ul>
            </div>
   
            <div id="mws-navigation">
                    <ul>
                            <li>
                                <a href="#"><i class="icon-list"></i>联系我们</a>
                                <ul>
                                    <li><a href="/admin/lianxi/index">联系我们</a></li>
                                    <li><a href="/admin/liuyan/index">留言板</a></li>
                                </ul>
                            </li>
                    </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">
                    
                    @if(session('error'))
                    <div class="mws-form-message warning">
                     {{ session('error') }}
                     </div>
                     @endif
                     
                     @if(session('success'))
                     <div class="mws-form-message info">
                     {{ session('success') }}
                     </div>
                     @endif

                    @section('content')
                          
                    @show
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
                {{ Config::get('app.copyright') }}
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admin/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admin/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admin/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admin/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admin/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admin/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admin/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admin/js/demo/demo.dashboard.js"></script>

    <!-- 富文本插件js -->
    @section('js')
    
    @show
</body>
</html>