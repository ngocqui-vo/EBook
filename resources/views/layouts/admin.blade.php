<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @section('title')
        @endsection
    </title>
    {{-- <link rel="stylesheet" href="{!! url('assets/bootstrap-3.3.4/dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/Flat-UI-master/dist/css/flat-ui.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/css/index.css') !!}">
    <script src="{!! url('assets/bootstrap-3.3.4/dist/js/jquery-1.11.3.min.js') !!}"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    {{-- @include('layouts.partials.admin-navbar') --}}
    <div class="d-flex">
        <div class="col-md-2">
            @include('layouts.partials.sidebar')
        </div>
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Lấy đường dẫn hiện tại của trang
            var currentUrl = window.location.href;

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
