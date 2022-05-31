<div class="window bg-light top-50">
    <form method="post">
        {!! csrf_field() !!}
        <br>
        <div class="container-fluid">
            <div class="form-group">
                <label for="name">姓名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user ? $user->name : '' }}">
            </div>
            <div class="form-group">
                <label for="phone">電話</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user ? $user->phone : '' }}">
            </div>
            <div class="form-group">
                <label for="address">地址</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user ? $user->address : '' }}">
            </div>
            <div class="form-group">
                <label for="pay">付款方式</label>
                <select class="custom-select" id="pay" name="pay">
                    <option value="1">信用卡</option>
                    <option value="2">現金</option>
                </select>
            </div>
            <div class="form-group">
                <label for="point">使用點數</label>
                <label class="text-danger">(可用 : {{ $user ? $user->points : 0 }})</label>
                <input type="text" class="form-control" id="point" name="point" value="0">
            </div>
            <div class="form-inline right">
                <label class="price">$</label>
                <label class="price total-cost"></label>
                <input type="hidden" name="cost" id="cost" value="0">
                <div class="pl-1">
                    <button type="button" class="btn btn-secondary close-window">取消</button>
                </div>
                <div class="pl-1">
                    <button type="submit" class="btn btn-primary">送出</button>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
    </form>
</div>