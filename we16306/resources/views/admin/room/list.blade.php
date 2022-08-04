@extends('layout.master')
@section('title', 'phòng ban')
@section('content-title', 'phòng ban')

@section('content')
<!-- <div class="">
    <a href="{{route('users.create')}}"><button class="btn btn-success">Tạo mới</button></a>
</div> -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên phong</th>
            <th>nhan viên</th>

            <th colspan="2">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($room_list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <ul>
                    @foreach($item->users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    {{ $room_list->links() }}
</div>
@endsection