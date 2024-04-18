<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title')@endsection</title>
    <link rel="stylesheet" href="{!! url('assets/bootstrap-3.3.4/dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/Flat-UI-master/dist/css/flat-ui.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/css/index.css') !!}">
    <script src="{!! url('assets/bootstrap-3.3.4/dist/js/jquery-1.11.3.min.js') !!}"></script>
</head>
<body>
    @include('layouts.partials.admin-navbar')

    @yield('content')
    
</body>
</html>