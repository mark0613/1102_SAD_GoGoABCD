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
                            <th scope="col">商品名稱</th>
                            <th scope="col">庫存</th>
                            <th scope="col">單價</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $p)
                        <tr>
                            <td scope="row">{{ $p->p_id }}</td>
                            <td>{{ $p->p_name }}</td>
                            <td>{{ $p->price }}</td>
                            <td>${{ $p->inventory }}</td>
                            <td>
                                <img src="{{ asset('image/edit.png') }}" alt="edit icon" class="icon-30 hover-change-image" onmouseover="hover(this);" onmouseout="unhover(this);">
                                <img src="{{ asset('image/delete.png') }}" alt="delete icon" class="icon-30 hover-change-image" id="delete-{{ $p->p_id }}" onmouseover="hover(this);" onmouseout="unhover(this);">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>



        <div class="col-1"></div>
    </div>
</div>
@endsection