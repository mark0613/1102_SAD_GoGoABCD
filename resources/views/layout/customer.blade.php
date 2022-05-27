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
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToWUO2hyebkiqqD0TDwOYqnIttN40FJ85SGQ&usqp=CAU"
                                        class="logo">
                                </a>
                                <form class="form-inline pl-5">
                                    <div class="pr-1">
                                        <input class=" search" type="search" placeholder="依書名 作者 ISBN...搜尋"
                                            aria-label="Search">
                                    </div>
                                    <button class="btn btn-outline my-2 my-sm-0 search_button" type="submit">🔍</button>
                                </form>
                                <a href="/wishlist" class="pl-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                    <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                                </svg>
                                </a>
                                <a href="/cart" class="pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                                </a>
                                <a href="#" class="pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                                </svg>
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
                                                        <a href="#" class="btn btn-outline-primary">{{ $class->class }}</a>
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