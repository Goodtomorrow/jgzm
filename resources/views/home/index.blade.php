@extends('home.layout.index')

@section('content')

	<!--无缝滚动-->
	<div id="pc-bgcolor">
		<div id="bgcolor"></div>
		<div id="content">
			<div class="content_left"></div>
			<div class="content_mid">
				<div class="picMarquee-left">
					<div class="bd">
						<ul class="picList">
							@foreach($banner as $k=>$v)
							<li>
								<div class="pic">
									<a href=""><img src="/admin/images/uploads//kindeditor/shop/image/banner/{{ $v['image'] }}" /></a>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

@endsection