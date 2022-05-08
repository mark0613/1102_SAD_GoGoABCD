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
                                <a href="#" class="pl-4"><img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="three_img"></a>
                                <a href="#" class="pl-4"><img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="three_img"></a>
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="test">
                                <img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="test2">
                                <div class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle no_underline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                            我的帳戶
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="#">管理後台</a>
                                            
                                        </div>
                                </div>
                            </div>
                            
                            
                            <!--<div class="register_btn"> 
                                <button type="submit" class="btn btn-primary btn-lg">加入會員</button>
                                <br>
                                <label>已有帳戶？</label>
                                <a href="#">登入</a>
                            </div>-->
                            
                        </div>
                            
                        
                    </div>

                    <div>
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
                    <div>
                        實體書籍
                        您可能感興趣
                    </div>
                    
                </div>
                <div class="col-1"></div>
            </div>
            
        </div>
    </div>
    
    <footer></footer>
</body>
</html>