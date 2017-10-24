<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/home/	css/base.css"/>
		<link rel="stylesheet" type="text/css" href="/home/css/index.css" />
		
		@section('css')

		@show

		<script src="/home/js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="/home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="/home/js/index.js" type="text/javascript" charset="utf-8"></script>
		
		@section('js')

		@show
		
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	</head>

	<body>
		<div class="mobeilNav">
			<ul>
				<li>
					<a href="/home/index">首页</a>
				</li>
				<li>
					<a href="/home/company/index">公司简介</a>
				</li>
				<li>
					<a href="/home/product/index">产品展示</a>
				</li>
				<li>
					<a href="/home/news/index">新闻资讯</a>
				</li>
				<li>
					<a href="/home/case/index">案例展示</a>
				</li>
				<li>
					<a href="/home/lianxi/index">联系我们</a>
				</li>
			</ul>
		</div>
		<div id="warp">
			<div id="bg">
				<div id="pc-header">
					<div id="header">
						<div class="header">
							<div class="header_left">
								<a href="/home/index">{{ Config::get('app.title') }}</a>
							</div>
							<div class="header_right">
								<ul>
									<li>
										<a href="/home/index">首页</a>
									</li>
									<li>
										<a href="/home/company/index">公司简介</a>
									</li>
									<li>
										<a href="/home/product/index">产品展示</a>
									</li>
									<li>
										<a href="/home/news/index">新闻资讯</a>
									</li>
									<li>
										<a href="/home/case/index">案例展示</a>
									</li>
									<li>
										<a href="/home/lianxi/index">联系我们</a>
									</li>
								</ul>
							</div>
							<div class="m-nav-btn">
								<span></span>
								<span></span>
								<span></span>

							</div>
							
						</div>
					</div>
				</div>
			</div>

			@section('content')

			@show

			<!--底部内容-->
			<div id="pc-footer">
				<div id="footer">
					<div class="footer">
						<p>{{Config::get('app.copyright')}}</p>
						<a href="/home/index">{{Config::get('app.title')}}</a>
						<a href="http://www.rzxid.com" target="_blank">技术支持：郑州瑞之雪网络科技有限公司</a>
					</div>
				</div>
			</div>
			@section('js')

			@show
		</div>
	</body>

</html>