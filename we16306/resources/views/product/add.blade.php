{{-- 1. Đang dùng layout nào --}}
@extends('layout.master')

{{-- 2. Nơi thay đổi hiển thị gì --}}
{{-- 2.1 Nếu nội dung thay đổi là text --}}
@section('title', 'Thêm sản phẩm')
{{-- 2.2 Nếu nội dung thay đổi là cụm thẻ --}}
@section('content')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên sp</label>
            <input type="text" name='name' class="form-control">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name='price' class="form-control">
        </div>
        <div class="form-group">
            <label for="">avatar</label>
            <input type="file" name='avatar' class="form-control">
        </div>
        <div class="form-group">
            <label for="">status</label><br>
            <input type="radio" name='status' value="1" class="">con hang
            <input type="radio" name='status' value="0" class="">het hang
        </div>
        <div class="form-group">
            <button class="btn btn-success">Add new</button>
        </div>
        <button type="reset" class="btn btn-default">Nhập lại</button>
    </form>
@endsection
