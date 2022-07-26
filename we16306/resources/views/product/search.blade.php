@extends('layout.master')
@section('content-title', 'Danh sách sản phẩm')
@section('content')
<div class="">
    <a href="{{route('products.create')}}"><button class="btn btn-success">Tạo mới</button></a>
</div>
<div class="form-group">
    <form action="{{route('products.search')}}" method="get" class="form-group">
    
        <input type="text" name="key" placeholder="nhap vao ten sp" class="form-control col-md-2">
        <button class="btn btn-primary">Search</button>
    </form>
</div>
<table class="table table-hover">
    <thead class="">
        <th scope="col">Ten</th>
        <th scope="col">Price</th>
        <th scope="col">avatar</th>
        <th scope="col">Trang thai</th>
    </thead>
    <tbody>
        @foreach ($product_list as $item)
        <tr>
            <td scope="row">{{ $item['name'] }}</td>
            <td scope="row">{{ $item['price'] }}</td>
            <td scope="row"><img src="{{asset($item->thumbnail_url)}}" width="200px" alt=""></td>
            @if ($item['status'] == 1)
            <td>
                <form action="{{ route('products.status', ['product'=>$item->id, $item->status]) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">con hang</button>
                </form>
            </td>
            @else
            <td>
                <form action="{{ route('products.status', ['product'=>$item->id, $item->status]) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Het hang</button>
                </form>
            </td>
            @endif
            <td>
                <form action="{{route('products.delete',  $item->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Xóa</button>
                </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>


@endsection