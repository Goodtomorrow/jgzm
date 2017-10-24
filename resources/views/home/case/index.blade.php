@extends('home.layout.index')

@section('css')
	<link rel="stylesheet" type="text/css" href="/home/css/case.css"/>
@endsection

@section('js')
<script type="text/javascript">

	function getId(id)
	{
		$.ajaxSetup({

			headers: {
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			      }
		});

		$.ajax({
				url:"/home/case/getid",
				data:{cid:id},
				dataType:"json",
				type:"post",
				success:function(data){	
				// 判断返回值
				if(data != 2)
				{
					// 定义str
					var str = '';
					str += "<h6><small>"+data.cname+"</small></h6>";
					str += "<div class='lists'><ul>";
					// 遍历数组
					$.each(data.children,function(index,obj)
					{
						// 拼接标签
						str += '<li>';
						str += '<a href="/home/case_details/index/'+obj.id+'">';
						str += '<img src="/admin/images/uploads/kindeditor/shop/image/case/'+obj.image+'" />';
						str += '<p>'+obj.name+'</p>';
						str += '</a>';
						str += '</li>';
					})

					str += "</ul></div>";
					$('#dataBox').show();
					$('#dataBoxList').html(str);
				}else{
					// 失败区间
					alert('提交失败');
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
					<p>| 案例展示 <img src="/home/img/xingxing.png" style="margin-left: 20px;"/></p>
				</div>
				<div class="div2">
					<ul>

						<li>
							<a href="javascript:;" class="color">案例展示<i></i></a>
						</li>

						@foreach($arr as $k=>$v)
						<li>
							<a href="javascript:;" class="color" onclick="getId({{ $v['id'] }})" id="2">{{ $v['cname'] }}<i></i></a>
						</li>
						@endforeach
					</ul>
				</div>
				
			</div>

			<div class="content_con">

				<div class="content_right">

					<!-- 全部案例 -->
					<h6><small>案例展示</small></h6>

					<div class="lists">
						<ul>
							@foreach($data as $k=>$v)
							<li>
								<a href="/home/case_details/index/{{ $v['id'] }}">
									<img src="/admin/images/uploads/kindeditor/shop/image/case/{{ $v['image'] }}"/>
									<p>{{ $v['name'] }}</p>
								</a>
							</li>
							@endforeach
						
								{!! $data->render() !!}
							
						</ul>
					</div>

				</div>

				<div class="content_right" id="dataBox">
					
					<!-- 局部案例 -->
					
					<div class="lists">
						
						<ul id="dataBoxList">
							
						</ul>

					</div>

				</div>	

			</div>

		</div>

	</div>
			
@endsection