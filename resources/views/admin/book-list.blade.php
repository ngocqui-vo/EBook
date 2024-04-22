@extends('layouts.admin')

@section('content')
    <h1>Danh sách tác phẩm</h1>
    <a class="btn btn-success" href="{{ route('admin.books.create') }}">Thêm tác phẩm</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Ngày phát hành</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tác giả</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td class="col">{{ $book->title }}</td>
                    <td class="col">{{ $book->price }} VND</td>
                    <td class="col">{{ $book->published_date }}</td>
                    <td class="col">{{ $book->category->name }}</td>
                    <td class="col">{{ $book->author->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.books.edit', ['id' => $book->id]) }}">Sửa</a>  
                        <a class="btn btn-danger" href="">Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
