@extends('layouts.app-master')

@section('title')
    Xác nhận mua hàng
@endsection

@section('content')
    <div class="row thumbnail center">
        <div class="col-sm-12">
            <h3 class="text-center" style="margin-bottom: 20px;">Thông tin mua hàng</h3>
        </div>
        <div class="col-sm-12">
            <form class="form-horizontal caption" method="POST" action="{{ route('cart.payment') }}">
                @csrf
                @csrf
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Tên người nhận</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" placeholder="Tên người nhận" required
                            autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-4 control-label">Số điện thoại</label>
                    <div class="col-sm-5">
                        <input type="phone" class="form-control" name="phone" placeholder="Số điện thoại">
                        @if ($errors->has('phone'))
                            <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-4 control-label">Địa chỉ</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                        @if ($errors->has('phone'))
                            <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn btn-success btn-block">Đặt hàng</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
