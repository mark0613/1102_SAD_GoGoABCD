@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8 center">
            <h3>管理廣告</h3>
            <br>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 center">
            <button type="button" class="btn btn-danger" onclick="deleteAdvertisement()">刪除</button>
            <button type="button" class="btn btn-primary open-window">新增</button>
        </div>
        <div class="col-2"></div>
        <br>
        <br>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $i = 0; ?>
                    @foreach($ads as $ad)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i==0 ? 'active' : '' }}"></li>
                    <?php $i++; ?>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <?php $i=0 ?>
                    @foreach($ads as $ad)
                    <div class="carousel-item ad {{ $i==0 ? 'active' : '' }}" id="a_id-{{ $ad->a_id }}">
                        <img src="{{ asset('storage/' . $ad->image) }}" class="d-block w-100" alt="{{ $ad->time }}"  height="300px" width="500px">
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