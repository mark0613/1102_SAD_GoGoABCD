<?php

$all_book_classes = DB::table("all_classes")->where("type", "=", "b")->get();
$all_music_classes = DB::table("all_classes")->where("type", "=", "m")->get();
$allClasses = [
    "實體書籍" => $all_book_classes,
    "實體唱片" => $all_music_classes,
    "電子書" => $all_book_classes,
    "數位音樂" => $all_music_classes,
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <!-- 功能 -->
                    <div class="form-group row">
                        <div class="col-10">
                            <div class="row">
                                <a href="../">
                                    <img src="{{ asset('image/logo.png') }}" alt="logo icon" class="logo icon-50">
                                </a>
                                <form class="form-inline pl-5">
                                    <div class="pr-1">
                                        <input class=" search" type="search" placeholder="依書名 作者 ISBN...搜尋"
                                            aria-label="Search">
                                    </div>
                                    <button class="btn btn-outline my-2 my-sm-0 search_button" type="submit">🔍</button>
                                </form>
                                <a href="/wishlist" class="pl-5">
                                    <img src="{{ asset('image/wishlist.png') }}" alt="wishlist icon" class="icon-50">
                                </a>
                                <a href="/cart" class="pl-3">
                                    <img src="{{ asset('image/shopping_cart.png') }}" alt="shopping cart icon" class="icon-50">
                                </a>
                                <a href="#" class="pl-3">
                                    <img src="{{ asset('image/cs.png') }}" alt="customer service icon" class="icon-50">
                                </a>
                            </div>
                        </div>
                        <div class="col-2">
                            @if(Auth::check())
                                @if(Auth::user()->u_type == 'merchant')
                                    <div class="right">
                                        <img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="photo">
                                        <div class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle no_underline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                                    我的帳戶
                                                </a>
                                                <div class="dropdown-menu account" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item center" href="{{ asset('/admin') }}">管理後台</a>
                                                    <a href="{{ asset('/user/auth/logout') }}" class="center btn-outline-primary btn">登出</a>
                                                </div>
                                        </div>
                                    </div>
                                @elseif(Auth::user()->u_type == 'member')
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
                                                <a class="dropdown-item center" href="profile">帳戶設定</a>
                                                <a class="dropdown-item center" href="mybook">我的書籍</a>
                                                <a class="dropdown-item center" href="mymusic">我的音樂</a>
                                                <a class="dropdown-item center" href="#">訂單資訊</a>
                                                <a href="{{ asset('/user/auth/logout') }}" class="center btn-outline-primary btn">登出</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="register_btn"> 
                                    <a href="user/auth/register" class="btn btn-primary btn-lg">加入會員</a>
                                    <br>
                                    <label>已有帳戶？</label>
                                    <a href="user/auth/login">登入</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- 商品 -->
                    <div class="top">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    @foreach($allClasses as $className => $classes)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#"
                                            id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                            aria-expanded="false">
                                            {{ $className }}
                                        </a>
                                        <div class="dropdown-menu dropdown-large"
                                            aria-labelledby="navbarDropdownMenuLink">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h3>分類</h3>
                                                        <br>
                                                        @foreach($classes as $class)
                                                        <a href="{{ asset('all?c_id=' . $class->c_id) }}" class="btn btn-outline-primary">{{ $class->class }}</a>
                                                        @endforeach
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
                                    @endforeach
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

    <div class="cover"></div>
    <?php $name = app()->view->getSections()['name'] ?>
    @if($name == 'detail')
        @include('window.detail')
    @elseif($name == 'cart')
        @include('window.cart')
    @endif

    <footer></footer>
</body>

</html>