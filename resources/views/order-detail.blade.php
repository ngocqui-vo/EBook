@extends('layouts.app-master')

@section('style')
    <style>
        .row {
            margin-left: 20px;
            margin-right: 20px;
            ;
        }

        .row input {
            width: 50px;
        }

        .list-group-item div:first-child:hover {

            cursor: pointer;
        }

        th {
            text-align: right;
            width: 200px;
            ;
        }

        td {
            text-align: left;
            padding: 10px;
        }

        .table th {
            text-align: center;
        }

        .table td {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row thumbnail center col-sm-12">
            <div class="col-sm-12">
                <h3 class="text-center" style="margin-bottom: 20px">Chi tiết đặt hàng</h3>
            </div>

            <div class="col-sm-12 ">
                <table>
                    <tr>
                        <th>Mã đơn hàng: </th>
                        <td>{{ $cart->id}}</td>
                    </tr>
                    <tr>
                        <th>Tình trạng: </th>
                        <td>Đang giao</td>
                    </tr>
                    <tr>
                        <th>Tên người nhận: </th>
                        <td>{{ $delivery->name }}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ nhận hàng: </th>
                        <td>{{ $delivery->address }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại nhận hàng: </th>
                        <td>{{ $delivery->phone }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-12">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Tên sách</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->cartItems as $item)       
                        <tr>
                            <td>{{ $item->bookPart->book->title }} <div><span>{{ $item->bookPart->part_title}}</span></div></td>
                            <td>{{ $item->bookPart->book->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->totalPrice() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right">Tổng số lượng: {{ $cart->totalItems() }}</td>
                            <td class="text-center">Tổng cộng: {{ $cart->totalPrice() }}</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="center.html#orderManager" class="btn btn-primary btn-sm col-sm-12">Quản lý đơn
                                    hàng</a>
                            </td>
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm col-sm-12">Xóa đơn hàng</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm col-sm-12">Thanh toán</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection
