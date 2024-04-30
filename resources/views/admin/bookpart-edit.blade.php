@extends('layouts.admin')

@section('content')
    <h1>Sửa tập số {{ $bookpart->part_number }} - {{ $bookpart->part_title }}</h1>
    <form method="POST" action="{{ route('admin.bookparts.update') }}" enctype="multipart/form-data" class="mx-3">
        @csrf
        <input type="hidden" value="{{ $bookpart->id }}" name="id">
        <div class="mb-3">
            <label for="part_number" class="form-label">Tập số</label>
            <input type="text" class="form-control" name="part_number" value="{{ $bookpart->part_number }}">
        </div>
        <div class="mb-3">
            <label for="part_title" class="form-label">Tiêu đề tập</label>
            <input type="text" class="form-control" name="part_title" value="{{ $bookpart->part_title }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
