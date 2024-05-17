@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row thumbnail center col-sm-12">
            <div class="col-sm-12">
                <h3 class="text-center" style="margin-bottom: 20px">Thông tin cá nhân</h3>
            </div>

            <ul class="nav nav-tabs nav-justified" id="myTabs">
                <li class="active"><a href="#editInfo">Thông tin tài khoản</a></li>
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
                                    <td>{{ $user->name }}</td>

                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <h3>Danh sách theo dõi</h3>
                    <div class="table-responsive">
                        <table class="table">
                           
                            <tbody>
                                @foreach ($user->followBooks as $follow)
                                    <tr>
                                        <td>
                                            <div style="width: 80px; height: 80px;">
                                                <img src="{{ asset('storage/' . $follow->book->image) }}" alt="book" style="height:100%;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>{{ $follow->book->title }}</div>
                                            <div class="text-danger">{{ $follow->book->price }} VND</div>
                                        </td>
                                        <td>
                                            <a href="{{ route('home.bookDetail', ['id' => $follow->book->id])}}" class="btn btn-sm btn-info btn-block">Chi tiết sách</a>
                                        </td>
                                    </tr>
                                @endforeach
            
                            </tbody>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="editPassword">
                    <div class="container" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <form class="form-horizontal caption" method="POST"
                                action="{{ route('user.changePassword') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="old_password" class="col-sm-4 control-label">Mật khẩu cũ</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="old_password" name="old_password"
                                            placeholder="Mật khẩu cũ">
                                    </div>
                                    @if ($errors->has('old_password'))
                                        <p class="text-danger text-left">{{ $errors->first('old_password') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="new_password" class="col-sm-4 control-label">Mật khẩu mới</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            placeholder="Mật khẩu mới">
                                    </div>
                                    @if ($errors->has('new_password'))
                                        <p class="text-danger text-left">{{ $errors->first('new_password') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password" class="col-sm-4 control-label">Nhập lại mật
                                        khẩu</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" placeholder="Nhập lại mật khẩu mới">
                                    </div>
                                    @if ($errors->has('confirm_password'))
                                        <p class="text-danger text-left">{{ $errors->first('confirm_password') }}</p>
                                    @endif
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
                                        <td class="text-center"><span class="text-success">Thành công</span></td>
                                        <td class="text-center">
                                            <span>{{ $cart->totalItems() }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span>{{ $cart->totalPrice() }} VND</span>
                                        </td>

                                        <td class="text-center">

                                            <a href="{{ route('cart.orderDetail', ['id' => $cart->id]) }}"
                                                class="btn btn-sm btn-primary" data-toggle="tooltip"
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
