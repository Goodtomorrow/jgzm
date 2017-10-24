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
                    <span>网站配置列表</span>
                </div>
                <div class="mws-panel-body no-padding">
                    <form class="mws-form" action="/admin/config/update" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center">网站标题</label>
                                <div class="mws-form-item">
                                    <input class="small" type="text" name="title" value="{{Config::get('app.title')}}" id="title">
                                </div>
                            </div> 
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center">网站后台标题</label>
                                <div class="mws-form-item">
                                    <input class="small" type="text" name="admintitle" value="{{Config::get('app.admintitle')}}">
                                </div>
                            </div> 
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center">网站版权</label>
                                <div class="mws-form-item">
                                    <input class="small" type="text" name="copyright" value="{{Config::get('app.copyright')}}">
                                </div>
                            </div> 
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center">网站logo</label>
                               <div class="mws-form-item">
                                    <input class="small" type="file" name="logo" >
                                    <div id="mws-logo-wrap">
                                        <img src="/admin/images/uploads/{{Config::get('app.logo')}}" style="width:200px;height:70px" class="img">
                                    </div>
                                </div>
                            </div> 
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center;margin-top:-5px">网站开关</label>
                               <div class="mws-form-item">
                                    <span style="font-size:15px">开</span> <input type="radio" name="SWITCH" value="kai" @if(Config::get('app.SWITCH') == 'kai') checked @endif>
                                    <span style="font-size:15px">关</span> <input type="radio" name="SWITCH" value="guan" @if(Config::get('app.SWITCH') == 'guan') checked @endif>
                                   
                                </div>
                            </div> 
                        </div>
                        <div class="mws-button-row">
                            <input type="submit" value="编辑" class="btn btn-danger" style="margin-left:50px; width:200px;">
                            <input type="reset" value="重置" class="btn" style="margin-left:50px; width:200px;" id="chongzhi">
                        </div>
                    </form>
                </div>      
            </div>         
@endsection
