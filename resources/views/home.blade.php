@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="assets/storage/nha-sach-dep-o-viet-nam-1.jpg" alt="" style="height: 500px;width: 100%;">
                    <div class="carousel-caption">
                        Tiêu đề sách 1
                    </div>
                </div>
                <div class="item">
                    <img src="assets/storage/nha-sach-dep-o-viet-nam-14.jpg" alt="" style="height: 500px;width: 100%;">
                    <div class="carousel-caption">
                        Tiêu đề sách 2
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="card">
            <div class="panel panel-info">
                <div class="panel-heading">Top bán chạy</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($books as $item)
                        <div class="col-sm-4 col-md-3">
                                
                            <div class="thumbnail">
                                <a href="#">
                                    <img style="width: 100%; height: 200px; display: block;" alt="100%x200"
                                    src="{{ asset('storage/' . $item->image) }}"
                                     data-holder-rendered="true">
                                </a>
                                <div class="caption">
                                    <a href="{{ route('home.bookDetail', ['id' => $item->id]) }}">
                                        <div class="text-left">{{$item->title}}</div>
                                    </a>

                                    <div>
                                        <span class="text-left text-danger">{{$item->price}} VND</span>
                                    </div>
                                    <div class="small">
                                        Lượt xem: {{ $item->view_count }}
                                    </div>
                                    <p><a class="btn btn-primary btn-block" role="button" href="{{ route('home.bookDetail', ['id' => $item->id]) }}">Chi
                                        tiết sách</a>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-12">
                            {{ $books->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
