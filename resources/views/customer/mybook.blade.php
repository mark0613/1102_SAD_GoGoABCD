@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid top">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3 class="center">我的電子書</h3>
            <?php 
                $i=0;
                $save = [];
            ?>
            @foreach($mybooks as $p_id => $book)
                <?php
                    $save[$i %3] = [
                        "p_id" => $p_id,
                        "book" => $book['book'],
                        'authors' => $book['author'],
                    ];
                ?>
                @if($i % 3 == 2)
                    <div class="row card-deck top">
                        @for($j=3; $j>0; $j--)
                            <?php
                                $mybook = $save[3-$j];
                            ?>
                            <div class="card">
                                <div class="book_cover">
                                    <img class="img-fluid" alt="book photo" src="{{ asset('storage/' . $mybook['book']->photo) }}">
                                    <div class="info">
                                        <p>{{ $mybook['book']->p_name }}</p>
                                        <a class="btn btn-primary" href="{{ asset('/detail/'. $mybook['book']->p_id) }}">More</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title book_name center">{{ $mybook['book']->p_name }}</h5>
                                    <br>
                                    <label class="card-text">作者:</label>
                                    @foreach($mybook['authors'] as $author)
                                    <label class="card-text">{{ $author->name }}</label>
                                    @endforeach
                                    <br>
                                    <label class="card-text">出版社:</label>
                                    <label class="card-text">{{ $mybook['book']->publisher }}</label>
                                    <br>
                                    <br>
                                    <div class="center">
                                        <a href="{{ asset('reader/' . $mybook['book']->path . '?page=1') }}" class="btn btn-primary">閱讀</a>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                @endif
                <?php $i++; ?>
            @endforeach

            <?php
                for ($x=$i; $x%3!=0; $x++) {
                    $save[$x % 3] = null;
                }
            ?>
            <div class="row card-deck top">
                @for($j=3; $j>0; $j--)
                <?php
                    $mybook = $save[3-$j];
                ?>
                <div class="card">
                    @if($mybook)
                        <div class="book_cover">
                            <img class="img-fluid" alt="book photo" src="{{ asset('storage/' . $mybook['book']->photo) }}">
                            <div class="info">
                                <p>{{ $mybook['book']->p_name }}</p>
                                <a class="btn btn-primary" href="{{ asset('/detail/'. $mybook['book']->p_id) }}">More</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title book_name center">{{ $mybook['book']->p_name }}</h5>
                            <br>
                            <label class="card-text">作者:</label>
                            @foreach($mybook['authors'] as $author)
                            <label class="card-text">{{ $author->name }}</label>
                            @endforeach
                            <br>
                            <label class="card-text">出版社:</label>
                            <label class="card-text">{{ $mybook['book']->publisher }}</label>
                            <br>
                            <br>
                            <div class="center">
                                <a href="{{ asset('reader/' . $mybook['book']->path . '?page=1') }}" class="btn btn-primary">閱讀</a>
                            </div>
                        </div>
                    @else
                        <div class="empty-card-content"></div>
                    @endif
                </div>
                @endfor
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection