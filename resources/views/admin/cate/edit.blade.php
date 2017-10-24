@extends('admin.layout.index')
@section('content')
    <div class="mws-panel">
        <div class="mws-panel-header">
            <span>分类修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/cate/update" method="post" enctype="multipart/form-data" id="form">
                <input type="hidden" name="id" value="{{ $res['id'] }}">
                {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">分类名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="cate_name" value="{{ $res['cate_name'] }}" style="width:400px">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">分类列表</label>
                        <div class="mws-form-item">
                            <select name="fid" style="width:400px">
                                <option value="0" selected>----请选择----</option>
								
                          		@foreach($data as $k=>$v)
                                <option value="{{ $v['id'] }}" @if($res['fid'] == $v['id']) selected @endif >{{ $v['cate_name'] }}</option>
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