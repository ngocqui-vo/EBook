@extends('layouts.app-master')

@section('title')
Login
@endsection

@section('content')
    <div class="row thumbnail center">
        <div class="col-sm-12">
            <h3 class="text-center" style="margin-bottom: 20px;">Đăng nhập</h3>
        </div>
        <div class="col-sm-12">
            <form class="form-horizontal caption" method="POST" action="{{ route('login.perform') }}">
                @csrf
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Tài khoản</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" placeholder="Email hoặc tên tài khoản"
                            required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Mật khẩu</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                        @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn btn-success btn-block">Đăng nhập</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
