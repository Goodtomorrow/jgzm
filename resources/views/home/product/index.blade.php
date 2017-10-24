@extends('home.layout.index')

@section('css')
<link rel="stylesheet" type="text/css" href="/home/css/product.css"/>
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
						<li>
							<a href="javascript:;" class="color">产品展示<i></i></a>
						</li>

						@foreach($data as $k=>$v)
						<li>
							<a href="javascript:;" class=" ddddd"  onclick="getId({{ $v['id'] }})" id="fulei"> {{ $v['cate_name'] }} <i></i></a>
							<ul style="display: none;" class="bbbbb">
								@foreach($v['sub'] as $k2=>$v2)
								<li><a href="javascript:;"class="col" onclick="getZid({{ $v2['id'] }})" id="zilei">{{ $v2['cate_name'] }}</a></li>
								@endforeach
							</ul>
						</li>
						@endforeach
					</ul>
				</div>

				<script type="text/javascript">

					// crsf保护
					$.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
					});

					// 触发点击事件
					function getId(id)
						{
							// 发送ajax
							$.ajax({
							url:"/home/product/zhanshi",
							data:{id:id},
							dataType:"json",
							type:"post",
							success:function(data)
							{	
								// 有数据返回
								if(data){	
									//  弹出产品所属分类
									// alert(data.cate_name);

									// 右侧内容区域切换【分类标题】
									var span = "<small style='border-bottom:1px;position:relative;bottom:8px'>"+data['cate_name']+"</small>";
									// 分类下的产品信息
									var str = '';
									str += '<ul>';
									// 遍历数组
									$.each(data,function(index,obj)
									{
										if(obj.name != undefined){
											// 拼接标签
											str += '<li class="cont">';
											str += '<a href="/home/product_details/index/'+obj.id+'">';
											str += '<img src="/admin/images/uploads/kindeditor/shop/image/product/'+obj.image+'" />';
											str += '<p>'+obj.name+'</p>';
											str += '</a>';
											str += '</li>';
										}
										
									})
									str += '</ul>';

									// 局部信息展示页
									$('#div2').show();
									$('#div3').hide();
									$('#div1').hide();
									$("#h").html(span);
									$("#jb").html(str);

								}else{
									// 无数据返回
									alert('空');
								}
							}
						})
					}
				</script>
				
				<script type="text/javascript">

					// crsf保护
					$.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
					});

					// 触发点击事件
					function getZid(id)
						{
							// 发送ajax
							$.ajax({
							url:"/home/product/zhanshi2",
							data:{id:id},
							dataType:"json",
							type:"post",
							success:function(data)
							{	
								// 有数据返回
								if(data){	

									//  弹出产品所属分类
									// alert(data['cate_name']);

									// 右侧内容区域切换【分类标题】
									var biaoti = "<small>"+data['cate_name']+"</small>";

									// 分类下的产品信息
									var s = '';
									s += '<ul>';

									// 遍历数组
									$.each(data,function(index,obj2)
									{
										// 判断
										if(obj2.name != undefined){

											// 拼接标签
											s += '<li>';
											s += '<a href="/home/product_details/index/'+obj2.id+'">';
											s += '<img src="/admin/images/uploads/kindeditor/shop/image/product/'+obj2.image+'" />';
											s += '<p>'+obj2.name+'</p>';
											s += '</a>';
											s += '</li>';
										}
									})

									s += '</ul>';
									// 局部信息展示页
									$('#div3').show();
									$('#div2').css('display','none'); 
									$('#div1').css('display','none'); 
									$("#biaoti").html(biaoti);
									$("#jbb").html(s);
								}else{
									// 无数据返回
									alert('空');
								}
							}
						})
					}
				</script>

			</div>
			<div class="content_con">
				
				<!-- 右侧内容区域开始 -->
				
				<div class="content_right" id="div1">

					<h6><small>产品展示</small></h6>
					
					<div class="lists">
						
						<ul id="ul">
						@foreach($arr as $k=>$v)
							<li class="cont">
								<a href="/home/product_details/index/{{ $v['id'] }}">
									<img src="/admin/images/uploads/kindeditor/shop/image/product/{{ $v['image'] }}"/>
									<p>{!! $v['name'] !!}</p>
								</a>
							</li>
						@endforeach
						</ul>
						
					</div>
					
					<!-- 右侧内容区域分页开始 -->
					<div class="sx">
						{!! $arr->render() !!}
					</div>
					<!-- 右侧内容区域分页结束 -->

				</div>

				<!-- 右侧内容区域结束 -->

				<div class="content_right" id="div2">

					<h6 id="h"></h6>
					<div class="lists" id="jb">

					</div>

					<!-- 右侧内容区域分页开始 -->
					<!-- <div class="sx">
						<ul>
							<li><p>上一页</p></li>
							<li>|</li>
							<li><p>下一页</p></li>
						</ul>
					</div> -->
					<!-- 右侧内容区域分页结束 -->

				</div>

				<div class="content_right" id="div3">

					<h6 id="biaoti"></h6>
					<div class="lists" id="jbb">

					</div>

					<!-- 右侧内容区域分页开始 -->
					<!-- <div class="sx">
						<ul>
							<li><p>上一页</p></li>
							<li>|</li>
							<li><p>下一页</p></li>
						</ul>
					</div> -->
					<!-- 右侧内容区域分页结束 -->

				</div>
			</div>
		</div>
	</div>
@endsection