@extends('home.layout.index')

@section('css')
<link rel="stylesheet" type="text/css" href="/home/css/company.css"/>
@endsection

@section('content')		
	<div id="pc-content">
		<div class="content">
			<div class="content_left">
				<div class="div1">
					<p>| 公司简介 <img src="/home/img/xingxing.png" style="margin-left: 30px;"/></p>
				</div>
				<div class="div2">
					<ul>
						<li >
							<a href="javascript:;" class="color">公司概述 <i></i></a>
						</li>
						<li >
							<a href="javascript:;" >企业文化 <i></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="content_con">
				<div class="content_right">
					<h6><small>公司概述</small></h6>
					<div class="p">
						{!! $res1['content'] !!}
					</div>
				</div>
				<div class="content_right">
					<h6><small>企业文化</small></h6>
					<div class="p">
						{!! $res2['content'] !!}
					</div>
					
				</div>
			</div>
		</div>
	</div>
@endsection