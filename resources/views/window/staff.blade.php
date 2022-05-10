<div class="window bg-light">
    <form method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="container-fluid">
            <h2 class="center top">新增人員</h2>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>    
                    </div>
                    <div class="center">
                        <button type="reset" class="btn btn-secondary close-window">取消</button>
                        <button type="submit" class="btn btn-primary">加入</button>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </form>
</div>