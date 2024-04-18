@extends('layouts.admin')

@section('content')
    <h1>Danh sách danh mục</h1>
    <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Thêm danh mục</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td class="col-6">{{ $category->name }}</td>
                    <td><a class="btn btn-primary" href="{{ route('admin.categories.edit') }}">Sửa</a>  <a class="btn btn-danger" href="">Xóa</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
