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
        <div class="col-2 col-sm-0"></div>
        <div class="col-8 center border-2-dark">
            @if (!empty($_GET["c_id"]))
            <h3 class="text-primary">{{ DB::table("users")->where("u_id", "=", $_GET["c_id"])->first()->username }}</h3>
            @else
            <h3 class="text-secondary">尚未選擇對象...</h3>
            @endif
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-2 border-2-dark" style="overflow-x: hidden;">
            <div class="nav flex-column nav-pills nav-fill" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach($customers as $cus)
                    <a 
                    @if (!empty($_GET["c_id"]) && $_GET["c_id"]==$cus["c_id"])
                        class="nav-link sidebar_font center btn-outline-primary cs-side"
                    @else
                        class="nav-link sidebar_font center btn-outline-secondary cs-side"
                    @endif
                    href="{{asset('admin/cs?c_id=' . $cus->c_id)}}">{{ $cus->username }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-6 border-2-dark-l">
            <div id="cs-msg-cs"></div>
            @if(!empty($_GET["c_id"]))
            <form action="" method="post">
                <textarea class="form-control" id="cs-msg" rows="3" placeholder="輸入訊息..."></textarea>
                <button type="button" class="btn btn-primary ml-1 float-right" id='btn-submit-msg' onclick="sendMessageOnCS()">傳送</button>
            </form>
            @endif
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection