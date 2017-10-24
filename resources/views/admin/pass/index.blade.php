@extends('/admin/layout/index')
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
                    <span>修改密码</span>
                </div>
                <div class="mws-panel-body no-padding">
                    <form class="mws-form" action="/admin/pass/update" method="post" >
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{  session('adminid') }}">
                        <div class="mws-form-inline"> 
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center">管理员账号</label>
                                <div class="mws-form-item">
                                    <input class="small" type="text" name="username" value="{{ session('adminusername') }}" disabled="disabled">
                                </div>
                            </div> 
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center">原始密码</label>
                                <div class="mws-form-item">
                                    <input class="small" type="password" name="oldpassword" value="" >
                                </div>
                            </div> 
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center">新密码</label>
                                <div class="mws-form-item">
                                    <input class="small" type="password" name="newpassword" value="">
                                </div>
                            </div>  
                            <div class="mws-form-row">
                                <label class="mws-form-label" style="text-align: center">确认密码</label>
                                <div class="mws-form-item">
                                    <input class="small" type="password" name="cpassword" value="">
                                </div>
                            </div>   
                        </div>
                        <div class="mws-button-row">
                            <input type="submit" value="修改" class="btn btn-danger" style="margin-left:50px; width:200px;">
                            <input type="reset" value="重置" class="btn " style="margin-left:50px; width:200px;">
                        </div>
                    </form>
                </div>      
            </div>     

 @endsection
