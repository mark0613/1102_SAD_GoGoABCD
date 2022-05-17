@extends('layout.merchant')

@section('title', $title)

@section('name', $name)

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-10 center">
            <h3>編輯資料</h3>
            <div class="row top">
                <div class="col-10"></div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary open-window">新增</button>
                    <br>
                    <br>
                </div>

                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">電子郵件</th>
                                <th scope="col">使用者名稱</th>
                                <th scope="col">使用者名稱</th>
                                <th scope="col">職位</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staff as $s)
                            <tr>
                                <td scope="row">{{ $s->email }}</td>
                                <td>{{ $s->username }}</td>
                                <td>{{ $s->m_type=='a' ? '管理員' : '客服員' }}</td>
                                <td>
                                    <img src="{{ asset('image/trash-bin.webp') }}" alt="trash-bin" width="30px">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12">

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection