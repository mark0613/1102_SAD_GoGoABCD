<div class="window bg-light">
    <form method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="container-fluid top">
            <input type="file" name="photo" class="form-control">
            <br>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3">
                    <button type="reset" class="btn btn-secondary close-window" onclick="">取消</button>
                    <button type="submit" class="btn btn-primary ml-1">儲存</button>
                </div>
            </div>
            <br>
        </div>
    </form>
</div>