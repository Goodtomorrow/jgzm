@extends('admin.layout.index')

@section('content')   

	@if (count($errors) > 0)
    <div class="mws-form-message error">
    错误提醒
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

   	<div class="mws-panel">
        <div class="mws-panel-header">
            <span>联系我们</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/lianxi/update" method="post" enctype="multipart/form-data" id="form">
            {{ csrf_field() }}
            
            <input type="hidden" name="id" value="{{ $data['id'] }}">
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>电话</b></label>
                        <div class="mws-form-item">
                            <input class="small" type="text" name="tel" value="{{ $data['tel'] }}"  style="width:700px;height:30px;">
                        </div>
                    </div>  

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>邮箱</b></label>
                        <div class="mws-form-item">
                            <input class="small" type="text" name="email" value="{{ $data['email'] }}"  style="width:700px;height:30px;">
                        </div>
                    </div>
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>公司地址</b></label>
                        <div class="mws-form-item">
                            <input class="small" type="text" name="address" value="{{ $data['address'] }}"  style="width:700px;height:30px;">
                        </div>
                    </div>

                </div>
                <div class="mws-button-row">
                    <input value="修改" class="btn btn-danger" type="submit">
                    <input value="重置" class="btn" type="reset" onclick="document.getElementById('form').reset()">
                </div>
            </form>
        </div>
    </div>
@endsection



