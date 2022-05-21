@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>我的願望清單</h3>
        </div>
        <div class="col-2"></div>
    </div>
    <?php $i=0; ?>
    @foreach($wishlist as $wish)
    <?php $p_id = $wish->p_id ?>
    <div class="row">
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
                            <h5>
                                <a href='{{ asset("/detail/$p_id") }}'>{{ $wish->p_name }}</a>
                            </h5>
                            <label>作者 : </label>
                            @foreach($author_or_singer[$i] as $as)
                            <label>{{ $as->name }}</label>
                            @endforeach
                            <br>
                            <label>出版社 : </label>
                            <label>{{ $wish->publisher }}</label>
                            <hr style="filter: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color="#000000"
                                size="3" />
                            <p>商品描述:</p>
                            <p>{{ $wish->description }}</p>
                        </div>
                        <div class="col-1">
                            <span class="col_line"></span>
                        </div>
                        <div class="col-3">
                            <div class="center">
                                <label class="price">$</label>
                                <label class="price">{{ $wish->price }}</label>
                            </div>
                            <br>
                            <p>數量</p>
                            <div class="input-group">
                            <input type='button' value='-' class="btn btn-outline-danger" onclick="quantityChange({{ $p_id }}, -1)">
                                <input type='text' id="quantity-{{ $p_id }}" value='1' class="form-control item" />
                                <input type='button' value='+' class="btn btn-outline-primary" onclick="quantityChange({{ $p_id }}, 1)">
                            </div>
                            <br>
                            <div class="right pr-2">
                                <label class="card-text">庫存:</label>
                                <label class="card-text">{{ $wish->inventory }}</label>
                            </div>
                            <br>
                            <div class="center">
                                <button type="button" class="btn btn-primary" onclick="addProductToCart({{ $p_id }})">加入購物車</button>
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
</div>

@endsection