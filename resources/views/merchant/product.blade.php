@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')
<h3>商品管理</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-11 row">
            <div class="col-3">
                <select class="custom-select" id="inputGroupSelect01">
                    <option value="1">ID</option>
                    <option value="2">日期</option>
                    <option value="3">類別</option>
                </select>
            </div>
            <div class="col-5">
                <input type="text" class="form-control" id="" name="" placeholder="請輸入商品名稱">
            </div>
            <div class="col-1 pl-0">
                <button type="submit" class="btn btn-primary">搜尋</button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary open-window">上架新商品</button>
            </div>

            <div class="col-11 top">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">內容</th>
                            <th scope="col">使用點數</th>
                            <th scope="col">總金額</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>從零開始投資店面的路程 x 1 $200</td>
                            <td>10</td>
                            <td>$200</td>
                            <td>
                                <a href="#" aria-label="Previous">✏️</a><a href="#" aria-label="Previous">🗑️</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>



        <div class="col-1"></div>
    </div>
</div>
@endsection