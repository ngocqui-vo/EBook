@extends('layouts.admin')

@section('content')
    <h1>Sửa danh mục</h1>
    <form method="POST" action="{{ route('admin.categories.update') }}">
        @csrf
        <input type="hidden" value="{{ $category->id }}" name="id">
        <div class="mb-3">
          <label for="name" class="form-label">Tên danh mục</label>
          <input type="text" class="form-control" name="name" value="{{ $category->name }}">   
        </div>
        
        <button type="submit" class="btn btn-primary">Sửa</button>
      </form>

@endsection