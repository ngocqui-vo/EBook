<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{!! url('assets/bootstrap-3.3.4/dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/Flat-UI-master/dist/css/flat-ui.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/css/index.css') !!}">
    <script src="{!! url('assets/bootstrap-3.3.4/dist/js/jquery-1.11.3.min.js') !!}"></script>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>

@include('layouts.partials.navbar')

<div class="container">
    @yield('content')
</div>

@include('layouts.partials.footer')
<script src="{!! url('assets/bootstrap-3.3.4/dist/js/bootstrap.min.js') !!}"></script>
<script src="{!! url('assets/Flat-UI-master/dist/js/flat-ui.min.js') !!}"></script>
<script src="{!! url('assets/bootstrap-3.3.4/js/carousel.js') !!}"></script>
</body>
</html>
