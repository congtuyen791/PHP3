@extends('layout.master')
@section('title', 'Quản lý người dùng')
@section('content-title', 'Quản lý người dùng')

@section('content')
<div class="">
    <a href="{{route('users.create')}}"><button class="btn btn-success">Tạo mới</button></a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Mã nhân viên</th>
            <th>Email</th>
            <th>Ảnh</th>
            <th colspan="2">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user_list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->birthday }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
            <td><img src="{{asset($item->avatar)}}" width="100px" alt=""></td>
            <td>
                <form action="{{ route('users.edit', ['id'=>$item->id]) }}" method="POST">
                    @csrf
                    @method('GET')
                    <button class="btn btn-warning">Chỉnh sửa</button>
                </form>

                <form action="{{route('users.delete',  $item->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Xóa</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    {{ $user_list->links() }}
</div>
@endsection