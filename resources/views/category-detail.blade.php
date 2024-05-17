@extends('layouts.app-master')

@section('content')
    <div class="container">
        <p>{{ $category->name }}</p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    @foreach ($category->books as $book)
                        <tr>
                            <td>
                                <div style="width: 80px; height: 80px;">
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="book" style="height:100%;">
                                </div>
                            </td>
                            <td>
                                <div>{{ $book->title }}</div>
                                <div class="text-danger">{{ $book->price }} VND</div>
                            </td>
                            <td>
                                <a href="{{ route('home.bookDetail', ['id' => $book->id])}}" class="btn btn-sm btn-info btn-block">Chi tiết sách</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
