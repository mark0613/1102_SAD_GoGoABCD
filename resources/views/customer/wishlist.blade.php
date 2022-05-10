@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>我的願望清單</h3>
            <div class="card h-100 shadow border-0">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-4">
                            <div class="center">
                                <img class="img-fluid" alt="100%x280"
                                    src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/24/0010922454.jpg&v=62594944&w=180&h=180">
                            </div>
                            <br>
                            <br>
                            <div class="center">
                                <label class="card-text">評價 : </label>
                                <label class="card-text">⭐⭐⭐⭐⭐</label>
                                <br>
                                <label>類別 : </label>
                                <label>輕小說</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <h5>從零開始投資店面的路程</h5>
                            <label>作者 : </label>
                            <label>pingleo桑</label>
                            <br>
                            <label>出版社 : </label>
                            <label>劉家國際</label>
                            <hr style="filter: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color="#000000"
                                size="3" />
                            <p>商品描述:</p>
                            <p>想知道秉霖鮮果屋的創業秘辛嗎? 馬上購買這本書了解業界的點點滴滴!</p>
                        </div>
                        <div class="col-1">
                            <span class="col_line"></span>
                        </div>
                        <div class="col-3">
                            <div class="center">
                                <label class="price">$</label>
                                <label class="price">200</label>
                            </div>
                            <br>
                            <p>數量</p>
                            <div class="input-group">
                                <input type='button' value='-' class="btn btn-outline-danger" />
                                <input type='text' name='quantity' value='0' class="form-control item" />
                                <input type='button' value='+' class="btn btn-outline-primary" />
                            </div>
                            <br>
                            <div class="right pr-2">
                                <label class="card-text">庫存:</label>
                                <label class="card-text">3</label>
                            </div>
                            <br>
                            <div class="center">
                                <button type="submit" class="btn btn-primary">加入購物車</button>
                                <br>
                                <a class="underline" href="#">移除</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection