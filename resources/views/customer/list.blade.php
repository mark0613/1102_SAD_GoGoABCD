@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid top">

    <div class="row">
        <div class="col-1 "></div>
        <div class="col-10 row">
            <div class="container">
                <div class="row top">
                    <div class="col-6">
                        <h3 class="mb-3">類別名稱</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a class="underline" href="#">檢視全部</a>
                    </div>
                    <div class="col-1 align-self-center">
                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button"
                            data-slide="prev">
                            <i class="">
                                &lt;</i>
                        </a>
                    </div>
                    <div class="col-10">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row card-deck">
                                        <div class="card">
                                            <div class="book_cover">
                                                <img class="img-fluid" alt="100%x280"
                                                    src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/24/0010922454.jpg&v=62594944&w=180&h=180">
                                                <div class="info">
                                                    <p>從零開始投資店面的路程</p>
                                                    <button class="btn btn-primary">More</button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title book_name">從零開始投資店面的路程</h5>
                                                <label class="card-text">作者:</label>
                                                <label class="card-text">pingleo桑</label>
                                                <br>
                                                <label class="card-text">評價:</label>
                                                <label class="card-text">⭐⭐⭐⭐⭐</label>
                                                <br>
                                                <label class="card-text bold">價格:$</label>
                                                <label class="card-text bold">200</label>
                                                <br>
                                                <div class="right pr-2">
                                                    <label class="card-text">庫存:</label>
                                                    <label class="card-text">3</label>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="btn-group center" role="group">
                                                    <button type="button" class="btn btn-danger">♡</button>
                                                    <button type="button" class="btn btn-primary">加入購物車</button>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://im2.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/00/0010920073.jpg&v=6256a64c&w=180&h=180">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/26/0010922644.jpg&v=626a7abb&w=180&h=180">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280"
                                                src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/06/0010920642.jpg&v=623af6b6&w=180&h=180">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280"
                                                    src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in
                                                        to additional content.</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280"
                                                    src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in
                                                        to additional content.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280"
                                                    src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in
                                                        to additional content.</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280"
                                                    src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in
                                                        to additional content.</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280"
                                                    src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in
                                                        to additional content.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280"
                                                    src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural lead-in
                                                        to additional content.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-1 align-self-center">
                        <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button"
                            data-slide="next">
                            <i class="">&gt;</i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-1"></div>
    </div>

</div>

@endsection