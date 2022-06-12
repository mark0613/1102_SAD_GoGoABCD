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
    <nav class="navbar navbar-expand-lg bg-blue fix-on-screen fix-top full-x">
        <div class='mr-auto'></div>
        <div class='mr-auto'>
            <h2>{{ $p_name }}</h2>
        </div>
        <a href="{{ asset('/mybook') }}" class="btn btn-danger float-right">X</a>
    </nav>
    <div class="empty-54"></div>
    <div class="contetn">
        <div class="center">
            <img src="{{ asset($path) }}" alt="e-book" width="1000px" id="book">
        </div>
    </div>

    <footer class="bg-blue fix-on-screen fix-bottom full-x" style="padding: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    </div>
                    <div class="col-4 center">
                    <button class="btn btn-info btn-lg" onclick="changePage(-1)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                        </svg>
                    </button>
                    <button class="btn btn-info btn-lg" onclick="resizePage(1)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </button>
                    <button class="btn btn-info btn-lg" onclick="resizePage(-1)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </button>
                    <button class="btn btn-info btn-lg" onclick="changePage(1)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </button>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
    </footer>
</body>

</html>