<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">

<title>后台界面登录</title>

</head>

<body>

        @if (count($errors) > 0)
                <div class="mws-form-message error">
                    <ul style="background:red;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

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
            
            </div>
<div id="mws-login-wrapper">
    <div id="mws-login">
        <h1>后台登录</h1>
        <div class="mws-login-lock"><i class="icon-lock"></i></div>
        <div id="mws-login-form">
            <form class="mws-form" action="/admin/login/dologin" method="post">
               {{ csrf_field() }}
                <div class="mws-form-row">
                    <div class="mws-form-item">
                     <input type="text" style="width:260px" name="username" class="mws-login-username required" placeholder ="{{ $log['username'] or '用户名/邮箱/手机号'}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <input type="password" style="width:260px" name="password" class="mws-login-password required" placeholder="{{ $log['password'] or '输入密码'}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <input type="text" style="width:135px;height:36px" name="code" value="" placeholder="{{ $log['code'] or '输入验证码'}}" style="width:140px;height:45px">
                        <img src="/code" alt="" title="点击刷新" onclick="this.src=this.src+'?a=1'" style="width:120px;height:35px;">
                    </div>
                </div>

                <div class="mws-form-row">
                    <input type="submit" value="登录" class="btn btn-success mws-login-button">
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- JavaScript Plugins -->
    <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/admin/js/core/login.js"></script>
 
    <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>

    <script src="/admin/jui/js/globalize/globalize.js"></script>
    <script src="/admin/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/custom-plugins/picklist/picklist.min.js"></script>
    <script src="/admin/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/admin/plugins/select2/select2.min.js"></script>
    <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>

    <script src="/admin/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="/admin/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="/admin/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="/admin/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="/admin/plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Core Script -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admin/js/demo/demo.formelements.js"></script>
</body>
</html>
