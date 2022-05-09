@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')
<div class="content">
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <h3 class="mx-auto">帳戶設定</h3>
        </nav>
    
        <div class="row">
            <div class="col-2 bg-light">
                <div class="nav flex-column nav-pills nav-fill" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link sidebar_font center" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">帳號</a>
                    <a class="nav-link sidebar_font center" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">基本資料</a>

                </div>
            </div>
            <div class="col-8">
                
                <!--帳號-->
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h4 class="center top">帳號</h4>
                        <form>
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="account">電子郵件</label>
                                <input type="text" class="form-control" id="account" name="account">
                            </div>
                            <div class="form-group">
                                <label for="password">密碼</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="center">
                                <button type="submit" class="btn btn-primary">儲存</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>

                <!--基本資料-->
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h4 class="center top">基本資料</h4>
                        <div class="center">
                            <label>Point :</label>
                            <label>50pt</label>
                            <br>
                            <label>等級 : LV </label>
                            <label>1</label>
                        </div>
                        <hr style="filter: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color="#000000" size="3" />
                        <form>
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="account">姓名</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="password">電話</label>
                                <input type="text" class="form-control" id="tel" name="tel">
                            </div>
                            <div class="form-group">
                                <label for="password">地址</label>
                                <input type="text" class="form-control" id="tel" name="tel">
                            </div>
                            <div class="center">
                                <button type="submit" class="btn btn-primary">儲存</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>
                
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    
</div>

@endsection