@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container">
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8 center">
            <h2>客服回應</h2>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row top">
        <div class="col-3">
            <div class="nav flex-column nav-pills nav-fill" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                
                @foreach($customers as $cus)
                <a class="nav-link sidebar_font center" href="{{asset('admin/cs?c_id=' . $cus->c_id)}}">{{ $cus->username }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-6">
            @if(!empty($_GET["c_id"]))
            <div id="cs-msg-cs"></div>
            <form action="" method="post">
                <textarea class="form-control" id="cs-msg" rows="3" placeholder="輸入訊息..."></textarea>
                <button type="button" class="btn btn-primary ml-1" id='btn-submit-msg' onclick="sendMessageOnCS()">傳送</button>
            </div>
            </form>
            @endif
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection