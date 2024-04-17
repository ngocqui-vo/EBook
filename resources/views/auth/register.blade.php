@extends('layouts.app-master')

@section('content')
    <div class="row thumbnail center">
        <div class="col-sm-12">
            <h3 class="text-center" style="margin-bottom: 20px">Đăng ký</h3>
        </div>
        <div class="col-sm-12">
            <form class="form-horizontal caption">
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="username" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Tên đầy đủ</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="username" placeholder="Tên đầy đủ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Mật khẩu</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="username" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="password" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn btn-success btn-block">Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
