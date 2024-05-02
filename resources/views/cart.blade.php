@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row thumbnail center">
            <div class="col-sm-12">
                <h3 class="text-center" style="margin-bottom: 20px">Giỏ hàng</h3>
            </div>
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên sách</th>
                            <th class="text-center">Đơn giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Tổng giá</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_quantity = 0;
                            $total_price = 0;
                        @endphp
                        @foreach ($cart as $cart_item)
                        @php
                            $total_quantity += $cart_item['quantity'];
                            $total_price += $cart_item['price'] * $cart_item['quantity'];

                        @endphp
                        <tr>
                            <td>
                                <div class="line-center text-center" style="width: 50px;height: 50px;">
                                    <img src="{{ asset('storage/' . $cart_item['book_image']) }}" style="height: 100%;"
                                        alt="" />
                                </div>
                            </td>
                            <td>
                                <div class="line-center text-center">{{ $cart_item['book_title'] }}</div>
                            </td>
                            <td>
                                <div class="line-center text-center">{{ number_format(intval($cart_item['price'])) }} VND</div>
                            </td>
                            <td>
                                <div class="line-center text-center">
                                    {{ $cart_item['quantity'] }}
                                </div>
                            </td>
                            <td>
                                <div class="line-center text-center">{{ number_format($cart_item['price'] * $cart_item['quantity']) }} VND</div>
                            </td>
                            <td>
                                <div class="line-center">
                                    <button class="btn btn-sm btn-danger">Xóa</button>
                                </div>
                            </td>
                        </tr>
                        
                        @endforeach
                        

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Thống kê</td>
                            <td class="text-center">Số lượng: {{ $total_quantity }}</td>
                            <td class="text-center">Tổng cộng: {{ number_format($total_price) }} VND</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-sm-offset-9 col-sm-3" style="padding-bottom: 15px;">
                <button class="btn btn-success">Tiếp tục mua</button>
                <button class="btn btn-danger">Đặt hàng</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
