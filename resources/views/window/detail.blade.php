<div class="window bg-light">
    <form method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="container-fluid top">
            <h3>{{ Auth::user()->username }}</h3>
            <div class="stars" id="comment-stars-give">
                <form action="" method="post">
                    @for($i=5; $i>0; $i--)
                    <input class="star star-{{ $i }}" id="star-{{ $i }}-give" type="radio" name="star" value="{{ $i }}">
                    <label class="star star-{{ $i }}" for="star-{{ $i }}-give"></label>
                    @endfor
                </form>
            </div>
            <br>
            <textarea class="form-control" id="story" name="story" rows="5" cols="33"></textarea>
            <br>
            <div class="right pr-3">
                <button type="reset" class="btn btn-secondary close-window">取消</button>
                <button type="submit" class="btn btn-primary">發送</button>
            </div>
            <br>
            <br>
        </div>
    </form>
</div>