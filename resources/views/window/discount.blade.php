<div class="window bg-light">
    <form method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="container-fluid">
            <div class="row top">
                <div class="col-9">
                    <input type="text" class="form-control" id="" name="" placeholder="優惠名稱">
                </div>
                <div class="col-3"></div>
                <br>
                <br>
                <div class="col-9">
                    <select class="selectpicker multi-select" data-width="100%" name="classes[]" id="classes" multiple
                        data-live-search="true" placeholder="Class">
                        <option value="1">Abc</option>
                        <option value="2">Bbd</option>
                        <option value="3">CCC</option>
                        <option value="4">Dog</option>
                        <option value="5">Ele</option>
                        <option value="6">Fk</option>
                    </select>
                </div>
                <div class="col-3"></div>
                <br>
                <br>
                <div class="col-6">
                    <input type="text" class="form-control" id="" name="" placeholder="折扣">
                </div>
                <div class="col-6"></div>
                <br>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5 form-inline">
                            <div class="row">
                                <label>起</label>
                                <div class="col">
                                    <input type="date" class="form-control" stytle="" id="" name="">
                                </div>
                            </div>
                        </div>
                        <div class="col-5 row form-inline">
                            <div class="row">
                                <label>迄</label>
                                <div class="col">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
                <br>
                <br>
                <div class="col-9"></div>
                <div class="col-3">
                    <button type="reset" class="btn btn-secondary close-window" onclick="">取消</button>
                    <button type="submit" class="btn btn-primary ml-1">儲存</button>
                </div>
                <br>
                <br>
            </div>
        </div>
    </form>
</div>