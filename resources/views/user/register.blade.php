@extends('layout.user')

@section('title', $title)

@section('content')
<h2 class="center top">加入會員</h2>
<form method="post">
    {!! csrf_field() !!}
    <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label">Username:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="username" name="username">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email:</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name="password">
        </div>    
    </div>
    <div class="center">
        <button type="submit" class="btn btn-primary">加入</button>
    </div>
</form>
@endsection