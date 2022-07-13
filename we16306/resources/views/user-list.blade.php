@extends('layout.master')
@section('content-title', 'Danh sach khach hang')
@section('content')
    <table class="table table-striped">
        <thead class="">
            <th scope="col">name</th>
            <th scope="col">tuổi</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Trang thái</th>

        </thead>
        <tbody>
            @foreach ($users_list as $item)
                <tr>
                    <td scope="row">{{ $item['name'] }}</td>
                    <td scope="row">{{ $item['age'] }}</td>
                    <td scope="row">{{ $item['address'] }}</td>
                    @if ($item['stutus'] === 1)
                        <td>Kích hoạt</td>
                    @else
                        <td>Không kích hoạt</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
