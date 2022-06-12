@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 center">
            <h2>客服</h2>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div id="cs-msg-customer">
                <label for="">ok</label>
            </div>
            <form action="" method="post">
                <textarea class="form-control" id="cs-msg" rows="3"></textarea>
                <button type="button" class="btn btn-primary ml-1" id='btn-submit-msg'>傳送</button>
            </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@endsection