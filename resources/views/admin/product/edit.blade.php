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
            <span>产品展示</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/product/update" method="post" enctype="multipart/form-data" id="form">
            {{ csrf_field() }}
            
            <input type="hidden" name="id" value="{{ $id }}">
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>产品展示图片</b></label>
                        <div class="mws-form-item" style="width:700px;">
                            <input type="file" name="image" value="{{ $res['image'] }}">
                            <img src="/admin/images/uploads/kindeditor/shop/image/product/{{ $res['image'] }}" alt="" style="width:700px;">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>产品展示名称</b></label>
                        <div class="mws-form-item">
                            <input class="small" type="text" name="name" value="{{ $res['name'] }}"  style="width:700px;height:30px;" placeholder="请填写产品展示标题">
                        </div>
                    </div>       

    				<div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>产品展示内容</b></label>
                        <div class="mws-form-item">
                          <textarea id="editor_id" name="content" style="width:700px;height:300px;">{{ $res['content'] }}</textarea>
                        </div>
                    </div> 
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px">产品展示分类</label>
                        <div class="mws-form-item">
                            <select name="cateid" style="width:700px">
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
                    <input value="重置" class="btn" type="reset" onclick="document.getElementById('form').reset()">
                </div>
            </form>
        </div>
    </div>
@endsection



