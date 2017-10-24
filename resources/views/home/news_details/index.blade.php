@extends('home.layout.index')

@section('css')
<link rel="stylesheet" type="text/css" href="/home/css/news-xq.css"/>
@endsection

@section('content')	
	<div id="pc-content">
		<div class="content">
			<div class="content_left">
				<div class="div1">
					<p>| 新闻资讯 <img src="/home/img/xingxing.png" style="margin-left: 30px;"/></p>
				</div>
				<div class="div2">
					<ul>
						<li>
							<a href="javascript:;" class="color" onclick="getId(1)">新闻资讯<i></i></a>
						</li>
						<script type="text/javascript">
							function getId(id){
								location.href="/home/news/index";
							}
						</script>
						<li>
							<a href="javascript:;" class="color" id="zilei">{{ $name['name'] }}<i></i></a>
						</li>
						<script type="text/javascript">
							$('#zilei').click(function(){
								$('#zilei').AttrClass('class','color')
							})
						</script>
					</ul>
				</div>
			</div>
			<div class="content_con">
				<div class="content_right">
					<h6>{{ $data['name'] }}</h6>
					<span>{{ $data['time'] }}</span>
					<div>
						<p>
							{!! $data['content'] !!}
						</p>
					</div>
					
				</div>

			</div>
		</div>
	</div>
@endsection