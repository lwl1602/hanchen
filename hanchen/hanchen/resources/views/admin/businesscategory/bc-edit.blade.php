@extends('layouts.content')

@section('content')
<article class="page-container">
	@if(count($errors) > 0)
		<div class="Huialert Huialert-danger">
			@if(is_object($errors))
				@foreach($errors->all() as $error)
					<i class="icon-remove"></i>&nbsp;&nbsp;*{{ $error }}
				@endforeach
			@else
				<i class="icon-remove"></i>{{ $errors }}
			@endif
		</div>
	@endif
	<form action="{{ url('admin/bc/edit/'.$bc->bc_id)}}" method="post" class="form form-horizontal" id="form-admin-role-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>点击时图标：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="click" id="uploadfile" readonly placeholder="业务的点击图标" value="{{ $bc->bc_click }}" style="width:200px">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" name="file-1" id="file-2" class="input-file">
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>未点击时图标：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="unclick" id="uploadfile" readonly placeholder="业务的点击图标" value="{{ $bc->bc_unclick }}" style="width:200px">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" name="file-2" id="file-2" class="input-file">
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="name" id="" placeholder="显示在主界面信息" value="{{ $bc->bc_name }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类英文名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="enname" id="" placeholder="显示在主界面信息" value="{{ $bc->bc_enname }}" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修&nbsp;&nbsp;改&nbsp;&nbsp;">
			</div>
		</div>
	</form>
	</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/validate-methods.js') }}"></script>
<script type="text/javascript" src="{{ asset('style/lib/jquery.validation/1.14.0/messages_zh.js') }}"></script>
<!--/请在上方写此页面业务相关的脚本-->
@stop