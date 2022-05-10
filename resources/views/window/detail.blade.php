<div class="window bg-light">
    <form method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="container-fluid top">
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <br>
            <textarea class="form-control" id="story" name="story" rows="5" cols="33">
                
            </textarea>
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