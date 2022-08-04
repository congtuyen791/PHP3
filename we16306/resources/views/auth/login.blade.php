@extends('layout.auth')
@section('content-title', 'Đăng nhập')
@section('content')

<div>
    @if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>
<form action="{{route('auth.postLogin')}}" class="signin-form" method="post">
@csrf
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Email" value="{{old('email')}}" name="email">
        @if ($errors->has('email'))
        <span>{{$errors->first('email')}}</span>
        @endif
    </div>
    <div class="form-group">
        <input id="password-field" type="password" class="form-control" placeholder="Password" name="password">
        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
    </div>
    <div class="form-group">
        <button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
    </div>
    <div class="form-group">
        <a href="{{asset('/auth/register')}}" class="form-control btn btn-danger submit px-3">Register</a>
    </div>
    <div class="form-group d-md-flex">
        <div class="w-50">
            <label class="checkbox-wrap checkbox-primary">Remember Me
                <input type="checkbox" checked>
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="w-50 text-md-right">
            <a href="#" style="color: #fff">Forgot Password</a>
        </div>
    </div>
</form>
@endsection