@extends('layouts.app-master')

@section('content')
    <div class="container">
        <p>Tất cả danh mục</p>
        <div class="list-group">
            @foreach ($categories as $category)
                <div class="list-group-item">
                    <div class="list-group-item-heading"><a href="{{ route('home.categoryDetail', ['id' => $category->id])}}">{{ $category->name }}</a></div>
                    <div class="list-group-item-text">
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
