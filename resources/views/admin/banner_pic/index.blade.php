@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>工程案例列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <form action="/admin/daohangtu/index" method="get" enctype="multipart/form-data" id="form">
                <label>显示 
                <select size="1" name="count" aria-controls="DataTables_Table_1">
                    <option value="5" @if(!empty($request['count']) && $request['count']==5) selected @endif>5</option>
                    <option value="10" @if(!empty($request['count']) && $request['count']==10) selected @endif>10</option>
                    <option value="15" @if(!empty($request['count']) && $request['count']==15) selected @endif>15</option>
                </select>
                 条</label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>关键字: 
                    <input type="text" aria-controls="DataTables_Table_1" name="search" value="{{ $request['search'] or '' }}">
                </label>
                    <input type="submit" value="搜索">
                </form>
            </div>
        <table class="mws-table">
            <thead>
                <tr>
                    <th>分类ID</th>
                    <th>关于我们</th>
                    <th>新闻中心</th>
                    <th>工程案例</th>
                    <th>互动沟通</th>
                    <th>联系我们</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
            </thead>
         	<tbody>
                @foreach($data as $k => $v)
                <tr style="text-align:center">
                    <td>{{ $v['id'] }}</td>
                    <td><img src="/admin/images/uploads/kindeditor/shop/image/daohangtu/{{ $v['image1'] }}" alt="" width="50px"></td>
                    <td><img src="/admin/images/uploads/kindeditor/shop/image/daohangtu/{{ $v['image2'] }}" alt="" width="50px"></td>
                    <td><img src="/admin/images/uploads/kindeditor/shop/image/daohangtu/{{ $v['image3'] }}" alt="" width="50px"></td>
                    <td><img src="/admin/images/uploads/kindeditor/shop/image/daohangtu/{{ $v['image4'] }}" alt="" width="50px"></td>
                    <td><img src="/admin/images/uploads/kindeditor/shop/image/daohangtu/{{ $v['image5'] }}" alt="" width="50px"></td>
                    <td>{{ $v['time'] }}</td>
                    <td>
                        <a href="/admin/banner_pic/delete/{{ $v['id'] }}" style="color:black;font-size:20px;margin-left:10px;" title="删除"><i class="icol-bin-closed"></i></a>
                        <a href="/admin/banner_pic/edit/{{ $v['id'] }}" style="color:black;font-size:20px;margin-left:10px;" title="修改"><i class="icon-pencil" ></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="dataTables_paginate paging_full_numbers" id="page_page">
            {!! $data->appends($request) -> render() !!}
        </div>
    </div>
</div>  
@endsection