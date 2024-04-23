@extends('layouts.admin')

@section('content')
    <h1>Thêm người dùng</h1>
    <form method="POST" action="{{ route('admin.user.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên người dùng</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Quyền</label>
            <select class="form-select" aria-label="Default select" name="role">
                <option selected value="0">Member</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
