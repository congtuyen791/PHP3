@extends('layout.master')
@section('content-title', 'Thông tin khách hàng')
@section('content')
<p class="text-success">Đăng ký thành công</p>
<p>Ho ten: {{$name}}</p>
<p>Email: {{$email}}</p>
<p>Password: {{$password}}</p>
@endsection