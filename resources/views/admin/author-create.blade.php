@extends('layouts.admin')

@section('content')
    <h1>Thêm tác giả</h1>
    <form method="POST" action="{{ route('admin.authors.store') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Tên</label>
          <input type="text" class="form-control" name="name">   
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Biệt danh</label>
            <input type="text" class="form-control" name="bio">   
          </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection