<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    {{-- <link rel="stylesheet" href="{!! url('assets/bootstrap-3.3.4/dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/Flat-UI-master/dist/css/flat-ui.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/css/index.css') !!}">
    <script src="{!! url('assets/bootstrap-3.3.4/dist/js/jquery-1.11.3.min.js') !!}"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{!! url('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') !!}"> --}}
    <style>
        .scrollable-column {
            height: 100vh;
            overflow-y: auto;

        }

        footer {
            position: fixed;
            height: 100px;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    {{-- @include('layouts.partials.admin-navbar') --}}
    <div class="d-flex">
        <div class="col-sm-3">
            @include('layouts.partials.sidebar')
        </div>
        <div class="col-sm-9 scrollable-column">
            @yield('content')
        </div>
    </div>


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    <script src="{!! url('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! url('assets/jquery/jquery-3.7.1.js') !!}"></script>
    <script>
        $(document).ready(function() {
            // Lấy đường dẫn hiện tại của trang
            var currentUrl = window.location.href;

            // Xóa class active khỏi tất cả các mục danh sách
            $('.nav-link').removeClass('active');

            // Kiểm tra và đánh dấu mục danh sách là active dựa trên đường dẫn hiện tại
            $('.nav-link').each(function() {
                var linkHref = $(this).attr('href');

                // So sánh đường dẫn hiện tại với href của từng mục danh sách
                if (currentUrl.includes(linkHref)) {
                    $(this).addClass('active'); // Thêm class active vào mục danh sách
                }
            });
        });
    </script>
</body>

</html>
