@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="#">首頁</a></li>
                <li class="breadcrumb-item"><a href="#">電子書</a></li>
                <li class="breadcrumb-item active" aria-current="page">類別</li>
            </ol>

            <div class="row">
                <div class="col-4">
                    <div class="center">
                        <img class="img-fluid" alt="100%x280"
                            src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/24/0010922454.jpg&v=62594944&w=180&h=180">
                    </div>
                    <br>
                    <br>
                    <div class="center">
                        <div class="stars" id="rate-stars">
                            <label class="card-text">評價 : </label>
                            <form action="">
                                <input class="star star-5" id="star-5-${i}" type="radio" name="star" value="5">
                                <label class="star star-5" for="star-5-${i}"></label>
                                <input class="star star-4" id="star-4-${i}" type="radio" name="star" value="4">
                                <label class="star star-4" for="star-4-${i}"></label>
                                <input class="star star-3" id="star-3-${i}" type="radio" name="star" value="3">
                                <label class="star star-3" for="star-3-${i}"></label>
                                <input class="star star-2" id="star-2-${i}" type="radio" name="star" value="2">
                                <label class="star star-2" for="star-2-${i}"></label>
                                <input class="star star-1" id="star-1-${i}" type="radio" name="star" value="1">
                                <label class="star star-1" for="star-1-${i}"></label>
                            </form>
                        </div>
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
                <div class="col-4">
                    <div class="card h-100 shadow border-0">
                        <div class="card-body p-4">
                            <div class="center">
                                <label class="price">$</label>
                                <label class="price">200</label>
                            </div>
                            <br>
                            <p>數量</p>
                            <div class="input-group">
                                <input type='button' value='-' class="btn btn-outline-danger" onclick="quantityChange(0, -1)">
                                <input type='text' id="quantity-0" value='1' class="form-control item" />
                                <input type='button' value='+' class="btn btn-outline-primary" onclick="quantityChange(0, 1)">
                            </div>
                            <br>
                            <div class="right pr-2">
                                <label class="card-text">庫存:</label>
                                <label class="card-text">3</label>
                            </div>
                            <br>
                            <div class="center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-danger">♡</button>
                                    <button type="button" class="btn btn-primary" onclick="addProductToCart(15)">加入購物車</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row top">
                <div class="col-4">
                    <div class="center">
                        <h5>評分</h5>
                        <br>
                        <label class="card-text">平均分數 </label>
                        <br>
                        <div class="stars" id="avg-stars">
                            <form action="">
                                <input class="star star-5" id="star-5-${i}" type="radio" name="star" value="5">
                                <label class="star star-5" for="star-5-${i}"></label>
                                <input class="star star-4" id="star-4-${i}" type="radio" name="star" value="4">
                                <label class="star star-4" for="star-4-${i}"></label>
                                <input class="star star-3" id="star-3-${i}" type="radio" name="star" value="3">
                                <label class="star star-3" for="star-3-${i}"></label>
                                <input class="star star-2" id="star-2-${i}" type="radio" name="star" value="2">
                                <label class="star star-2" for="star-2-${i}"></label>
                                <input class="star star-1" id="star-1-${i}" type="radio" name="star" value="1">
                                <label class="star star-1" for="star-1-${i}"></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div>
                        <button type="button" class="btn btn-primary comment_right">給予評價</button>
                    </div>
                    <br>
                    <br>
                    <div>
                        <div class="card h-100 shadow border-0">
                            <div class="card-body p-4">
                                <h3>me</h3>
                                <div class="stars" id="comment-stars">
                                    <form action="">
                                        <input class="star star-5" id="star-5-${i}" type="radio" name="star" value="5">
                                        <label class="star star-5" for="star-5-${i}"></label>
                                        <input class="star star-4" id="star-4-${i}" type="radio" name="star" value="4">
                                        <label class="star star-4" for="star-4-${i}"></label>
                                        <input class="star star-3" id="star-3-${i}" type="radio" name="star" value="3">
                                        <label class="star star-3" for="star-3-${i}"></label>
                                        <input class="star star-2" id="star-2-${i}" type="radio" name="star" value="2">
                                        <label class="star star-2" for="star-2-${i}"></label>
                                        <input class="star star-1" id="star-1-${i}" type="radio" name="star" value="1">
                                        <label class="star star-1" for="star-1-${i}"></label>
                                    </form>
                                </div>
                                <br>
                                <label class="card-text">那我也要睡拉</label>
                                <label class="comment_time">2022/05/07 14:05</label>
                            </div>
                        </div>
                        <br>
                        <div class="card h-100 shadow border-0">
                            <div class="card-body p-4">
                                <label class="card-text">⭐⭐⭐⭐⭐</label>
                                <br>
                                <label class="card-text">這本書讓我學會如何開店了，非常有幫助</label>
                                <label class="comment_time">2022/05/09 14:07</label>
                            </div>
                        </div>
                        <br>
                        <div class="card h-100 shadow border-0">
                            <div class="card-body p-4">
                                <label class="card-text">⭐⭐⭐⭐⭐</label>
                                <br>
                                <label class="card-text">現在我有冰淇淋</label>
                                <label class="comment_time">2022/05/09 19:07</label>
                            </div>
                        </div>
                        <br>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<!--
<div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
</div>
-->
@endsection