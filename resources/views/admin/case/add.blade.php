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
            <span>案例添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/case/insert" method="post" enctype="multipart/form-data" id="form">
            {{ csrf_field() }}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>案例展示图片</b></label>
                        <div class="mws-form-item" style="width:700px;height:30px;">
                            <input type="file" name="image" value="{{ old('image') }}">
                        </div>
                    </div>
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>案例展示名称</b></label>
                        <div class="mws-form-item">
                            <input class="small" type="text" name="name" value="{{ old('name') }}"  style="width:700px;height:30px;">
                        </div>
                    </div>       

    				<div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>案例展示内容</b></label>
                        <div class="mws-form-item">
                          <textarea id="editor_id" name="content" style="width:700px;height:300px;">{{ old('content') }}</textarea>
                        </div>
                    </div>  

                   <div class="mws-form-row">
                        <label class="mws-form-label" style="position:relative;left:60px"><b>案例展示分类</b></label>
                        <div class="mws-form-item">
                            <select name="cid" style="width:700px">
                                <option value="0" selected>----请选择----</option>
                                @foreach($data as $k=>$v)
                                 <option value="{{ $v['id'] }}">{{ $v['cname'] }}</option>
                                @endforeach
                            </select>
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




