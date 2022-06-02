@extends('layout.user')

@section('title', $title)

@section('content')
<h2 class="center top">登入</h2>
<form method="post">
    {!! csrf_field() !!}
    <div class="form-group row">
        <label for="account" class="col-sm-12 col-form-label">Username</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="account" name="account">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-12 col-form-label">Password</label>
        <div class="col-sm-12">
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="center">
        <button type="submit" class="btn btn-primary">登入</button>
        <br>
        <br>
        <div class="register_btn"> 
            <label>還沒有帳戶？</label>
            <a href="{{ asset('user/auth/register') }}">
                <u>加入會員</u>
            </a>
        </div>
    </div>
</form>
@endsection