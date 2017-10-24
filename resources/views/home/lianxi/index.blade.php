@extends('home.layout.index')

@section('css')
	<link rel="stylesheet" type="text/css" href="/home/css/contact.css"/>
@endsection

@section('js')
		<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
		<script src="/home/js/map.js"></script>
@endsection
	
@section('content')
			
	<div id="pc-content">
		<div class="content">
			<div class="content_left">
				<div class="div1">
					<p>| 联系我们 <img src="/home/img/xingxing.png" style="margin-left: 30px;"/></p>
				</div>
				<div class="div2">
					<ul>
						<li >
							<a href="javascript:;" class="color">联系方式 <i></i></a>
						</li>
						<li >
							<a href="javascript:;" >留言板 <i></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="content_con">
				<div class="content_right">
					<h6><small>联系方式</small></h6>
					<div class="p">
						<p>
							电话：{{ $lianxi['tel'] }}
						</p>
						<p>
							邮箱：{{ $lianxi['email'] }}
						</p>
						<p>
							地址: {{ $lianxi['address'] }}
						</p>
					</div>
					<div class="map">
						<div class="bu" style="width:800px;height:300px;border:#ccc solid 1px;" id="dituContent"></div>
					</div>
				</div>
				
				<div class="content_right">
					<h6><small>留言板</small></h6>
					<form action="/home/lianxi/tijiao" method="post" id="myform">
						{{ csrf_field() }}
						<div class="name">
							<lebel>用户名：</lebel><input type="text" name="user" placeholder="请输入用户名" class="input1" value="">
						</div>
						<div class="phone">
							<lebel>联系电话：</lebel><input type="text" name="tel" placeholder="请输入电话" class="input2" value="">
						</div>
						<div class="email">
							<lebel>邮箱：</lebel><input type="text" name="email" placeholder="请输入邮箱" class="input3" value="">
						</div>
						<div class="text">
							<lebel>正文：</lebel> <textarea name="message_content" placeholder="请输入正文" class="input4" value=""></textarea>
						</div>
						<div class="button" style="position:relative;top:-80px;left:-8px">
							<input type="submit" value="提交留言" id="ti">
						</div>
					</form>
					
						<script type="text/javascript">
							// 获取表单提交按钮
							$("#myform").submit(function(){

							var s1 = $('.input1').val();
							var s2 = $('.input2').val();
							var s3 = $('.input3').val();
							var s4 = $('.input4').val();
							if(s1.length == 0 || s2.length == 0 || s3.length == 0 || s4.length == 0)
							{
								// 判断输入框内是否为空
								alert('请输入完整留言信息');
								location.href="/home/lianxi/index/";
								return false;
							}else{
								alert('提交成功');
								return true;
							}

						})
						</script>
				</div>
			</div>
		</div>
	</div>
	
@endsection
	