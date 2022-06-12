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
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8 outline">
            <div id="cs-msg-customer"></div>
            <form action="" method="post">
                <div class="container no-padding">
                    <div class="row">
                        <div class="col-11">
                            <textarea class="form-control" id="cs-msg" rows="3" placeholder="輸入訊息..."></textarea>
                        </div>
                        <div class="col-1 mar-25">
                            <button type="button" class="btn btn-primary ml-1 w-100 h-100" id='btn-submit-msg' onclick="sendMessageOnCustomer()">傳送</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection