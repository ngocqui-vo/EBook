@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="{{ asset('storage/' . $book->image) }}" alt="" style="height: 500px;width: 100%;">           
                        </div>                      
                    </div>          
                </div>
            </div>

            <div class="col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h4 class="text-center">{{ $book->title }}</h4>
                        <p class="text-center">Giá: <span class="text-danger">{{ $book->price }} VND</span></p>
                        <div class="text-center">
                            <a class="btn btn-danger btn-block" role="button" href="#">Mua ngay</a>
                            <button class="btn btn-warning btn-block add-to-cart" role="button"
                                data-book-id="{{ $book->id }}">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thông tin sách
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li><strong>Tác giả:</strong> {{ $book->author->bio }}</li>
                            <li><strong>Ngày phát hành:</strong> {{ $book->published_date }}</li>
                            <li><strong>Ngày xuất bản:</strong> 2024</li>
                            <li><strong>Danh mục:</strong> {{ $book->category->name }}</li>
                            <div><strong>Lượt xem:</strong> {{ $book->view_count }}</div>
                            <li><strong>Sao:</strong> {{ $rating }} <span
                                    style="color: yellow; font-size: 1.2em">★</span></li>
                            <div>Tập:
                                <select name="book_part_id" id="book_part_id">
                                    @foreach ($book->parts as $part)
                                        <option value="{{ $part->id }}">{{ $part->part_number }} -
                                            {{ $part->part_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="{{ route('home.review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                    <div class="product-add-review">
                        <h4 class="text-center">Viết đánh giá của bạn</h4>
                        <div class="review-table">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="cell-label">&nbsp;</th>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <th>{{ $i }} <span
                                                        style="color: yellow; font-size: 1.2em">★</span></th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cell-label">Chất lượng</td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <td><input type="radio" name="rating" class="radio"
                                                        value="{{ $i }}"></td>
                                            @endfor
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="review-form">
                            <div class="form-container">
                                <div role="form" class="cnt-form">
                                    <div class="form-group">
                                        <label for="exampleInputReview">Đánh giá <span class="astk">*</span></label>
                                        <textarea class="form-control" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                    </div>
                                    <div class="action text-center">
                                        <button type="submit" class="btn btn-primary btn-upper submit">Gửi đánh
                                            giá</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tóm lượt
                    </div>
                    <div class="panel-body">
                        <p>{{ $book->description }}</p>
                        <div class="like" data-product-id="{{ $book->id }}"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Đánh giá</h2>
                @foreach ($book->reviews as $review)
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>{{ $review->user->name }} -
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <span style="color: yellow; font-size: 1.2em">★</span>
                                @endfor
                            </h4>
                        </div>
                        <div class="panel-body">
                            <p>{{ $review->comment }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.add-to-cart').click(function() {
                var book_part_id = $('#book_part_id').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.add') }}",

                    data: {
                        book_part_id: book_part_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response)
                        alert(response); // Hiển thị thông báo thành công
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi khi thêm sản phẩm vào giỏ hàng:', error);
                        alert('Đã xảy ra lỗi, vui lòng thử lại sau');
                        window.location.href = "{{ route('login.show') }}";
                    }
                })
            })

        })
    </script>
@endsection
