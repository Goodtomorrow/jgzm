@extends('home.layout.index')

@section('css')
<link rel="stylesheet" type="text/css" href="/home/css/product-xq.css"/>
@endsection

@section('content')			
	<div id="pc-content">
		<div class="content">
			<div class="content_left">
				<div class="div1">
					<p>| 案例展示 <img src="/home/img/xingxing.png" style="margin-left: 20px;"/></p>
				</div>
				<div class="div2">
					<ul>
						<li>
							<a href="javascript:;" class="color" id="zong">案例展示<i></i></a>
						</li>
						<script type="text/javascript">
							$('#zong').click(function(){
								location.href="/home/case/index";
							})
						</script>

						<li>
							<a href="javascript:;"  id="zilei" style="display:block">{{ $s['cname'] }}<i></i></a>
							<a href="javascript:;"  style="display:none" id="xian">{{ $s['cname'] }}<i></i></a>
							
						</li>
						<script type="text/javascript">
							$('#zilei').click(function(){
								$('#zong').removeAttr('class');
								$('#zilei').attr('display','none');
								$('#xian').attr('display','block');
								$('#xian').attrClass('class','color');
								// alert(1);
							})
						</script>

					</ul>
				</div>
			</div>
			<div class="content_con">
				<div class="content_right">
					<h6><small>{{ $s['cname'] }}>{{ $data['name'] }}</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/home/case/index" style="font-size:16px">返回</a></h6>
					<div class="xq">
						<div class="xq_left">
							<img src="/admin/images/uploads/kindeditor/shop/image/case/{{ $data['image'] }}"/>
						</div>
						<div class="xq_right">
							<h5>{{ $data['name'] }}</h5>
							<span>{{ $data['time'] }}发布</span>
							<p>
								{!! $data['content'] !!}
							</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection
