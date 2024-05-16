@extends('layouts.admin')

@section('content')
    <h1>Danh sách tác giả</h1>
    <a class="btn btn-success" href="{{ route('admin.authors.create') }}">Thêm tác giả</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Biệt Danh</th>
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
                        <a class="btn btn-primary" href="{{ route('admin.authors.edit', ['id' => $author->id]) }}">Sửa</a>  
                        <a class="btn btn-danger" href="{{ route('admin.authors.delete', ['id' => $author->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="row" style="margin-top: 20px;">
    <div class="col-2 offset-5">
        {{ $authors->links() }}
    </div>
</div>
@endsection
