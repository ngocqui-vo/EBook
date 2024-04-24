@extends('layouts.admin')

@section('content')
    <h1>Sửa tác phẩm</h1>
    <form method="POST" action="{{ route('admin.books.update') }}" enctype="multipart/form-data" class="mx-3">
        @csrf
        <input type="hidden" name="id" value="{{ $book->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">Tên tác phẩm</label>
            <input type="text" class="form-control" name="title" value="{{ $book->title }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="text" class="form-control" name="price" value="{{ $book->price }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea type="text" class="form-control" name="description">{{ $book->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label><br>
            <img src="{{ asset('storage/' . $book->image) }}" alt="" width="300px"><br>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label for="published_date" class="form-label">Ngày phát hành</label>
            <input type="date" class="form-control" name="published_date" value="{{ $book->published_date }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Danh mục</label>
            <select class="form-select" aria-label="Default select" name="category">
                <option selected>Chọn danh mục</option>
                @foreach ($categories as $category)

                    <option value="{{ $category->id }}" {{ $book->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Tác giả</label>
            <select class="form-select" aria-label="Default select" name="author">
                <option selected>Chọn tác giả</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->author->id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
