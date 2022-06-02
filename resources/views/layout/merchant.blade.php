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

    <link rel="stylesheet" href="/css/app.css?<?php echo date("css", time())?>">
    <link rel="stylesheet" href="/css/base.css?<?php echo date("css", time())?>">
    <link rel="stylesheet" href="/css/merchant.css?<?php echo date("css", time())?>">
    <script src="/js/merchant.js?<?php echo date("js", time())?>"></script>
    <script src="/js/app.js?<?php echo date("js", time())?>"></script>
    
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="../">
                <img src="{{ asset('image/logo.png') }}" alt="logo icon" class="logo icon-50">
            </a>

            <div class="form-inline my-2 my-lg-0">
                <a href="{{ asset('/user/auth/logout') }}"  class="btn btn-outline-primary btn-md my-2 my-sm-0" >登出</a>
            </div>

        </nav>
    </header>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 bg-light">
                    <div class="nav flex-column nav-pills nav-fill" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link sidebar_font center" href="{{asset('admin/staff')}}">人員管理</a>
                        <a class="nav-link sidebar_font center" href="{{asset('admin/record')}}">查詢訂單</a>
                        <a class="nav-link sidebar_font center" href="{{asset('admin/product')}}">管理商品</a>
                        <a class="nav-link sidebar_font center" href="{{asset('admin/discount')}}">管理優惠</a>
                        <a class="nav-link sidebar_font center" href="{{asset('admin/ad')}}">管理廣告</a>
                        <a class="nav-link sidebar_font center" href="{{asset('admin/chart')}}">產生報表</a>
                    </div>
                </div>
                <div class="col-10">@yield('content')</div>
            </div>
        </div>
    </div>
    
    <div class="cover"></div>
    <?php $name = app()->view->getSections()['name'] ?>
    @if($name == 'staff')
        @include('window.staff')
    @elseif($name == 'product')
        @include('window.product')
    @elseif($name == 'discount')
        @include('window.discount')
    @elseif($name == 'ad')
        @include('window.ad')
    @endif

    <footer></footer>
</body>

</html>