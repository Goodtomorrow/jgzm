@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
            <div class="mws-panel-header">
                    <span class="icon-user">欢迎您,admin</span>
             </div>
            <div class="mws-panel-body no-padding">
            	<form class="mws-form" action="form_elements.html">
                	<div class="mws-form-inline">
                    	<div class="mws-form-row">
                        	<label class="mws-form-label">操作环境</label>
                        	<div class="mws-form-item">
                            	<input type="text" class="large" value="Windows NT" disabled="disabled">
                            </div>
                        </div>
                    	<div class="mws-form-row">
                        	<label class="mws-form-label">运行环境</label>
                        	<div class="mws-form-item">
                            	<input type="text" class="large" disabled="disabled" value="apache2handler">
                            </div>
                        </div>
                    	<div class="mws-form-row">
                        	<label class="mws-form-label">Apache版本</label>
                        	<div class="mws-form-item">
                            	<input type="text" class="large" value="Apache/2.4.23 (Win32) OpenSSL/1.0.2h PHP/5.6.28" readonly="readonly">
                            </div>
                        </div>
                    	<div class="mws-form-row">
                        	<label class="mws-form-label">PHP版本</label>
                        	<div class="mws-form-item">
                            	<input type="text" class="large"  value="5.6.28" readonly="readonly">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">PHP运行方式</label>
                            <div class="mws-form-item">
                                <input type="text" class="large" value="CGI/1.1" readonly="readonly">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">MYSQL版本</label>
                            <div class="mws-form-item">
                                <input type="text" class="large" value="5.5.5-10.1.19-MariaDB" readonly="readonly">
                            </div>
                        </div>
                         <div class="mws-form-row">
                            <label class="mws-form-label">服务器地址</label>
                            <div class="mws-form-item">
                                <input type="text" class="large" value="127.0.0.1" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </form>
            </div>    	
       </div>
@endsection