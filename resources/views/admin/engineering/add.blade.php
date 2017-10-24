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
            <span>工程案例添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/engineering/insert" method="post" enctype="multipart/form-data" id="form">
            {{ csrf_field() }}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label">工程案例名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="title" value="{{ old('title') }}" style="width:400px" placeholder="请添加工程案例名称">
                        </div>
                    </div>
					
					<div class="mws-form-row">
                        <label class="mws-form-label">工程案例图片</label>
                        <div class="mws-form-item" style="width:400px">
                            <input type="file" name="image" value="{{ old('image') }}" style="width:400px">
                        </div>
                    </div>  

                    <div class="mws-form-row">
                        <label class="mws-form-label">工程案例分类</label>
                        <div class="mws-form-item">
                            <select name="cateid" style="width:400px">
                                <option value="0" selected>----请选择----</option>
                                @foreach($data as $k=>$v)
                                 <option value="{{ $v['id'] }}">{{ $v['cate_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input value="添加" class="btn btn-danger" type="submit">
                    <input value="重置" class="btn " type="reset" onclick="document.getElementById('form').reset()">
                </div>
            </form>
        </div>
    </div>
@endsection

