@extends('home.layout.index')

@section('css')	
<link rel="stylesheet" type="text/css" href="/home/css/product-xq.css"/>
@endsection

@section('content')			
	<div id="pc-content">
		<div class="content">
			<div class="content_left">
				<div class="div1">
					<p>| 产品展示 <img src="/home/img/xingxing.png" style="margin-left: 20px;"/></p>
				</div>
				<div class="div2">
					<ul>
						<!-- 总类	 -->
						<li>
							<a href="javascript:;" class="color ddddd" onclick="getId(1)">产品展示
							<i></i></a>
						</li>
						<script type="text/javascript">
							function getId(id){
								location.href="http://www.jgzm.com/home/product/index";
							}
						</script>

						<li>
							<a href="javascript:;" class="color" id="a">{{ $res2['cate_name'] }}<i></i></a>
						</li>
						<script type="text/javascript">
							$('#a').click(function(){
								$('#a').AttrClass("class",'color');
							})
						</script>
					</ul>
				</div>
			</div>
			<div class="content_con">

				<div class="content_right">
					<h6><small>{{ $res2['cate_name'] }}</small></h6>
					<div class="xq">
						<div class="xq_left">
							<img src="/admin/images/uploads/kindeditor/shop/image/product/{{ $data['image'] }}"/>
						</div>
						<div class="xq_right">
							<h5>{{ $data['name'] }}</h5>
							<span>{{ $data['time'] }}</span>
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