@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row thumbnail">
            <div class="col-sm-4">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="{{ asset('storage/' . $book->image) }}" alt="" style="height: 500px;width: 100%;">

                        </div>
                    </div>
                </div>
                <div class="caption center">
                    <h5>{{ $book->title }}</h5>
                    <p>Giá: <span class="text-danger">{{ $book->price }} VND</span></p>
                    <p>
                        <a class="btn btn-danger btn-block" role="button" href="#">Mua ngay</a>
                        <a class="btn btn-warning btn-block" role="button" href="#">Thêm vào giỏ hàng</a>
                    </p>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="caption">
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thông tin sách
                    </div>
                    <div class="panel-body">
                        <div>Tác giả: {{ $book->author->bio }}</div>
                        <div>Danh mục: {{ $book->category->name }}</div>
                        <div>ISBN：9787111616801</div>
                        <div>Lượt xem: {{ $book->view_count }}</div>
                        <div>Ngày phát hành: {{ $book->published_date }}</div>
                        <div>Ngày xuất bản: 2024</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tóm lượt
                    </div>
                    <div class="panel-body">
                        {{ $book->description }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
