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
                            {{-- <th class="">#</th> --}}
                            <th class="">Tên sách</th>
                            <th class="text-center">Ảnh</th>
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
                        @foreach ($cart as $index => $cart_item)
                            @php
                                $total_quantity += $cart_item['quantity'];
                                $total_price += $cart_item['price'] * $cart_item['quantity'];

                            @endphp
                            <tr data-book-part-id="{{ $cart_item['part_id'] }}">
                                {{-- <td>{{$index}}</td> --}}
                                <td>
                                    <div class="line-center">{{ $cart_item['book_title'] }}</div>
                                    <div class="line-center">Tập: {{ $cart_item['part_number'] }} -
                                        {{ $cart_item['part_title'] }}</div>
                                </td>
                                <td>
                                    <div class="line-center text-center" style="width: 50px;height: 50px;">
                                        <img src="{{ asset('storage/' . $cart_item['book_image']) }}" style="height: 100%;"
                                            alt="" />
                                    </div>
                                </td>
                                <td>
                                    <div class="line-center text-center">{{ number_format(intval($cart_item['price'])) }}
                                        VND</div>
                                </td>
                                <td>
                                    <div class="line-center text-center">
                                        {{ $cart_item['quantity'] }}
                                    </div>
                                </td>
                                <td>
                                    <div class="line-center text-center">
                                        {{ number_format($cart_item['price'] * $cart_item['quantity']) }} VND</div>
                                </td>
                                <td>
                                    <div class="line-center">
                                        <form action="{{ route('cart.cartRemove') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Thống kê</td>
                            <td class="text-center" id="total-quantity">Số lượng: {{ $total_quantity }}</td>
                            <td class="text-center" id="total-price">Tổng cộng: {{ number_format($total_price) }} VND</td>
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
    <script>
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        $(document).ready(function() {
            // Xử lý sự kiện click nút "Xóa" trong bảng sản phẩm giỏ hàng
            $('button.btn-danger').click(function(e) {
                e.preventDefault();

                var book_part_id = $(this).closest('tr').data(
                'book-part-id'); // Lấy productId từ data attribute của hàng tr (trong bảng giỏ hàng)

                // Gửi Ajax request để xóa sản phẩm khỏi giỏ hàng
                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.cartRemove') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        book_part_id: book_part_id
                    },
                    success: function(response) {

                        // Xóa hàng trong bảng sản phẩm giỏ hàng sau khi xóa thành công
                        $('tr[data-book-part-id="' + book_part_id + '"]').remove();

                        console.log($('tr[data-book-part-id="' + book_part_id + '"]'));
                        // alert(response.success); // Hiển thị thông báo thành công
                        // Cập nhật lại tổng số lượng và tổng giá trị
                        console.log(response);
                        updateCartSummary(response.total_quantity, response.total_price);
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi khi xóa sản phẩm khỏi giỏ hàng:', error);
                        alert('Đã xảy ra lỗi, vui lòng thử lại sau');
                    }
                });
            });

            // Hàm cập nhật tổng số lượng và tổng giá trị sau khi xóa sản phẩm
            function updateCartSummary(totalQuantity, totalPrice) {
                $('#total-quantity').text('Số lượng: ' + totalQuantity);
                $('#total-price').text('Tổng cộng: ' + numberWithCommas(totalPrice) + ' VND');
            }
        });
    </script>
@endsection
