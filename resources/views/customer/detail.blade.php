@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')
<?php $p_id = $detail->p_id; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <br>
            <div class="row">
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
                                <input class="star star-{{ $i }}" id="star-{{ $i }}-avg" type="radio" name="star" value="{{ $i }}"
                                    @if($avg == $i)
                                    checked
                                    @endif
                                >
                                <label class="star star-{{ $i }}" for="star-{{ $i }}-avg"></label>
                                @endfor
                            </form>
                        </div>
                        <br>
                        <label>類別 : </label>
                        @foreach($classes as $class)
                        <label>{{ $class->class }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="col-4">
                    <h5>{{ $detail->p_name }}</h5>
                    <label>作者 : </label>
                    @foreach($author_or_singer as $as)
                    <label>{{ $as->name }}</label>
                    @endforeach
                    <br>
                    <label>出版社 : </label>
                    <label>{{ $detail->publisher }}</label>
                    <hr style="filter: alpha(opacity=100,finishopacity=0,style=3)" width="100%" color="#000000"
                        size="3" />
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
                                <input type='button' value='-' class="btn btn-outline-danger" onclick="quantityChange({{ $p_id }}, -1)">
                                <input type='text' id="quantity-{{ $p_id }}" value='1' class="form-control item" />
                                <input type='button' value='+' class="btn btn-outline-primary" onclick="quantityChange({{ $p_id }}, 1)">
                            </div>
                            <br>
                            <div class="right pr-2">
                                <label class="card-text">庫存:</label>
                                <label class="card-text">{{ $detail->inventory }}</label>
                            </div>
                            <br>
                            <div class="center">
                                <div class="btn-group" role="group">
                                    <button type="button" 
                                        @if($inWishlist)
                                            class="btn btn-danger"
                                            onclick="removeProductFromWishlist({{ $p_id }})"
                                        @else
                                            class="border border-dark btn btn-light"
                                            onclick="addProductToWishlist({{ $p_id }})"
                                        @endif
                                    id="wish-{{ $p_id }}">♡</button>
                                    <button type="button" class="btn btn-outline-danger" onclick="addProductToCart({{ $p_id }})">加入購物車</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row top">
                <div class="col-4">
                    <div class="center">
                        <h5>評分</h5>
                        <br>
                        <label class="card-text">平均分數 </label>
                        <br>
                        <div class="stars" id="avg-stars">
                            <form action="">
                                @for($i=5; $i>0; $i--)
                                <input class="star star-{{ $i }}" id="star-{{ $i }}-avg" type="radio" name="star" value="{{ $i }}"
                                    @if($avg == $i)
                                    checked
                                    @endif
                                >
                                <label class="star star-{{ $i }}" for="star-{{ $i }}-avg"></label>
                                @endfor
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div>
                        <button type="button" class="btn btn-primary comment_right .open-window open-window">給予評價</button>
                    </div>
                    <br>
                    <br>
                    <div>
                        @foreach($comments as $comment)
                        <div class="card h-100 shadow border-0">
                            <div class="card-body p-4">
                                <h3>{{ $comment->username }}</h3>
                                <div class="stars" id="comment-stars-{{ $comment->u_id }}">
                                    <form action="">
                                        @for($i=5; $i>0; $i--)
                                        <input class="star star-{{ $i }}" id="star-{{ $i }}-{{ $comment->u_id }}" type="radio" name="star" value="{{ $i }}"
                                            @if($comment->stars == $i)
                                            checked
                                            @endif
                                        >
                                        <label class="star star-{{ $i }}" for="star-{{ $i }}-{{ $comment->u_id }}"></label>
                                        @endfor
                                    </form>
                                </div>
                                <br>
                                <label class="card-text">{{ $comment->content }}</label>
                                <label class="comment_time">{{ $comment->time }}</label>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection