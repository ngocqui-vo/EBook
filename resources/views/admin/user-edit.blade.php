@extends('layouts.admin')

@section('content')
    <h1>Sửa người dùng</h1>
    <form method="POST" action="{{ route('admin.user.store') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">Tên người dùng</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="password">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
