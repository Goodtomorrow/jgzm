@extends('admin/layout/index')

@section('content')

   	<div class="mws-panel">
        <div class="mws-panel-header">
            <span>工程案例修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/engineering/update" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $res['id'] }}">

                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label">工程案例名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="title" value="{{ $res['title'] }}" style="width:400px" placeholder="请添加工程案例名称">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>工程案例图片</b></label>
                        <div class="mws-form-item" style="width:400px;">
                            <input type="file" name="image" value="{{ $res['image'] }}">
                            <img src="/admin/images/uploads/kindeditor/shop/image/engineering/{{ $res['image'] }}" alt="">
                        </div>
                    </div>  

                    <div class="mws-form-row">
                        <label class="mws-form-label">工程案例分类</label>
                        <div class="mws-form-item">
                            <select name="cateid" style="width:400px">
                                <option value="0" selected>----请选择----</option>
                                @foreach($arr as $k=>$v)
                             	 <option value="{{ $v['id'] }}" @if($v['id'] == $res['cateid']) selected @endif>{{ $v['cate_name'] }}</option>
                             	@endforeach
                            </select>
                        </div>
                    </div>

				</div>
                <div class="mws-button-row">
                    <input value="修改" class="btn btn-danger" type="submit">
                    <input value="重置" class="btn " type="reset" onclick="document.getElementById('form').reset()">
                </div>
            </form>
        </div>
    </div>
@endsection