@extends('admin.layout.index')

@section('js')

<script charset="utf-8" src="/admin/images/uploads/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/admin/images/uploads/kindeditor/lang/zh-CN.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });

        K.create('#editor_id');
        var editor = K.create('textarea[name="shop_picture"]', options);
        
        // 取得HTML内容
        html = editor.html();

        // 同步数据后可以直接取得textarea的value
        editor.sync();
        html = document.getElementById('editor_id').value; // 原生API
        html = K('#editor_id').val(); // KindEditor Node API
        html = $('#editor_id').val(); // jQuery

        // 设置HTML内容
        editor.html('HTML内容');
</script>

<script type="text/javascript">
    $("#chongzhi").click(function(){
        $('.small').val('');
        $('#laiyuan').val('');
    })
</script>   

@endsection


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
            <span>战略合作</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/cooperation/insert" method="post" enctype="multipart/form-data" id="form">
            {{ csrf_field() }}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>标题</b></label>
                        <div class="mws-form-item">
                            <input class="small" type="text" name="title" value="{{ old('title') }}"  style="width:700px;height:30px;">
                        </div>
                    </div>       
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>简介</b></label>
                        <div class="mws-form-item">
                            <input class="small" type="text" name="jianjie" value="{{ old('jianjie') }}"  style="width:700px;height:30px;" placeholder="请填写公司战略合作简介">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>图片</b></label>
                        <div class="mws-form-item" style="width:700px;height:30px;">
                            <input type="file" name="image" value="{{ old('image') }}">
                        </div>
                    </div>

    				<div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>内容</b></label>
                        <div class="mws-form-item">
                          <textarea id="editor_id" name="content" style="width:700px;height:300px;">{{ old('content') }}</textarea>
                        </div>
                    </div>  
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>小图1</b></label>
                        <div class="mws-form-item" style="width:700px;height:30px;">
                            <input type="file" name="image1" value="{{ old('image1') }}" placeholder="请填写战略合作小图片1">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>小图2</b></label>
                        <div class="mws-form-item" style="width:700px;height:30px;">
                            <input type="file" name="image2" value="{{ old('image2') }}" placeholder="请填写战略合作小图片2">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>小图3</b></label>
                        <div class="mws-form-item" style="width:700px;height:30px;">
                            <input type="file" name="image3" value="{{ old('image3') }}"  placeholder="请填写战略合作小图片3">
                        </div>
                    </div>

                </div>
                <div class="mws-button-row">
                    <input value="编辑" class="btn btn-danger" type="submit">
                    <input value="重置" class="btn" type="reset" onclick="document.getElementById('form').reset()">
                </div>
            </form>
        </div>
    </div>
@endsection



