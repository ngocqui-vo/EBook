@extends('layouts.admin')

@section('content')
    <h1>Danh sách người dùng</h1>
    <a class="btn btn-success" href="{{ route('admin.users.create') }}">Thêm người dùng</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th class="col">Image</th>
                <th class="col">Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td class="col">{{ $user->name }}</td>
                    <td class="col">{{ $user->email }}</td>
                    <td class="col"><img style="width: 100px; height:100px" src="{{ asset('storage/' . $user->image) }}" alt=""></td>
                    <td class="col">{{ $user->role ? 'Admin' : 'Member' }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.users.edit', ['id' => $user->id]) }}">Sửa</a>  
                        <a class="btn btn-danger" href="{{ route('admin.users.delete', ['id' => $user->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-2 offset-md-5">{{ $users->links() }}</div>
    </div>
@endsection
