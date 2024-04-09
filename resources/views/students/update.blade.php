@extends('layouts.master')
@section('content')
@if (session('msg'))
<div class="alert alert-danger">{{ session('msg') }}</div>
@endif
<p><a class="btn btn-primary" href="{{route('index')}}">Về danh sách</a></p>

<div class="col-xs-4 col-xs-offset-4">
	<center><h4>Sửa học sinh</h4></center>
	<form action="{{route('update',['id'=>$student->id])}}" method="POST">
		<input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}" />
		<input type="hidden" id="id" name="id" value="{!! $student->id !!}" />
		<div class="form-group">
			<label for="tenhocsinh">Tên học sinh</label>
			<input type="text" class="form-control" id="tenhocsinh" name="name" placeholder="Tên học sinh" maxlength="255" value="{{ $student->name }}" required />
		</div>
		<div class="form-group">
			<label for="sodienthoai">Số điện thoại</label>
			<input type="text" class="form-control" id="sodienthoai" name="phone" placeholder="Số điện thoại" maxlength="15" value="{{ $student->phone }}" required />
		</div>
		<center><button type="submit" class="btn btn-primary">Lưu lại</button></center>
	</form>
</div>

@show