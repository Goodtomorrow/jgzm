@extends('admin.layout.index')

@section('content')
	@if (count($errors) > 0)
		<div class="mws-form-message error">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="mws-panel grid_8">
             
        <div class="mws-panel-header">
            <span>分类添加列表</span>
        </div>
        <div class="mws-panel-body no-padding">

            <form class="mws-form" action="/admin/cate/insert" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">

                    <div class="mws-form-row">
                        <label class="mws-form-label">分类名称</label>
                        <div class="mws-form-item">
                            <input class="small" type="text" name="cate_name" value=""  style="width:400px">
                        </div>
                    </div>

                   <!--  <div class="mws-form-row">
                        <label class="mws-form-label">分类图片</label>
                        <div class="mws-form-item" style="width:400px">
                            <input class="small" type="file" name="image" value=""  style="width:400px">
                        </div>
                    </div>   -->

                    <div class="mws-form-row">
                        <label class="mws-form-label">分类列表</label>
                        <div class="mws-form-item">
                            <select name="fid" style="width:400px">
                                <option value="0" selected>----请选择----</option>
                            @foreach($data as $k => $v)
                             	<option value="{{ $v['id'] }}" @if($id == $v['id']) selected @endif>{{ $v['cate_name'] }}</option>
                            @endforeach 	
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mws-button-row">
                    <input type="submit" value="编辑" class="btn btn-danger" style="margin-left:50px; width:200px;">
                    <input type="reset" value="重置" class="btn " style="margin-left:50px; width:200px;">
                </div>
            </form>

        </div> 

    </div>         
@endsection