@extends('layouts.admin')

@section('content')
    <h1>Thêm tác phẩm</h1>
    <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tên tác phẩm</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea type="text" class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label for="published_date" class="form-label">Ngày phát hành</label>
            <input type="date" class="form-control" name="published_date">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Danh mục</label>
            <select class="form-select" aria-label="Default select" name="category">
                <option selected>Chọn danh mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Tác giả</label>
            <select class="form-select" aria-label="Default select" name="author">
                <option selected>Chọn tác giả</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
