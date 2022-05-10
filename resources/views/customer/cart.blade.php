@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="right">
                <label>2項目</label>
            </div>
            <br>
            <div class="card h-100 shadow border-dark">
                <div class="card-body p-4 row">

                    <div class="col-1 align-self-center center">
                        <input class="form-check-input" type="checkbox">
                    </div>
                    <div class="col-3">
                        <img class="img-fluid" alt="100%x280"
                            src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/24/0010922454.jpg&v=62594944&w=180&h=180">
                    </div>
                    <div class="col-5">
                        <h5>從零開始投資店面的路程</h5>
                        <div>
                            <label class="price">$</label>
                            <label class="price">200</label>
                        </div>
                        <div class="input-group">
                            <input type='button' value='-' class="btn btn-outline-danger" />
                            <input type='text' name='quantity' value='0' class="form-control item" />
                            <input type='button' value='+' class="btn btn-outline-primary" />
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card h-100 shadow border-dark">
                <div class="card-body p-4 row">

                    <div class="col-1 align-self-center center">
                        <input class="form-check-input" type="checkbox">
                    </div>
                    <div class="col-3">
                        <img class="img-fluid" alt="100%x280"
                            src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/24/0010922454.jpg&v=62594944&w=180&h=180">
                    </div>
                    <div class="col-5">
                        <h5>從零開始投資店面的路程</h5>
                        <div>
                            <label class="price">$</label>
                            <label class="price">200</label>
                        </div>
                        <div class="input-group">
                            <input type='button' value='-' class="btn btn-outline-danger" />
                            <input type='text' name='quantity' value='0' class="form-control item" />
                            <input type='button' value='+' class="btn btn-outline-primary" />
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="form-inline right">
                <label class="price">$0</label>
                <div class="pl-1">
                    <button type="button" class="btn btn-danger">移除</button>
                </div>
                <div class="pl-1">
                    <button type="button" class="btn btn-primary">結帳</button>
                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>

</div>

@endsection