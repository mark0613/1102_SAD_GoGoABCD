@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')
<div class="content">
    <div class="container-fluid top">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h3 class="center">帳戶設定</h3>
                <div class="row top10">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="left">
                            <label>Point :</label>
                            <label>{{ $profile->points }} pt</label>
                            <br>
                            <label>Level : </label>
                            <label>{{ $profile->level }}</label>
                        </div>
                        <hr>
                        <form method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="email">電子郵件</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $profile->email }}">
                            </div>
                            <div class="form-group">
                                <label for="name">真實姓名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $profile->name }}">
                            </div>
                            <div class="form-group">
                                <label for="tel">電話</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="address">地址</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $profile->address }}">
                            </div>
                            <div class="center">
                                <button type="submit" class="btn btn-primary">儲存</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-2"></div>
                </div>

            </div>
            <div class="col-3"></div>
        </div>
    </div>


</div>

@endsection