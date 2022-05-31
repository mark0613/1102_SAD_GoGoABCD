<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/app.css?<?php echo date("css", time())?>">
    <link rel="stylesheet" href="/css/base.css?<?php echo date("css", time())?>">
    <link rel="stylesheet" href="/css/reader.css?<?php echo date("css", time())?>">
    <script src="/js/reader.js?<?php echo date("js", time())?>"></script>
</head>

<body>
    <nav>
        
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fix-on-screen fix-top full-x">
        <div class='mr-auto'>
            <h3>{{ $p_name }}</h3>
        </div>
        <a href="{{ asset('/mybook') }}" class="btn btn-danger float-right">X</a>
    </nav>
    <div class="empty-54"></div>
    <div class="contetn">
        <div class="center">
            <img src="{{ asset($path) }}" alt="e-book" width="1000px" id="book">
        </div>
    </div>

    <footer class="fix-on-screen fix-bottom full-x" style="padding: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <button class="btn btn-info float-left" onclick="changePage(-1)">&lt;</button>
                </div>
                <div class="col-4 center">
                    <button class="btn btn-info" onclick="resizePage(1)">＋</button>
                    <button class="btn btn-info" onclick="resizePage(-1)">－</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-info float-right" onclick="changePage(1)">&gt;</button>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>