@extends('admin.layout.index')

@section('js')
<script type="text/javascript">
    function tishi(){
        var v = document.getElementById('p').value;
        v.display:block;
        alert('v');
    }
</script>
@endsection

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>案例展示列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <form action="/admin/case/index" method="get">
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
                    <th>案例ID</th>
                    <th>分类ID</th>
                    <th>案例名称</th>
                    <th>案例图片</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $k => $v)
                <tr style="text-align:center">
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['cid'] }}</td>
                    <td>{{ $v['name'] }}</td>
                    <td> <img src="/admin/images/uploads/kindeditor/shop/image/case/{{ $v['image'] }}" style="width:100px"/></td>
                    <td>{{ $v['time'] }}</td>
                    <td>
                        <a href="/admin/case/delete/{{ $v['id'] }}" style="color:black;font-size:20px;margin-left:10px;" title="删除"><i class="icol-bin-closed"></i></a>
                        <a href="/admin/case/edit/{{ $v['id'] }}" style="color:black;font-size:20px;margin-left:10px;" title="修改"><i class="icon-pencil" ></i></a>
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




