@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-10 center">
            <h3>產生報表</h3>
            <div class="row top">
                <div class="col">
                    <select class="selectpicker multi-select" data-width="100%" name="classes[]" id="classes" multiple data-live-search="true" placeholder="Class">
                        <option value="1">Abc</option>
                        <option value="2">Bbd</option>
                        <option value="3">CCC</option>
                        <option value="4">Dog</option>
                        <option value="5">Ele</option>
                        <option value="6">Fk</option>
                    </select>
                </div>
                
                <div class="col form-inline">
                    <div class="row">
                        <label>起</label>
                        <div class="col">
                            <input type="date" class="form-control" stytle="" id="" name="">
                        </div>
                    </div>
                </div>
                <div class="col form-inline">
                    <div class="row">
                        <label>迄</label>
                        <div class="col">
                            <input type="date" class="form-control" id="" name="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <select class="selectpicker multi-select" data-width="100%" name="classes[]" id="classes" multiple data-live-search="true" placeholder="Class">
                        <option value="1">Abc</option>
                        <option value="2">Bbd</option>
                        <option value="3">CCC</option>
                        <option value="4">Dog</option>
                        <option value="5">Ele</option>
                        <option value="6">Fk</option>
                    </select>
                </div>
                <div class="col">
                    <button type="button" onclick="()" class="btn btn-primary">產生</button>
                </div>
                
            </div>
            
            <div class="row top">
                <div class="col">
                    <img src="https://cdn.discordapp.com/attachments/919116314331713606/972438218811256832/cat.webp" class="figure" alt="...">
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection