@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8 center">
            <h3>我的願望清單</h3>
        </div>
        <div class="col-2"></div>
    </div>
    <?php $i=0; ?>
    @foreach($wishlist as $wish)
    <?php $p_id = $wish->p_id ?>
    <div class="row top10">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card h-100 shadow border-0">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-4">
                            <div class="center">
                                <?php $path = $wish->photo; ?>
                                <img class="img-fluid" alt="product photo" src='{{ asset("/storage/$path") }}'>
                            </div>
                            <br>
                            <br>
                            <div class="center">
                                <label class="card-text">評價 : </label>
                                <br>
                                <div class="stars" id="avg-stars">
                                    <form action="">
                                        @for($j=5; $j>0; $j--)
                                        <input class="star star-{{ $j }}-{{ $i }}" id="star-{{ $j }}-avg-{{ $i }}" type="radio" name="star" value="{{ $j }}"
                                            @if($avg[$i] == $j)
                                            checked
                                            @endif
                                        >
                                        <label class="star star-{{ $j }}-{{ $i }}" for="star-{{ $j }}-avg-{{ $i }}"></label>
                                        @endfor
                                    </form>
                                </div>
                                <br>
                                <label>類別 : </label>
                                @foreach($classes[$i] as $class)
                                <label>{{ $class->class }}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-4">
                            <h4>
                                <a href='{{ asset("/detail/$p_id") }}'>{{ $wish->p_name }}</a>
                            </h4>
                            <br>
                            <label>作者 : </label>
                            @foreach($author_or_singer[$i] as $as)
                            <label>{{ $as->name }}</label>
                            @endforeach
                            <br>
                            <br>
                            <label>出版社 : </label>
                            <label>{{ $wish->publisher }}</label>
                            <br>
                            <br>
                            <hr>
                            <br>
                            <p>商品描述:</p>
                            <p>{{ $wish->description }}</p>
                        </div>
                        <div class="col-4 card-body shadow border-0">
                            <div class="center">
                                <label class="price">$</label>
                                <label class="price">{{ $wish->price }}</label>
                            </div>
                            <br>
                            <p>數量</p>
                            <div class="input-group">
                                <input type='button' value='-' class="btn btn-outline-danger" onclick="quantityChange({{ $p_id }}, -1)">
                                <input type='text' id="quantity-{{ $p_id }}" class="form-control item quantity" value='1'>
                                <input type='button' value='+' class="btn btn-outline-primary" onclick="quantityChange({{ $p_id }}, 1)">
                            </div>
                            <br>
                            <div class="right pr-2">
                                <label class="card-text">庫存:</label>
                                <label class="card-text" id="inventory-{{ $p_id }}">{{ $wish->inventory }}</label>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="center">
                                <button type="button" class="btn btn-outline-danger" onclick="addProductToCart({{ $p_id }})">加入購物車</button>
                                <br>
                                <br>
                                <a class="underline" href="" onclick="removeProductFromWishlist({{ $p_id }}, false)">移除</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <br>
    <?php $i++; ?>
    @endforeach
    @if ($i == 0)
    <div class="min-h-500"></div>
    @endif
</div>

@endsection