@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-10 center">
            <h3>產生報表</h3>
            <div class="row top">
                <div class="col">
                    <select class="selectpicker multi-select" data-width="100%" name="productType[]" id="productType" multiple
                        data-live-search="true" placeholder="Class">
                        <option value="r-book">實體書籍</option>
                        <option value="e-book">電子書籍</option>
                        <option value="r-music">實體唱片</option>
                        <option value="e-music">數位音樂</option>
                    </select>
                </div>

                <div class="col form-inline">
                    <div class="row">
                        <label>起</label>
                        <div class="col">
                            <input type="date" class="form-control" stytle="" id="startDate" name="startDate">
                        </div>
                    </div>
                </div>
                <div class="col form-inline">
                    <div class="row">
                        <label>迄</label>
                        <div class="col">
                            <input type="date" class="form-control" id="endDate" name="endDate">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <select class="custom-select" id="chartType">
                        <option value="pie">圓餅圖</option>
                        <option value="bar">長條圖</option>
                    </select>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" onclick="generateChart()">產生</button>
                </div>

            </div>

            <div class="row top">
                <div class="col-2"></div>
                <div class="col-8">
                    <canvas class="figure" id="canvas-chart"></canvas>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection