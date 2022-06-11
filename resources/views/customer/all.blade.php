@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container">
    <div class="row">
        <h3>類別 - {{ $className }}</h3>
        <?php
            $i = 0;
            $save = [];
        ?>
        @foreach($products as $p_id => $p)
        <?php
                $save[$i % 5] = [
                    "p_id" => $p_id,
                    "detail" => $p['detail'],
                    'as' => $p['as'],
                    'stars' => $p["stars"],
                    'inWishlist' => $p["inWishlist"],
                ];
            ?>
            @if ($i % 5 == 4)
            <div class="col-12">
                <div class="row card-deck">
                    @for($j=5; $j>0; $j--)
                        <?php
                            $product = $save[5-$j];
                        ?>
                        <div class="card">
                            <div class="book_cover">
                                <img class="img-fluid" alt="product photo" src="{{ asset('storage/' . $product['detail']->photo) }}">
                                <div class="info">
                                    <p>{{ $product["detail"]->p_name }}</p>
                                    <a href="{{ asset('detail/' . $p_id) }}" class="btn btn-primary">More</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title book_name">{{ $product["detail"]->p_name }}</h5>
                                <label class="card-text">作者:</label>
                                @foreach($product['as'] as $as)
                                    <label class="card-text">{{ $as->name }}</label>
                                @endforeach
                                <br>
                                <label class="card-text">評價:</label>
                                <div class="stars" id="comment-stars-{{ $product['p_id'] }}">
                                    <form action="">
                                        @for($s=5; $s>0; $s--)
                                        <input class="star star-{{ $s }}" id="star-{{ $s }}-{{ $product['p_id'] }}" type="radio" name="star" value="{{ $s }}"
                                            @if($product['stars'] == $s)
                                            checked
                                            @endif
                                        >
                                        <label class="star star-{{ $s }}" for="star-{{ $s }}-{{ $product['p_id'] }}"></label>
                                        @endfor
                                    </form>
                                </div>
                                <br>
                                <label class="card-text bold">價格:$</label>
                                <label class="card-text bold">{{ $product["detail"]->price }}</label>
                                <br>
                                <div class="right pr-2">
                                    <label class="card-text">庫存:</label>
                                    <label class="card-text">{{ $product["detail"]->inventory }}</label>
                                </div>
                                <br>
                                <br>
                                <div class="btn-group center" role="group">
                                    <button type="button"
                                    @if($product['inWishlist'])
                                        class="btn btn-danger"
                                        onclick="removeProductFromWishlist({{ $product['p_id'] }})"
                                    @else
                                        class="btn btn-light"
                                        onclick="addProductToWishlist({{ $product['p_id'] }})"
                                    @endif
                                    id="wish-{{ $product['p_id'] }}">♡</button>
                                    <input type='hidden' id="quantity-{{ $product['p_id'] }}" value='1' class="form-control item" />
                                    <button type="button" class="btn btn-primary" onclick="addProductToCart({{ $product['p_id'] }})">加入購物車</button>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            @endif
            <?php $i++; ?>
        @endforeach

        <?php
            for ($x=$i; $x%5!=0; $x++) {
                $save[$x % 5] = null;
            }
        ?>
        <div class="col-12">
            <div class="row card-deck">
                @for($j=5; $j>0 && count($save)>0 && $i%5!=0; $j--)
                    <?php
                        $product = $save[5-$j];
                    ?>
                    <div class="card">
                        @if ($product)
                            <div class="book_cover">
                                <img class="img-fluid" alt="product photo" src="{{ asset('storage/' . $product['detail']->photo) }}">
                                <div class="info">
                                    <p>{{ $product["detail"]->p_name }}</p>
                                    <a href="{{ asset('detail/' . $p_id) }}" class="btn btn-primary">More</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title book_name">{{ $product["detail"]->p_name }}</h5>
                                <label class="card-text">作者:</label>
                                @foreach($product['as'] as $as)
                                    <label class="card-text">{{ $as->name }}</label>
                                @endforeach
                                <br>
                                <label class="card-text">評價:</label>
                                <div class="stars" id="comment-stars-{{ $product['p_id'] }}">
                                    <form action="">
                                        @for($s=5; $s>0; $s--)
                                        <input class="star star-{{ $s }}" id="star-{{ $s }}-{{ $product['p_id'] }}" type="radio" name="star" value="{{ $s }}"
                                            @if($product['stars'] == $s)
                                            checked
                                            @endif
                                        >
                                        <label class="star star-{{ $s }}" for="star-{{ $s }}-{{ $product['p_id'] }}"></label>
                                        @endfor
                                    </form>
                                </div>
                                <br>
                                <label class="card-text bold">價格:$</label>
                                <label class="card-text bold">{{ $product["detail"]->price }}</label>
                                <br>
                                <div class="right pr-2">
                                    <label class="card-text">庫存:</label>
                                    <label class="card-text">{{ $product["detail"]->inventory }}</label>
                                </div>
                                <br>
                                <br>
                                <div class="btn-group center" role="group">
                                    <button type="button"
                                    @if($product['inWishlist'])
                                        class="btn btn-danger"
                                        onclick="removeProductFromWishlist({{ $product['p_id'] }})"
                                    @else
                                        class="btn btn-light"
                                        onclick="addProductToWishlist({{ $product['p_id'] }})"
                                    @endif
                                    id="wish-{{ $product['p_id'] }}">♡</button>
                                    <input type='hidden' id="quantity-{{ $product['p_id'] }}" value='1' class="form-control item" />
                                    <button type="button" class="btn btn-primary" onclick="addProductToCart({{ $product['p_id'] }})">加入購物車</button>
                                </div>
                            </div>
                        @else
                            <div class="empty-card-content"></div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@if (count($save) === 0)
<script>
    alert("此類別暫無商品!")
</script>
@endif

@endsection