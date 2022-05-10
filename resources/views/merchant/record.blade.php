@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')
<div class="container-fluid">
    <h3>訂單查詢</h3>
    <div class="row">
        <div class="col-2">
            <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect01">
                    <option value="1">ID</option>
                    <option value="2">日期</option>
                    <option value="3">類別</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <!--ID-->
            <input type="text" class="form-control" id="" name="" placeholder="請輸入ID以查詢訂單">

            <!--日期-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 row form-inline">
                        <label>起</label>
                        <div class="col">
                            <input type="date" class="form-control" id="" name="">
                        </div>
                    </div>
                    <div class="col-6 row form-inline">
                        <label>迄</label>
                        <div class="col">
                            <input type="date" class="form-control" id="" name="">
                        </div>
                    </div>
                </div>
            </div>

            <!--類別-->
            <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect01">
                    <option value="1">cc</option>
                    <option value="2">bb</option>
                    <option value="3">aa</option>
                </select>
            </div>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary">搜尋</button>
        </div>
        <div class="col-2"></div>

    </div>
    <div class="row ">
        <div class="col-10">
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
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>從零開始投資店面的路程 x 1 $200</td>
                        <td>10</td>
                        <td>$200</td>
                        <td>2022-05-08<br>20:40:00</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2022-05-08<br>20:40:00</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection