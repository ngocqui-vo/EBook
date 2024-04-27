@extends('layouts.app-master')
@section('content')
    {{ $books }}
    <div class="container">
        <p>Tìm thấy "4" sản phẩm</p>
        <div class="row">
            @foreach ($books as $item)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <a href="#">
                            <img style="width: 100%; height: 200px; display: block;" alt="100%x200"
                                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzNDggMjAwIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJub25lIG1lZXQiIHdpZHRoPSIzNDgiIGhlaWdodD0iMjAwIj48ZGVmcyAvPjxyZWN0IGZpbGw9IiNlZWVlZWUiIHdpZHRoPSIzNDgiIGhlaWdodD0iMjAwIiAvPjxnPjx0ZXh0IHN0eWxlPSJmb250LWZhbWlseTogQXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7IGZvbnQtc2l6ZTogMjJweDsgZm9udC13ZWlnaHQ6IGJvbGQ7IGRvbWluYW50LWJhc2VsaW5lOiBjZW50cmFsOyBmaWxsOiAjYWFhYWFhOyIgeD0iMTMxLjE2IiB5PSIxMDAiPjM0OHgyMDA8L3RleHQ+PC9nPjwvc3ZnPg=="
                                data-src="holder.js/100%x200" data-holder-rendered="true">
                        </a>
                        <div class="caption">
                            <div class="text-left">{{ $item->title }}</div>
                            <div>
                                <span class="text-left text-danger">{{$item->price}} VND</span>
                            </div>
                            <div class="small">
                                XXX著 / 中国邮电出版社
                            </div>
                            <p><a class="btn btn-primary btn-block" role="button" href="bookDetail.html">Chi tiết sách</a>
                            </p>
                            <p><a href="#" class="btn btn-danger btn-block" role="button">Thêm vào giỏ hàng</a></p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
