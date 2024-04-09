@extends('layouts.master')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <div class="container pt-5">
        <div class="row">
            <h2 class="p-5">List all students</h2>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <p><a class="btn btn-primary" href="{{ route('create') }}">Thêm mới</a></p>
                    <table id="DataList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên học sinh</th>
                                <th>Số điện thoại</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //Khởi tạo vòng lập foreach lấy giá vào bảng
                            ?>
                            @foreach ($allStudents as $key => $student)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td><a class="text-decoration-none"
                                            href="{{ route('edit', ['id' => $student->id]) }}">Sửa</a></td>
                                    <td>
                                        <form action="{{ route('delete', ['id' => $student->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        <p>Hiển thị từ 1 đến 10 trong tổng số 14 dòng</p>
                        {{-- {{ $allStudents->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@show
