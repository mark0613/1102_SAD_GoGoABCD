<div class="window bg-light">
    <form method="post" enctype="multipart/form-data" id="form-update-product">
        {!! csrf_field() !!}
        <div class="container-fluid">
            <div class="row top_win">
                <div class="col-6">
                    <img src="https://i.imgur.com/2s15CcP.png" alt="product photo" class="cover_win" id="preview">
                    <input type="file" name="photo" id="photo">
                    <select name="p_type" id="p_type">
                        <option value="none" selected>選擇商品種類</option>
                        <option value="r-book">實體書</option>
                        <option value="e-book">電子書</option>
                        <option value="r-music">CD</option>
                        <option value="e-music">線上音樂</option>
                    </select>
                    <input type="hidden" name="pre_p_type" id="pre_p_type" value="">
                    <select class="selectpicker multi-select" name="classes[]" id="classes" multiple
                        data-live-search="true" placeholder="Class">
                        @foreach ($classes["b"] as $class)
                        <option value="{{ $class->c_id }}" class="class-book">{{ $class->class }}</option>
                        @endforeach
                        @foreach ($classes["m"] as $class)
                        <option value="{{ $class->c_id }}" class="class-music">{{ $class->class }}</option>
                        @endforeach
                    </select>
                    <input type="file" name="file" id="file">
                </div>

                <div class="col-6 row">
                    <div class="col-6">
                        <input type="text" class="form-control" id="name" name="name" placeholder="書名或曲名">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="author_or_singer" name="author_or_singer"
                            placeholder="作者或歌手">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="publisher" name="publisher" placeholder="發行商">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="inventory" name="inventory" placeholder="庫存">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="price" name="price" placeholder="價格">
                    </div>
                    <div class="col-12">
                        <textarea id="description" name="description" rows="7" placeholder="商品描述"
                            class="text_win"></textarea>
                    </div>
                </div>
                <div class="col-9"></div>
                <div class="row col-3">
                    <input type="hidden" name="p_id" id="product-p_id" value="">
                    <button type="reset" class="btn btn-secondary close-window">取消</button>
                    <button type="submit" class="btn btn-primary ml-1" id="btn-save-product">儲存</button>
                </div>
            </div>
            <br>
        </div>
    </form>
</div>