@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 分类列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <form action="/admin/news_cate/index" method="get">
                <label>显示 
                <select size="1" name="count" aria-controls="DataTables_Table_1">
                    <option value="5" @if(!empty($request['count']) && $request['count']==5) selected @endif>5</option>
                    <option value="10" @if(!empty($request['count']) && $request['count']==10) selected @endif>10</option>
                    <option value="15" @if(!empty($request['count']) && $request['count']==15) selected @endif>15</option>
                    <option value="25" @if(!empty($request['count']) && $request['count']==25) selected @endif>25</option>
                    <option value="40" @if(!empty($request['count']) && $request['count']==40) selected @endif>40</option>
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
            <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>父类ID</th>
                        <th>分类路径</th>
                        <th>分类创建的时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k => $v)
                    <tr style="text-align:center">

                        <td>{{$v['id']}}</td>
                        <td>
                            <?php
                                $l=substr_count($v['path'],',');
                            ?>
                            {{ str_repeat('|---',$l).$v['name'] }}
                        </td>
                        <td>{{$v['fid']}}</td>
                        <td>{{$v['path']}}</td>
                        <td>{{$v['time']}}</td>
                        <td>
                            <a href="/admin/news_cate/delete/{{$v['id']}}" style="color:black;font-size:20px;margin-left:10px;" title="删除"><i class="icol-bin-closed"></i></a>
                            <a href="/admin/news_cate/edit/{{$v['id']}}" style="color:black;font-size:20px;margin-left:10px;" title="修改"><i class="icon-pencil" ></i></a>
                            <a href="/admin/news_cate/add/{{$v['id']}}" style="color:black;font-size:20px;margin-left:10px;" title="添加"><i class="icon-plus"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
        <div class="dataTables_paginate paging_full_numbers" id="page_page">
            {!! $data->appends($request) -> render() !!}
        </div>
         </div>
    </div>
</div>
@endsection
