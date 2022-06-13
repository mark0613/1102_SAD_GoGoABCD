@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')



<div class="container-fluid top">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 center">
            <h3 class="mb-3">"{{ $_GET["keyword"] }}" - 搜尋結果</h3>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row top"></div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            @foreach ($products as $product)
            <?php
                $detail = $product["detail"];
                $author_or_singer = $product["as"];
                $inWishlist = $product["inWishlist"];
                $avg = $product["avg"];
                $p_id = $detail->p_id;
        
            ?>
            <div class="row shadow top bottom50">
                <br>
                <div class="col-4">
                    <div class="center">
                        <?php $path = $detail->photo; ?>
                        <img class="img-fluid" alt="product photo" src='{{ asset("/storage/$path") }}'>
                    </div>
                    <br>
                    <br>
                    <div class="center">
                        <div class="stars" id="rate-stars">
                            <label class="card-text">評價 : </label>
                            <form action="">
                                @for($i=5; $i>0; $i--)
                                <input class="star star-{{ $i }}" id="star-{{ $i }}-avg-${{ $detail->p_id }}" type="radio" name="star"
                                    value="{{ $i }}" 
                                @if($avg==$i) 
                                    checked 
                                @endif
                                >
                                <label class="star star-{{ $i }}" for="star-{{ $i }}-avg-${{ $detail->p_id }}"></label>
                                @endfor
                            </form>
                        </div>
                        <br>
                        
                    </div>
                </div>
                <div class="col-4">
                    <h5>
                        <a href="{{ asset('/detail/' . $p_id) }}">{{ $detail->p_name }}</a>
                    </h5>
                    <label>作者 : </label>
                    @foreach($author_or_singer as $as)
                    <label>{{ $as->name }}</label>
                    @endforeach
                    <br>
                    <label>出版社 : </label>
                    <label>{{ $detail->publisher }}</label>
                    <hr style="filter: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color="#000000" size="3" />
                    <p>商品描述:</p>
                    <p>{{ $detail->description }}</p>
                </div>
                <div class="col-4">
                    <div class="card h-100 shadow border-0">
                        <div class="card-body p-4">
                            <div class="center">
                                <label class="price">$</label>
                                <label class="price">{{ $detail->price }}</label>
                            </div>
                            <br>
                            <p>數量</p>
                            <div class="input-group">
                                <input type='button' value='-' class="btn btn-outline-danger"
                                    onclick="quantityChange({{ $p_id }}, -1)">
                                <input type='text' id="quantity-{{ $p_id }}" value='1' class="form-control item" />
                                <input type='button' value='+' class="btn btn-outline-primary"
                                    onclick="quantityChange({{ $p_id }}, 1)">
                            </div>
                            <br>
                            <div class="right pr-2">
                                <label class="card-text">庫存:</label>
                                <label class="card-text" id="inventory-{{ $p_id }}">{{ $detail->inventory }}</label>
                            </div>
                            <br>
                            <div class="center">
                                <div class="btn-group" role="group">
                                    <button type="button" @if($inWishlist) class="btn btn-danger"
                                        onclick="removeProductFromWishlist({{ $p_id }})" @else
                                        class="border border-dark btn btn-light" onclick="addProductToWishlist({{ $p_id }})"
                                        @endif id="wish-{{ $p_id }}">♡</button>
                                    <button type="button" class="btn btn-outline-danger"
                                        onclick="addProductToCart({{ $p_id }})">加入購物車</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endforeach
        </div>
        <div class="col-2"></div>
    </div>

</div>


@endsection