@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row top">
        <div class="col-4"></div>
        <div class="col-4 center">
            <h3>人員管理</h3>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row top">
        <div class="col-2"></div>
        <div class="col-8 center">
            <button type="button" class="btn btn-primary open-window">新增</button>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row top">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">電子郵件</th>
                        <th scope="col">使用者名稱</th>
                        <th scope="col">職位</th>
                        <th scope="col">功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff as $s)
                    <tr>
                        <td scope="row">{{ $s->email }}</td>
                        <td>{{ $s->username }}</td>
                        <td>{{ $s->m_type=='a' ? '管理員' : '客服員' }}</td>
                        <td>
                            <img src="{{ asset('image/delete.png') }}" alt="delete icon"
                                class="icon-30 hover-change-image" id="delete-{{ $s->u_id }}" onmouseover="hover(this);"
                                onmouseout="unhover(this);">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
</div>

@endsection