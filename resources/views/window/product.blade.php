<div class="window">
    <form method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div>
            <img src="https://i.imgur.com/2s15CcP.png" alt="product photo" width="300px">
            <input type="file" name="photo">
            <select name="p_type" id="p_type">
                <option selected>選擇商品種類</option>
                <option value="r-book">實體書</option>
                <option value="e-book">電子書</option>
                <option value="r-music">CD</option>
                <option value="e-music">線上音樂</option>
            </select>
            <select class="selectpicker multi-select" name="classes[]" id="classes" multiple data-live-search="true" placeholder="Class">
                <option value="1">Abc</option>
                <option value="2">Bbd</option>
                <option value="3">CCC</option>
                <option value="4">Dog</option>
                <option value="5">Ele</option>
                <option value="6">Fk</option>
            </select>
        </div>
        <div>
            <input type="text" class="form-control" id="name" name="name" placeholder="name">
            <input type="text" class="form-control" id="author_or_singer" name="author_or_singer" placeholder="author or singer">
            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="isbn">
            <input type="text" class="form-control" id="publisher" name="publisher" placeholder="publisher">
            <input type="text" class="form-control" id="inventory" name="inventory" placeholder="inventory">
            <input type="text" class="form-control" id="price" name="price" placeholder="price">
            <textarea id="description" name="description" rows="10" placeholder="description"></textarea>
        </div>
        
        <button type="button" class="btn btn-primary" onclick="">取消</button>
        <button type="submit" class="btn btn-primary">儲存</button>
    </form>
</div>

