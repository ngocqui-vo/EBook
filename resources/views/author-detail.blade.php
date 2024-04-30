@extends('layouts.app-master')

@section('content')
    <div class="container">
        <p>{{ $author->name }}</p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    @foreach ($author->books as $book)
                        <tr>
                            <td>
                                <div style="width: 80px; height: 80px;">
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="book" style="height:100%;">
                                </div>
                            </td>
                            <td>
                                <div>{{ $book->title }}</div>
                                <div class="text-danger">{{ $book->price }} VND</div>
                                <div>2011-01-01/Nhà xuất bản Kim Đồng</div>
                            </td>
                            <td>
                                <a href="bookDetail.html" class="btn btn-sm btn-info btn-block">Chi tiết sách</a>
                                <a href="#" class="btn btn-sm btn-danger btn-block">Thêm vào giỏ hàng</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
