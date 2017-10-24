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
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="icon-user">留言管理</span>
    </div>
    <div class="mws-panel-body no-padding">
        <!--表单提交  -->
        <form class="mws-form" action="#">
            <div class="mws-form-inline">

                <div class="mws-form-row">
                    <label class="mws-form-label"><b>留言ID</b></label>
                    <div class="mws-form-item">
                        <input type="text" class="large"  name="id" value="{{ $data['id'] }}" disabled="disabled" style="width:700px">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label"><b>留言用户</b></label>
                    <div class="mws-form-item">
                        <input type="text" class="large"  name="user" disabled="disabled" value="{{ $data['user'] }}" style="width:700px">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label"><b>留言电话</b></label>
                    <div class="mws-form-item">
                        <input type="text" class="large"  name="tel" value="{{ $data['tel'] }}" readonly="readonly" style="width:700px">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label"><b>留言邮箱</b></label>
                    <div class="mws-form-item">
                        <input type="text" class="large"  name="email"  value="{{ $data['email'] }}" readonly="readonly" style="width:700px">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label" ><b>留言内容</b></label>
                    <div class="mws-form-item">
                      <textarea id="editor_id" name="content" style="width:700px;height:300px;" disabled="disabled">{{ $data['message_content'] }}</textarea>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label"><b>留言时间</b></label>
                    <div class="mws-form-item">
                        <input type="text" class="large" name="createtime"  value="{{ $data['createtime'] }}" readonly="readonly" style="width:700px">
                    </div>
                </div>

            </div>
        </form>

    </div>      
</div>

@endsection