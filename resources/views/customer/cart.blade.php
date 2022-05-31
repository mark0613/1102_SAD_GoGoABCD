@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="right">
                <label>{{ $total }}項目</label>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<div class="container-fluid">
    <?php 
        $totalCost = 0; 
    ?>
    @foreach($cart as $product)
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8">
            <br>
            <div class="card h-100 shadow border-dark">
                <div class="card-body p-4 row">

                    <div class="col-1 align-self-center center">
                        <input class="form-check-input" type="checkbox" id="check-{{ $product['p_id'] }}" value="{{ $product['p_id'] }}" name="remove[]">
                    </div>
                    <div class="col-3">
                        <?php $path = "storage/" . $product["photo"]; ?>
                        <img class="img-fluid" alt="product photo" src="{{ $path }}">
                    </div>
                    <div class="col-5">
                        <h5>{{ $product["p_name"] }}</h5>
                        <div>
                            <label class="price">$</label>
                            <label class="price" id="price-{{ $product['p_id'] }}">{{ $product["price"] }}</label>
                        </div>
                        <div class="input-group">
                            <input type='button' value='-' class="btn btn-outline-danger"  onclick="quantityChange({{ $product['p_id'] }}, -1); updateQuantity({{ $product['p_id'] }});">
                            <input type='text' class='quantity' id="quantity-{{ $product['p_id'] }}" value='{{ $product["quantity"] }}' class="form-control item" />
                            <input type='button' value='+' class="btn btn-outline-primary"  onclick="quantityChange({{ $product['p_id'] }}, 1); updateQuantity({{ $product['p_id'] }});">
                        </div>
                        <div>
                            <label>
                                (庫存:<span id="inventory-{{ $product['p_id'] }}">{{ $product['inventory'] }}</span>)
                            </label>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    @endforeach

    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="form-inline right">
                <label class="price">$</label>
                <label class="price total-cost"></label>
                <div class="pl-1">
                    <button type="button" class="btn btn-danger" onclick="removeProductFromCart()">移除</button>
                </div>
                <div class="pl-1">
                    <button type="button" class="btn btn-primary open-window">結帳</button>
                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>

</div>

@endsection