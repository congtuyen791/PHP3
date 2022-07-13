{{-- 1. Đang dùng layout nào --}}
@extends('layout.master')

{{-- 2. Nơi thay đổi hiển thị gì --}}
{{-- 2.1 Nếu nội dung thay đổi là text --}}
@section('title', 'Thêm sản phẩm')
{{-- 2.2 Nếu nội dung thay đổi là cụm thẻ --}}
@section('content')
    <form action="/products" method="get">
        @csrf
        <div class="form-group">
            <label for="">Tên sp</label>
            <input type="text" name='name' class="form-control">
        </div>
        <div class="form-group">
            <label for="">Số lượng</label>
            <input type="number" name='sl' class="form-control">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name='price' class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
@endsection
