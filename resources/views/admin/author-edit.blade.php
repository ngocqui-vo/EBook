@extends('layouts.admin')

@section('content')
    <h1>Sửa tác giả</h1>
    <form method="POST" action="{{ route('admin.authors.update') }}">
        <input type="hidden" value="{{ $author->id }}" name="id">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Tên</label>
          <input type="text" class="form-control" name="name" value="{{ $author->name }}">   
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Biệt danh</label>
            <input type="text" class="form-control" name="bio" value="{{ $author->bio }}">   
          </div>
        
        <button type="submit" class="btn btn-primary">Sửa</button>
      </form>

@endsection