@extends('layout.master')
@section('content-title', 'Danh sách sản phẩm')
@section('content')
    <table class="table table-striped">
        <thead class="">
            <th scope="col">Ten san</th>
            <th scope="col">Price</th>
            <th scope="col">so luong</th>
            <th scope="col">Trang thai</th>
        </thead>
        <tbody>
            @foreach ($requestData as $item)
                <tr>
                    <td scope="row">{{ $item['name'] }}</td>
                    <td scope="row">{{ $item['price'] }}</td>
                    <td scope="row">{{ $item['sl'] }}</td>
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
