@extends('layouts.master')
@section('content')
<p><a class="btn btn-primary" href="{{route('index')}}">Về danh sách</a></p>
<div class="col-xs-4 col-xs-offset-4">
	<center><h4>Thêm học sinh</h4></center>
	<form action="{{route('store')}}" method="post">
		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
		<div class="form-group">
			<label for="tenhocsinh">Tên học sinh</label>
			<input type="text" class="form-control" id="tenhocsinh" name="name" placeholder="Tên học sinh" maxlength="255" required />
		</div>
		<div class="form-group">
			<label for="sodienthoai">Số điện thoại</label>
			<input type="text" class="form-control" id="sodienthoai"  name="phone" placeholder="Số điện thoại" maxlength="15" required />
		</div>		
		<center><button type="submit" class="btn btn-primary">Thêm</button></center>
	</form>
</div>

@show