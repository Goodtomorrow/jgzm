@extends('home.layout.index')

@section('css')
	<link rel="stylesheet" type="text/css" href="/home/css/news.css"/>
@endsection

@section('js')
<script type="text/javascript">

	// 触发点击事件
	function getId(id){
		// ajax保护头部
		$.ajaxSetup({

			headers: {
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			      }
		});
		// 发送ajax
		$.ajax({
				url:"/home/news/getid",
				data:{nid:id},
				dataType:"json",
				type:"post",
				success:function(data){	
				// 判断返回值
				if(data!=2){

					// 返回值成功区间
					var str = '';
					str += '<h6><small>'+data.name+'</small></h6>';
					str += '<div class="p" class="boxlist">';
					$.each(data.info,function(index,obj)	
					{
						str += '<a href="/home/news_details/index/'+obj.id+'">';
						str += '<i>';
						str += '<img src="/home/img/jj.png"/>'+obj.name;
						str += '</i>';
						str += '<span>'+obj.time+'</span>';
						str += '</a>';
					})
					str += '</div>';
					$('#box').show();
					$('#boxlist').html(str);
				}else{

					// 返回值失败区间
					alert('返回值获取失败');
				}
			}
		})
	}

</script>
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
							<a href="/home/news/index" class="color">新闻资讯<i></i></a>
						</li>
						@foreach($cate as $k=>$v)
						<li>
							<a href="javascript:;" class="color" onclick="getId({{ $v['id'] }})" id="{{ $v['id'] }}">{{ $v['name'] }}<i></i></a>
						</li>
						@endforeach
					</ul>
				</div>

			</div>

			<div class="content_con">
				
				<!-- 全部新闻资讯 -->
				<div class="content_right">

					<h6><small>{{ $cate2['name'] }}</small></h6>

					<div class="p">

						@foreach($news as $k=>$v)
						<a href="/home/news_details/index/{{$v['id']}}"><i><img src="/home/img/jj.png"/></i>{{ $v['name'] }}<span>{{ $v['time'] }}</span></a>
						@endforeach

					</div>

					<div class="sx">

						<ul>
							<li><p>上一页</p></li>
							<li>|</li>
							<li><p>下一页</p></li>
						</ul>
					</div>

				</div>


			
				<!-- 局部新闻资讯 -->
				<div class="content_right" id="box">

					<div class="p" id="boxlist">
				
					</div>

					<div class="sx">
						<ul>
							<li><p>上一页</p></li>
							<li>|</li>
							<li><p>下一页</p></li>
						</ul>

					</div>

				</div>

			</div>

		</div>
	</div>
@endsection

