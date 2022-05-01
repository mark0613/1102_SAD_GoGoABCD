@extends('layout.user')

@section('title', $title)

@section('content')
<h2>登入</h2>
<form>
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="account">Email or Username</label>
        <input type="text" class="form-control" id="account" name="account">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection