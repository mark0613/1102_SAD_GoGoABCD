@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')
<div class="container-fluid">
    <div class="row top">
        <div class="col-4"></div>
        <div class="col-4 center">
            <h3>訂單查詢</h3>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-2">
            <div class="input-group mb-3">
                <select class="custom-select" id="record-search-type">
                    <option value="id">ID</option>
                    <option value="date">日期</option>
                    <option value="class">類別</option>
                </select>
            </div>
        </div>
        <div class="col-5">
            <!--ID-->
            <div class="search-type-radio" id="search-id">
                <input type="text" class="form-control" id="r_id" name="record-id" placeholder="請輸入ID以查詢訂單">
            </div>

            <!--日期-->
            <div class="container-fluid search-type-radio" id="search-date">
                <div class="row">
                    <div class="col-6 row form-inline">
                        <label>起</label>
                        <div class="col">
                            <input type="date" class="form-control" id="search-start-date" name="start-date">
                        </div>
                    </div>
                    <div class="col-6 row form-inline">
                        <label>迄</label>
                        <div class="col">
                            <input type="date" class="form-control" id="search-end-date" name="end-date">
                        </div>
                    </div>
                </div>
            </div>

            <!--類別-->
            <div class="input-group search-type-radio" id="search-class">
                <select class="selectpicker multi-select fill" name="classes[]" id="classes" multiple
                    data-live-search="true" placeholder="Class">
                    @foreach ($classes["b"] as $class)
                    <option value="{{ $class->c_id }}" class="class-book">書本-{{ $class->class }}</option>
                    @endforeach
                    @foreach ($classes["m"] as $class)
                    <option value="{{ $class->c_id }}" class="class-music">音樂-{{ $class->class }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary" onclick="searchRecord()">搜尋</button>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row min-h-500">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">內容</th>
                        <th scope="col">使用點數</th>
                        <th scope="col">總金額</th>
                        <th scope="col">時間</th>
                    </tr>
                </thead>
                <tbody id="search-result">
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection