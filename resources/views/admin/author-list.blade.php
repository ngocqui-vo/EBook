@extends('layouts.admin')

@section('content')
    <h1>Danh sách tác giả</h1>
    <a class="btn btn-success" href="{{ route('admin.authors.create') }}">Thêm tác giả</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Bio</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <th scope="row">{{ $author->id }}</th>
                    <td class="col-6">{{ $author->name }}</td>
                    <td class="col-4">{{ $author->bio }}</td>
                    <td>
                        <a class="btn btn-primary" href="">Sửa</a>  
                        <a class="btn btn-danger" href="{{ route('admin.authors.delete', ['id' => $author->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
