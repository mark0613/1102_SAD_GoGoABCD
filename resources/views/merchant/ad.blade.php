@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-10 center">
            <h3>管理廣告</h3>
            <br>
        </div>
        <div class="col-2"></div>

        <div class="col-3"></div>
        <div class="col-4 center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-danger">刪除</button>
                <button type="button" class="btn btn-primary open-window">新增</button>
            </div>
        </div>
        <div class="col-3"></div>
        <div class="col-2"></div>
        <br>
        <br>

        <div class="col-10">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php $i=0 ?>
                    @foreach($ads as $ad)
                    <div class="carousel-item ad {{ $i==0 ? 'active' : '' }}">
                        <?php $path = "../storage/" . $ad->image; ?>
                        <img src="{{ $path }}" class="d-block w-100" alt="{{ $ad->time }}" height="700px" width="500px">
                    </div>
                    <?php $i++?>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection