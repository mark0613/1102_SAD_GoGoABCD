<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer">
    <title>@yield('title')</title>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <!-- date picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <!-- multiple select -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="/css/app.css?<?php echo date("css", time())?>">
    <link rel="stylesheet" href="/css/base.css?<?php echo date("css", time())?>">
    <link rel="stylesheet" href="/css/customer.css?<?php echo date("css", time())?>">
    <script src="/js/app.js?<?php echo date("js", time())?>"></script>
    <link rel="stylesheet" href="/css/home.css?<?php echo date("css", time())?>">
    <script src="/js/customer.js?<?php echo date("js", time())?>"></script>

</head>

<body>
    <div class="container-fluid nav_top">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="content">
                    <div class="form-group row">
                        <div class="col-10">
                            <div class="row">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToWUO2hyebkiqqD0TDwOYqnIttN40FJ85SGQ&usqp=CAU"
                                    class="logo">
                                <form class="form-inline pl-5">
                                    <div class="pr-1">
                                        <input class=" search" type="search" placeholder="依書名 作者 ISBN...搜尋"
                                            aria-label="Search">
                                    </div>
                                    <button class="btn btn-outline my-2 my-sm-0 search_button" type="submit">🔍</button>
                                </form>
                                <a href="#" class="pl-5"><img
                                        src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp"
                                        class="three_img"></a>
                                <a href="#" class="pl-3"><img
                                        src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp"
                                        class="three_img"></a>
                                <a href="#" class="pl-3"><img
                                        src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp"
                                        class="three_img"></a>
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="right">
                                <img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp"
                                    class="photo">
                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle no_underline" href="#"
                                        id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                        aria-expanded="false">
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
                                        <a class="nav-link dropdown-toggle no_underline" href="#"
                                            id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                            aria-expanded="false">
                                            實體書籍
                                        </a>
                                        <div class="dropdown-menu dropdown-large"
                                            aria-labelledby="navbarDropdownMenuLink">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h3>類別</h3>
                                                        <br>
                                                        <button type="submit"
                                                            class="btn btn-outline-primary">科幻</button>
                                                        <button type="submit"
                                                            class="btn btn-outline-primary">愛情</button>
                                                        <button type="submit"
                                                            class="btn btn-outline-primary">兒童</button>
                                                    </div>

                                                    <div class="col-4">
                                                        <h3>不知道要讀什麼?</h3>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-lg">好手氣</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#"
                                            id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                            aria-expanded="false">
                                            實體唱片
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#"
                                            id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                            aria-expanded="false">
                                            電子書
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#"
                                            id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                            aria-expanded="false">
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
                </div>
                <div class="col-1"></div>
            </div>
        </div>
        <div>
            @yield('content')
        </div>
    </div>

    <?php $name = app()->view->getSections()['name'] ?>
    @if($name == 'detail')
        @include('window.detail')
    @elseif($name == 'cart')
        @include('window.cart')
    @endif

    <footer></footer>
</body>

</html>