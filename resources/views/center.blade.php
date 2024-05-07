@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row thumbnail center col-sm-12">
            <div class="col-sm-12">
                <h3 class="text-center" style="margin-bottom: 20px">Thông tin cá nhân</h3>
            </div>

            <ul class="nav nav-tabs nav-justified" id="myTabs">
                <li class="active"><a href="#editInfo">Sửa đổi thông tin</a></li>
                <li><a href="#editPassword">Đổi mật khẩu</a></li>
                <li><a href="#orderManager">Lịch sử mua hàng</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="editInfo">
                    <div class="table-responsive" style="padding: 20px;">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Tên tài khoản</td>
                                    <td>yostar</td>
                                    <td><a href="#" class="text-info">Sửa</a></td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>12345678900</td>
                                    <td><a href="#" class="text-info">Sửa</a></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ giao hàng mặc định</td>
                                    <td>
                                        <div>123 Võ Văn Ngân</div>
                                        <div>yostar</div>
                                        <div>12345678900</div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-info">Sửa</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="editPassword">
                    <div class="container" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <form class="form-horizontal caption">
                                <div class="form-group">
                                    <label for="old_password" class="col-sm-4 control-label">Mật khẩu cũ</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="old_password"
                                            placeholder="Mật khẩu cũ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password" class="col-sm-4 control-label">Mật khẩu mới</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="new_password"
                                            placeholder="Mật khẩu mới">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password" class="col-sm-4 control-label">Nhập lại mật
                                        khẩu</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="confirm_password"
                                            placeholder="Nhập lại mật khẩu mới">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-5">
                                        <button type="submit" class="btn btn-info btn-block">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="orderManager">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Mã đơn hàng</th>
                                    <th class="text-center">Tình trạng</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Tổng tiền</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->carts as $cart)                        
                                <tr>
                                    <td class="text-center">
                                        <div onclick="myClick(1)">{{ $cart->id }}</div>
                                    </td>
                                    <td class="text-center"><span class="text-danger">Đã hủy</span></td>
                                    <td class="text-center">
                                        <span>{{ $cart->totalItems() }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span>{{ $cart->totalPrice() }} VND</span>
                                    </td>

                                    <td class="text-center">
                                        
                                        <a href="" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="chi tiết đơn hàng"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#myTabs a').click(function() {
                if ($(this)[0].hash == "#orderManager" && $("#footer").hasClass("navbar-fixed-bottom")) {
                    $("#footer").removeClass("navbar-fixed-bottom");
                } else {
                    if (!$("#footer").hasClass("navbar-fixed-bottom")) {
                        $("#footer").addClass("navbar-fixed-bottom");
                    }
                }
                $(this).tab('show')
            });
        })
    </script>
@endsection
