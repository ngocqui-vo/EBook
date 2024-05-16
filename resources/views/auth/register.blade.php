@extends('layouts.app-master')

@section('content')
    <div class="row thumbnail center">
        <div class="col-sm-12">
            <h3 class="text-center" style="margin-bottom: 20px">Đăng ký</h3>
        </div>
        <div class="col-sm-12">
            <form class="form-horizontal caption" method="post" enctype="multipart/form-data" action="{{ route('register.perform') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Tên đầy đủ</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" placeholder="Tên đầy đủ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Mật khẩu</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="form-group mb-3">
                        <div class="col-sm-4 control-label"><span>Ảnh sản phẩm</span></div>
                             <div class="col-sm-5"><input type="file" id="fileToUpload"
                                    class="form-control" name="image" required></div>
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
