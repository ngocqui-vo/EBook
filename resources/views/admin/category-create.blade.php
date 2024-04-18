@extends('layouts.admin')

@section('content')
    <h1>Thêm danh mục</h1>
    <form method="POST" action="{{ route('admin.categories.add') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Tên danh mục</label>
          <input type="text" class="form-control" name="name">   
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection