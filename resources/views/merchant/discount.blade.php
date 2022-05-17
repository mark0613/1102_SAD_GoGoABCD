@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')
<div class="container top">

    <div class="row">
        <div class="col-10 center">
            <h3>優惠管理</h3>
        </div>
        <div class="col-2"></div>

        <div class="col-8 center"></div>
        <div class="col-2">
            <button type="button" class="btn btn-primary open-window">新增優惠</button>
            <br>
            <br>
        </div>
        <div class="col-2"></div>

        <div class="col-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">優惠名稱</th>
                        <th scope="col">商品</th>
                        <th scope="col">折扣</th>
                        <th scope="col">起</th>
                        <th scope="col">迄</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>從零開始投資店面的路程</td>
                        <td>9% off</td>
                        <td>2022-05-08<br>20:40:00</td>
                        <td>2022-05-10<br>20:40:00</td>
                        <td>
                            <img src="{{ asset('image/pencil.png') }}" alt="pencil" width="30px">
                            <img src="{{ asset('image/trash-bin.webp') }}" alt="trash-bin" width="30px">
                        </td>
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
        <div class="col-2">

        </div>
    </div>
</div>


@endsection