<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <header>
        <nav></nav>
    </header>
    <div class="content">
        <div class="container-fluid top">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="form-group row">
                        <div class="col-10">
                            
                            <div class="row">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToWUO2hyebkiqqD0TDwOYqnIttN40FJ85SGQ&usqp=CAU" class="logo">
                                <form class="form-inline pl-5">
                                    <div class="pr-1">
                                        <input class=" search" type="search" placeholder="依書名 作者 ISBN...搜尋" aria-label="Search">
                                    </div>
                                    <button class="btn btn-outline my-2 my-sm-0 search_button" type="submit">🔍</button>
                                </form>
                                <a href="#" class="pl-5"><img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="three_img"></a>
                                <a href="#" class="pl-3"><img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="three_img"></a>
                                <a href="#" class="pl-3"><img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="three_img"></a>
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="right">
                                <img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="photo">
                                <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                            我的帳戶
                                        </a>
                                        <div class="dropdown-menu account" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item center" href="#">我的書籍</a>
                                            <a class="dropdown-item center" href="#">我得音樂</a>
                                            <a class="dropdown-item center" href="#">訂單資訊</a>
                                            <a class="dropdown-item center" href="#">帳戶設定</a>
                                            <button type="submit" class="center btn-outline-primary btn">登出</button>
                                        </div>
                                </div>
                            </div>

                            <!--<div class="right">
                                <img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="photo">
                                <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                            我的帳戶
                                        </a>
                                        <div class="dropdown-menu account" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item center" href="#">管理後台</a>
                                            <button type="submit" class="center btn-outline-primary btn">登出</button>
                                        </div>
                                </div>
                            </div>-->
                            
                            
                            <!--<div class="register_btn"> 
                                <button type="submit" class="btn btn-primary btn-lg">加入會員</button>
                                <br>
                                <label>已有帳戶？</label>
                                <a href="#">登入</a>
                            </div>-->
                            
                        </div>
                            
                        
                    </div>

                    <div class="top">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                            實體書籍
                                        </a>
                                        <div class="dropdown-menu dropdown-large" aria-labelledby="navbarDropdownMenuLink">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h3>類別</h3>
                                                        <br>
                                                        <button type="submit" class="btn btn-outline-primary">科幻</button>
                                                        <button type="submit" class="btn btn-outline-primary">愛情</button>
                                                        <button type="submit" class="btn btn-outline-primary">兒童</button>
                                                    </div>
                                                    
                                                    <div class="col-4">    
                                                        <h3>不知道要讀什麼?</h3>
                                                        <button type="submit" class="btn btn-primary btn-lg">好手氣</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                            實體唱片
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                            電子書
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                            數位音樂
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!--實體書籍-->
                    <div>
                        <div class="pt-5 pb-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="mb-3">實體書籍<br>您可能感興趣</h3>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a class="underline" href="#">檢視全部</a>
                                    </div>
                                    <div class="col-1 align-self-center">
                                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                            <i class=""><</i>
                                        </a>
                                    </div>
                                    <div class="col-10">
                                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row card-deck">
                                                        <div class="card">
                                                            <div class="book_cover">
                                                                <img class="img-fluid" alt="100%x280" src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/24/0010922454.jpg&v=62594944&w=180&h=180">
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
                                                            <img class="img-fluid" alt="100%x280" src="https://im2.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/00/0010920073.jpg&v=6256a64c&w=180&h=180">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Special title treatment</h4>
                                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                            </div>
                                                        </div>
                                                    
                                                    
                                                        <div class="card">
                                                            <img class="img-fluid" alt="100%x280" src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/26/0010922644.jpg&v=626a7abb&w=180&h=180">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Special title treatment</h4>
                                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                            </div>
                                                        </div>
                                                    
                                                    
                                                        <div class="card">
                                                            <img class="img-fluid" alt="100%x280" src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/06/0010920642.jpg&v=623af6b6&w=180&h=180">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Special title treatment</h4>
                                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row">

                                                        <div class="col-md-4 mb-3">
                                                            <div class="card">
                                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Special title treatment</h4>
                                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="card">
                                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Special title treatment</h4>
                                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="card">
                                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Special title treatment</h4>
                                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row">

                                                        <div class="col-md-4 mb-3">
                                                            <div class="card">
                                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Special title treatment</h4>
                                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="card">
                                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Special title treatment</h4>
                                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="card">
                                                                <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Special title treatment</h4>
                                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-1 align-self-center">
                                        <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                            <i class="">></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--廣告-->
                    <div class="width:50%">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active ad">
                                    <img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item ad">
                                <img src="..." class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item ad">
                                <img src="..." class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-1">
                    <a href="#" class="back-to-top "><button type="button" class="btn btn-primary circle bottom">TOP</button></a>
                </div>
            </div>
            
        </div>
    </div>
    
    <footer></footer>
</body>
</html>