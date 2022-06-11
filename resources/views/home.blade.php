@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid top">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <!--廣告-->
            <div>
                <div class="container">
                    <h2>現正優惠中</h2>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-8">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php $i=0 ?>
                                    @foreach($ads as $ad)
                                    <div class="carousel-item ad {{ $i==0 ? 'active' : '' }}">
                                        <?php $path = "../storage/" . $ad->image; ?>
                                        <img src="{{ $path }}" class="d-block" alt="{{ $ad->time }}" width="500px">
                                    </div>
                                    <?php $i++?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--推薦書籍-->
            <div>
                <div class="pt-5 pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <h2>您可能感興趣...</h2>
                                <h3 class="mb-3">推薦書籍</h3>
                            </div>
                            <div class="col-6 text-right">
                            </div>
                            <div class="col-1 align-self-center">
                                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button"
                                    data-slide="prev">
                                    <i class="">
                                        <
                                    </i>
                                </a>
                            </div>
                            <div class="col-10">
                                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php 
                                            $i = 0;
                                            $p_id_4= [];
                                        ?>
                                        @foreach($products as $p_id => $value)
                                            <?php 
                                                $p_id_4[$i%4] = $p_id;
                                            ?>
                                            @if($i%4 == 3)
                                            <div class="carousel-item
                                                @if($i < 4)
                                                    active
                                                @endif
                                            ">
                                                <div class="row card-deck">
                                                        @for($j=3; $j>=0; $j--)
                                                        <?php $product = $products[$p_id_4[$j]] ?>
                                                        <div class="card">
                                                            <div class="book_cover">
                                                                <img class="img-fluid" alt="product photo" src="{{ asset('storage/' . $product['detail']->photo) }}">
                                                                <div class="info">
                                                                    <a href="{{ asset('/detail/' . $p_id_4[$j]) }}" class="btn btn-primary">More</a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title book_name">{{ $product['detail']->p_name }}</h5>
                                                                <label class="card-text">作者:</label>
                                                                
                                                                @foreach($product['as'] as $as)
                                                                <label class="card-text">{{ $as->name }}</label>
                                                                @endforeach
                                                                <br>
                                                                <label class="card-text">評價:</label>
                                                                <div class="stars" id="comment-stars-{{ $p_id_4[$j] }}">
                                                                    <form action="">
                                                                        @for($s=5; $s>0; $s--)
                                                                        <input class="star star-{{ $s }}" id="star-{{ $s }}-{{ $p_id_4[$j] }}" type="radio" name="star" value="{{ $s }}"
                                                                            @if($product['stars'] == $s)
                                                                            checked
                                                                            @endif
                                                                        >
                                                                        <label class="star star-{{ $s }}" for="star-{{ $s }}-{{ $p_id_4[$j] }}"></label>
                                                                        @endfor
                                                                    </form>
                                                                </div>
                                                                <br>
                                                                <label class="card-text bold">價格:$</label>
                                                                <label class="card-text bold">{{ $product['detail']->price }}</label>
                                                                <br>
                                                                <div class="right pr-2">
                                                                    <label class="card-text">庫存:</label>
                                                                    <label class="card-text">{{ $product['detail']->inventory }}</label>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="btn-group center" role="group">
                                                                    <button type="button"
                                                                    @if($product['inWishlist'])
                                                                        class="btn btn-danger"
                                                                        onclick="removeProductFromWishlist({{ $p_id_4[$j] }})"
                                                                    @else
                                                                        class="btn btn-light"
                                                                        onclick="addProductToWishlist({{ $p_id_4[$j] }})"
                                                                    @endif
                                                                    id="wish-{{ $p_id_4[$j] }}">♡</button>
                                                                    <input type='hidden' id="quantity-{{ $p_id_4[$j] }}" value='1' class="form-control item" />
                                                                    <button type="button" class="btn btn-primary" onclick="addProductToCart({{ $p_id_4[$j] }})">加入購物車</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @endfor
                                                        <!-- <div class="card">
                                                            <img class="img-fluid" alt="100%x280"
                                                                src="https://im2.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/00/0010920073.jpg&v=6256a64c&w=180&h=180">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Special title treatment</h4>
                                                                <p class="card-text">With supporting text below as a natural
                                                                    lead-in to additional content.</p>

                                                            </div>
                                                        </div>


                                                        <div class="card">
                                                            <img class="img-fluid" alt="100%x280"
                                                                src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/26/0010922644.jpg&v=626a7abb&w=180&h=180">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Special title treatment</h4>
                                                                <p class="card-text">With supporting text below as a natural
                                                                    lead-in to additional content.</p>

                                                            </div>
                                                        </div>


                                                        <div class="card">
                                                            <img class="img-fluid" alt="100%x280"
                                                                src="https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/001/092/06/0010920642.jpg&v=623af6b6&w=180&h=180">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Special title treatment</h4>
                                                                <p class="card-text">With supporting text below as a natural
                                                                    lead-in to additional content.</p>

                                                            </div>
                                                        </div> -->

                                                    </div>
                                                </div>
                                                
                                            @endif
                                            <?php $i++; ?>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-1 align-self-center">
                                <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button"
                                    data-slide="next">
                                    <i class="">></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <a href="#" class="back-to-top "><button type="button"
                    class="btn btn-primary circle bottom">TOP</button></a>
        </div>
    </div>
</div>
@endsection