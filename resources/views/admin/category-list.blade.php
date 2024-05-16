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
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">Sửa</a>  
                        <a class="btn btn-danger" href="{{ route('admin.categories.delete', ['id' => $category->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-2 offset-md-5">{{ $categories->links() }}</div>
    </div>
@endsection
