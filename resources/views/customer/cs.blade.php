@extends('layout.customer')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container">
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8 center">
            <h2>客服詢問</h2>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row top10">
        <div class="col-2"></div>
        <div class="col-8 border-2-dark">
            <div id="cs-msg-customer"></div>
            <form action="" method="post">
                <textarea class="form-control" id="cs-msg" rows="3" placeholder="輸入訊息..."></textarea>
                <button type="button" class="btn btn-primary ml-1 float-right" id='btn-submit-msg' onclick="sendMessageOnCustomer()">傳送</button>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection