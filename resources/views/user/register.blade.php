@extends('layout.user')

@section('title', $title)

@section('content')
<h2 class="center top">加入會員</h2>
<form method="post">
    {!! csrf_field() !!}
    <div class="form-group row">
        <label for="username" class="col-sm-12 col-form-label">Username</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="username" name="username">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-12 col-form-label">Email</label>
        <div class="col-sm-12">
            <input type="email" class="form-control" id="email" name="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-12 col-form-label">Password</label>
        <div class="col-sm-12">
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="center">
        <button type="submit" class="btn btn-primary">加入</button>
        <br>
        <br>
        <div class="register_btn"> 
            <label>已有帳戶？</label>
            <a href="{{ asset('user/auth/login') }}">
                <u>登入</u>
            </a>
        </div>
    </div>
</form>
@endsection