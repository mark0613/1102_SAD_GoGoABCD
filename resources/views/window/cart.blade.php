<div class="window bg-light">
    <form method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="container-fluid">
            <div class="form-group">
                <label for="account">姓名</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="account">電話</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="account">地址</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="account">付款方式</label>
                <select class="custom-select" id="">
                    <option value="1">信用卡</option>
                    <option value="2">現金</option>
                </select>
            </div>
            <div class="form-group">
                <label for="account">使用點數</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-inline right">
                <label class="price">$0</label>
                <div class="pl-1">
                    <button type="button" class="btn btn-secondary">取消</button>
                </div>
                <div class="pl-1">
                    <button type="button" class="btn btn-primary">送出</button>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
    </form>
</div>